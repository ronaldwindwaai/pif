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
        $startingDate = $this->faker->dateTimeThisYear('+1 month');
        $endingDate   = $this->faker->dateTimeThisYear('+2 month');
        return [
            'title' => $this->faker->title,
            'date_from' => $startingDate,
            'date_to' => $endingDate,
            'objective' =>  $this->faker->realText(),
            'file' => $this->faker->name.'.xsl',
            'programme_id'   =>  Programme::all()->random()->id,
            'user_id'   =>  User::all()->random()->id,
        ];
    }
}
