<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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
            //
            'faculty_name' => 'unique:khoas,ten_khoa'
        ];
    }

    public function messages()
    {
        return [
            'faculty_name.unique' => __('validation.unique',['attribute' => 'Khoa/Ngành học']),
        ];
    }
}
