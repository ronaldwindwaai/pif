<?php

namespace Database\Factories;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'contact_person' => $this->faker->title.' '.$this->faker->firstName(). ' ' . $this->faker->lastName(),
            'contact_details' => $this->faker->email.' '.$this->faker->phoneNumber,
            'user_id' =>  User::all()->random()->id,
        ];
    }
}
