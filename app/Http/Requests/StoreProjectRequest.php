<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'programme_title' => 'required',
            'project_title' => 'required',
            'activity_name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'venue' => 'required',
            'objective' => '',
            'file' => '',
        ];
    }
}