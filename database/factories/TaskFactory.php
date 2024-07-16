<?php

// database/factories/TaskFactory.php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{

    public function definition()
    {
        $faker = \Faker\Factory::create('en_US');
        $adminIds = User::where('role_id', 1)->pluck('id')->toArray();
        $userIds = User::where('role_id', 2)->pluck('id')->toArray();

        return [
            'title' => $faker->sentence(3),
            'description' => $faker->sentence(5),
            'assigned_to' => $faker->randomElement($userIds),
            'created_by' => $faker->randomElement($adminIds),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '+10 days'),
            'due_date' => $this->faker->dateTimeBetween('-20 days', '+20 days'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
