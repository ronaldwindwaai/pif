<?php

namespace Database\Factories;

use App\Models\File;
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
        $file = File::all()->random();
        return [
            'title' => $file->title,
            'credentials' => $this->faker->text,
            'user_id'   =>  User::all()->random()->id,
            'meeting_id'   =>  Meeting::all()->random()->id,
            'file_id' => $file->id,
        ];
    }
}
