<?php

namespace Database\Factories;

use App\Models\Programme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

class ProgrammeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description'   => $this->faker->realText(),
            'manager_id'    =>  Role::where('name', 'manager')->first()->users()->get()->random()->id,
            'user_id'       =>  User::all()->random()->id,
        ];
    }
}
