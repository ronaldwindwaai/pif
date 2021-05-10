<?php

namespace Database\Factories;

use App\Models\Programme;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
            'officer_id'    => Role::where('name', 'officer')->first()->users()->get()->random()->id,
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
