<?php

namespace Database\Factories;

use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Project;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

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
            'starting_date' => $startingDate,
            'end_date' => $endingDate,
            'description' =>  $this->faker->realText(),
            'file' => $this->faker->name . '.xsl',
            'user_id'   =>  User::all()->random()->id,
            'project_id'   =>  Project::all()->random()->id,
        ];
    }
}
