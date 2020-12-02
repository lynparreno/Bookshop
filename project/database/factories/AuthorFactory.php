<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstName = $this->faker->firstName;
        $middleName = $this->faker->firstName;

        $initials = $firstName[0].". ".$middleName[0].".";

        //$initials = $this->faker->firstName." ". $this->faker->firstName;
        return [
            'initials' => $initials,
            'lastname' => $this->faker->lastName,
            'age' => $this->faker->randomNumber(2),
            'country' => $this->faker->country,
        ];
    }
}
