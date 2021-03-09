<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'participants_arrival_date' => '',
            'secretariat_arrival_date'  => '',
            'participants_departure_date'  => '',
            'secretariat_departure_date'  => '',
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
        ];
    }
}
