<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
        $method = $this->route()->getActionMethod();
        Log::debug($method);
        if($method == 'store'){
            return [
                'faculty_name' => 'unique:khoas,ten_khoa'
            ];
        }

        if($method == 'update'){
            return [
                'faculty_name' => 'unique:khoas,ten_khoa,'.$this->id.',id'
            ];
        }
    }

    public function messages()
    {
        return [
            'faculty_name.unique' => __('validation.unique',['attribute' => 'Khoa/Ngành học']),
        ];
    }
}
