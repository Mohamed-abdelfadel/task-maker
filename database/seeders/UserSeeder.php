<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->count(100)->admin()->create();
        User::factory()->count(10000)->user()->create();
    }
}
