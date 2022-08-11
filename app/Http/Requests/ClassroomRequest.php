<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'classroom_name' => 'required',
            'mentor_id' => 'required',
            'roof' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'classroom_name.required' => 'Fill your classroom name',
            'mentor_id.required' => 'Fill your mentor',
            'roof.required' => 'Fill your roof'
        ];
    }
}
