<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testTaskIndex(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }
    public function testTaskCreate(): void
    {
        $response = $this->get('/tasks/create');

        $response->assertStatus(200);
    }

    public function testTaskStore(): void
    {
        $adminRole = new Role();
        $adminRole->name = 'Admin';
        $adminRole->save();
        $adminRoleId = $adminRole->id;

        $employeeRole = new Role();
        $employeeRole->name = 'Employee';
        $employeeRole->save();
        $employeeRoleId = $adminRole->id;

        $admin = new User();
        $admin->name = "Mohamed Yasser";
        $admin->email = "mohamedy.admin@gmail.com";
        $admin->role_id = $adminRoleId;
        $admin->avatar = 'avatar.png';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('1234');
        $admin->save();

        $employee = new User();
        $employee->name = "Ahmed Yasser";
        $employee->email = "mohamedy.employee@gmail.com";
        $employee->role_id = $employeeRoleId;
        $employee->avatar = 'avatar.png';
        $employee->email_verified_at = now();
        $employee->password = Hash::make('1234');
        $employee->save();

        $adminId = $admin->id ;
        $employeeId = $employee->id ;
        $task = new Task();
        $task->title  = 'Task';
        $task->description  = 'Task Description';
        $task->start_date = date('Y-m-d H:i:s', strtotime('2024-07-09 10:00:00'));
        $task->due_date = date('Y-m-d H:i:s', strtotime('2024-07-11 10:00:00'));
        $task->created_by  = $adminId;
        $task->assigned_to  = $employeeId;
        $task->save();
        $id = $task->id;

        $this->assertDatabaseHas('tasks', ['id' => $id]);
        $response = $this->post('/tasks');
        $response->assertRedirect('/tasks');

        Task::destroy($id);
        User::destroy($adminId);
        User::destroy($employeeId);
        Role::destroy($adminRoleId);
        Role::destroy($employeeRoleId);
    }
    public function testTaskDestroy(): void
    {
        $adminRole = new Role();
        $adminRole->name = 'Admin';
        $adminRole->save();
        $adminRoleId = $adminRole->id;

        $employeeRole = new Role();
        $employeeRole->name = 'Employee';
        $employeeRole->save();
        $employeeRoleId = $adminRole->id;

        $admin = new User();
        $admin->name = "Mohamed Yasser";
        $admin->email = "mohamedy.admin@gmail.com";
        $admin->role_id = $adminRoleId;
        $admin->avatar = 'avatar.png';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('1234');
        $admin->save();

        $employee = new User();
        $employee->name = "Ahmed Yasser";
        $employee->email = "mohamedy.employee@gmail.com";
        $employee->role_id = $employeeRoleId;
        $employee->avatar = 'avatar.png';
        $employee->email_verified_at = now();
        $employee->password = Hash::make('1234');
        $employee->save();

        $adminId = $admin->id ;
        $employeeId = $employee->id ;
        $task = new Task();
        $task->title  = 'Task';
        $task->description  = 'Task Description';
        $task->start_date = date('Y-m-d H:i:s', strtotime('2024-07-09 10:00:00'));
        $task->due_date = date('Y-m-d H:i:s', strtotime('2024-07-11 10:00:00'));
        $task->created_by  = $adminId;
        $task->assigned_to  = $employeeId;
        $task->save();
        $id = $task->id;
        $response = $this->delete("/tasks/destroy/$id");
        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', ['id' => $id]);


        Task::destroy($id);
        User::destroy($adminId);
        User::destroy($employeeId);
        Role::destroy($adminRoleId);
        Role::destroy($employeeRoleId);
    }
}
