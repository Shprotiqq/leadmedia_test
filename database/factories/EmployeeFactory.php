<?php

namespace Database\Factories;


use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Employee>
 */

class EmployeeFactory extends Factory
{

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'company_id' => fake()->numberBetween(1, 20)
        ];
    }


}
