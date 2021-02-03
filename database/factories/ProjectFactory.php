<?php

namespace Database\Factories;

use App\Models\Programme;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'objective' =>  $this->faker->realText(),
            'programme_id'   =>  Programme::all()->random()->id,
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
