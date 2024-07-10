<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUsersList(): void
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function testUserCreate(): void
    {
        $response = $this->get('/users/create');

        $response->assertStatus(200);
    }

    public function testUserDestroy(): void
    {
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->save();
        $adminRoleId = $adminRole->id;

        $user = new User();
        $user->name = "Mohamed Yasser";
        $user->email = "mohamedy.dev@gmail.com";
        $user->role_id = $adminRoleId;
        $user->avatar = 'avatar.png';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->save();
        $id = $user->id;
        $response = $this->delete("/users/destroy/$id");

        $response->assertRedirect('/users');
        $this->assertDatabaseMissing('users', ['id' => $id]);
    }


}
