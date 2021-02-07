<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Participant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email'   =>   $this->faker->safeEmail(),
            'registration_date' => $this->faker->dateTimeThisYear('-1 month'),
            'country_code' => $this->faker->countryCode,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'organization' => $this->faker->title(),
            'job_title' => $this->faker->jobTitle,
            'meeting_id'   =>  Meeting::all()->random()->id,
        ];
    }
}
