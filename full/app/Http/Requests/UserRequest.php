<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($method == 'store'){
            return [
                'username' => 'unique:users,username'
            ];
        }

        if($method == 'update'){
            return [
                'username' => 'unique:users,username,'.$this->id.',id'
            ];
        }
    }

    public function messages()
    {
        return [
            'username.unique' => __('validation.unique',['attribute' => 'Tên đăng nhập']),
        ];
    }
}
