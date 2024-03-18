<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            // 'title'=> $this->faker->word(),
            // 'excerpt'=> $this->faker->word(),
            // 'body'=> $this->faker->word(),
            // 'category'=> $this->faker->word(),


            'author_id'=> $this->faker->numberBetween(1,25),
            'title'=> $this->faker->sentence(),
            'excerpt'=> $this->faker->sentence(25),
            'body'=> $this->faker->sentence(200),
            'thumbnail' => 'thumbnails/MOS1xD4PHsCbJfYzc63fsZApazOfO8e6FNKSNGmY.png',
            'category_id'=> $this->faker->numberBetween(1,10)


        ];
    }
}
