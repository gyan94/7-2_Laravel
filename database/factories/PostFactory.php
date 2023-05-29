<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Team;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->image(storage_path('app/public/posts'), 640, 480),
            'name' => $this->faker->company(),
            'area' => $this->faker->address(),
            'genre'  => $this->faker->country(),
            'comment' => $this->faker->realText(50),
            'user_id' => User::Factory(),
        ];
    }
}
