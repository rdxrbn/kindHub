<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'class_room' => 'required',
            'teachers_name' => 'required',
            'student_firstname' => 'required',
            'student_lastname' => 'required',
            'gender' => 'required',
            'joined_year' => 'required',
        ];
    }
}
