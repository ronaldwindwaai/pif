<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\Recording;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recording::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'credentials' => $this->faker->text,
            'url_recording' => $this->faker->url,
            'user_id'   =>  User::all()->random()->id,
            'meeting_id'   =>  Meeting::all()->random()->id,
        ];
    }
}
