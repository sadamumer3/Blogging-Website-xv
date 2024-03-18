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
        $frst = $this->faker->firstName();
        $last = $this->faker->lastName();

        $name = $frst.' '.$last;
        return [
            //



            'name'=> $name,
            'email'=> $this->faker->email(),
            'country'=> $this->faker->country(),
            'password'=> bcrypt('sadam123')
            // 'password'=> $this->faker->password()

        ];
    }
}
