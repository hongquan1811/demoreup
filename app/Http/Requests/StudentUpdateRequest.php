<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'student_name' => "unique:posts,student_name,{$id},id",
            'school_id' => "unique:posts,school_id,{$id},id",
            'classroom_id' => "unique:posts,classroom_id,{$id},id",
            'phone' => "unique:posts,phone,{$id},id",
            'description' => "unique:posts,description,{$id},id"
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
