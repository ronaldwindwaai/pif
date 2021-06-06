<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Meeting;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Project;
use App\Models\Programme;

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
        $days = rand(3, 31);

        $starting_time = $this->faker->dateTimeBetween('this year', '+6 days');
        $ending_time   = $this->faker->dateTimeBetween($starting_time, strtotime('+6 days'));


        return [
            'name_of_the_meeting' => $this->faker->name,
            'type_of_meeting' => $this->faker->randomElement([
                'Single Day',
                'Specific Days',
                'Weekly',
                'Monthly',
            ]),
            'start_date' => $starting_time,
            'end_date' => $ending_time,
            'start_time' => $starting_time->format('H:m:s'),
            'end_time' => $ending_time->format('H:m:s'),
            'description' =>  $this->faker->realText(),
            'venue' => $this->faker->city . ',' . $this->faker->country,
            'status'    => $this->faker->randomElement([
                'pending',
                'completed',
                'postponed',
                'cancelled',
            ]),
            'is_breakout_room_required' => $this->faker->boolean(),
            'is_recording_required' => $this->faker->boolean(),
            'is_attendance_report_required' => $this->faker->boolean(),
            'file_id'   =>  File::all()->random()->id,
            'user_id'   =>  User::all()->random()->id,
            'partner_id'   =>  Partner::all()->random()->id,
            'project_id'   =>  Project::all()->random()->id,
            'programme_id'   =>  Programme::all()->random()->id,
        ];
    }
}
