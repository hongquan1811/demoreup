<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorUpdateRequest extends FormRequest
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
        $id = $this->route('post')->id;
        return [
            'mentor_name' => "unique:posts,mentor_name,{$id},id",
            'subject' => "unique:posts,subject,{$id},id"
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
