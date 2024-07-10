<?php

// database/factories/TaskFactory.php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{

    public function definition()
    {
        $faker = \Faker\Factory::create('en_US');

        return [
            'title' => $faker->sentence(3),
            'description' => $faker->sentence(5),
            'completed' => $this->faker->numberBetween(0, 1),
            'assigned_to' => $this->faker->numberBetween(1, 5),
            'created_by' => $this->faker->numberBetween(1, 5),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '+10 days'),
            'due_date' => $this->faker->dateTimeBetween('-20 days', '+20 days'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
