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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_name' => 'bail|required|max:255',
            'school_id' => 'bail|required',
            'classroom_id' => 'bail|required',
            'phone' => 'bail|required|max:255',
            'description' => 'bail|required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'student_name.required' => 'Fill your student name',
            'school_id.required' => 'Fill your school',
            'classroom_id.required' => 'Fill your classroom',
            'phone.required' => 'Fill your phone',
            'description.required' => 'Fill your description'
        ];
    }
}
