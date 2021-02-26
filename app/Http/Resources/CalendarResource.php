<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Faker\Factory;

class CalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $faker = Factory::create();

        $date = \explode('=>',$this->date);
        $border_colour = '#04a9f5';
        $backgound_colour = '#04a9f5';
        $text_colour    = '#fff';

        switch ($this->project->id)
        {
            case 1:
                {
                    $border_colour = $faker->hexColor;
                    $backgound_colour = $faker->hexColor;
                    $text_colour    = '#fff';
                    break;
                }
            case 2: {
                    $border_colour = $faker->hexColor;
                    $backgound_colour = $faker->hexColor;
                    $text_colour    = '#fff';
                    break;
                }
            case 3: {
                    $border_colour = $faker->hexColor;
                    $backgound_colour = $faker->hexColor;
                    $text_colour    = '#fff';
                    break;
                }
            case 4: {
                    $border_colour = $faker->hexColor;
                    $backgound_colour = $faker->hexColor;
                    $text_colour    = '#fff';
                    break;
                }
            case 5: {
                    $border_colour = $faker->hexColor;
                    $backgound_colour = $faker->hexColor;
                    $text_colour    = '#fff';
                    break;
                }
            case 6: {
                    $border_colour = $faker->hexColor;
                    $backgound_colour = $faker->hexColor;
                    $text_colour    = '#fff';
                    break;
                }

        }
        return [
            'id'            => $this->project->id,
            'title'         => $this->title.' Start time:'.$this->start_time,
            'start'         => Carbon::createFromFormat('d/m/Y', $date[0])->format('Y-m-d'),
            'end'           => Carbon::createFromFormat('d/m/Y', $date[1])->format('Y-m-d'),
            'borderColor'   => $border_colour,
            'backgroundColor' => $backgound_colour,
            'textColor'     => $text_colour,
            'url'           => \route('meetings.show',$this->id),

        ];
    }
}
