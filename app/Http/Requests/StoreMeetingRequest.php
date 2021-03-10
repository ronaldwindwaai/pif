<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMeetingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> 'required',
            'type_of_meeting' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'participants_arrival_date' => 'sometimes|required',
            'secretariat_arrival_date'  => 'sometimes|required',
            'participants_departure_date'  => 'sometimes|required',
            'secretariat_departure_date'  => 'sometimes|required',
            'description'  => '',
            'is_breakout_room_required'  => '',
            'is_recording_required'  => '',
            'is_attendance_report_required'  => '',
            'is_members_airfare_required'  => '',
            'is_secretariat_airfare_required'  => '',
            'proposed_funding'  => '',
            'perdiem_rate'  => '',
            'num_of_participants'  => '',
            'venue'  => '',
            'status'  => '',
            'file_id' =>'',
            'user_id' =>'',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {

        $dates = $this->get_dates_array($this->dates);
        $participant_dates = $this->get_dates_array($this->participant_dates);
        $secretariat_dates = $this->get_dates_array($this->secretariat_dates);

        if(\is_array($dates)){
            $this->merge([
                'start_date' => $dates[0],
                'end_date'  => $dates[4],
                'start_time' => $dates[1],
                'end_time' => $dates[5],
                'participants_arrival_date' => $participant_dates[0],
                'secretariat_arrival_date'  => $secretariat_dates[0],
                'participants_departure_date'  => $participant_dates[2],
                'secretariat_departure_date'  => $secretariat_dates[2],
            ]);
        }
    }

    private function get_dates_array($dates)
    {
        return \explode(' ', $dates);
    }
}
