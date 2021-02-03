<?php

namespace Database\Factories;

use App\Models\Support;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class SupportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Support::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>  $this->faker->realText(100),
            'description' =>  $this->faker->realText(),
            'status'    =>  $this->faker->randomElement(['pending', 'closed']),
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
