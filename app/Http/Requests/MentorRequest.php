<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorRequest extends FormRequest
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
            'mentor_name' => 'bail|required|max:255',
            'subject' => 'bail|required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'mentor_name.required' => 'Fill your mentor name',
            'subject.required' => 'Fill your subject'
        ];
    }
}
