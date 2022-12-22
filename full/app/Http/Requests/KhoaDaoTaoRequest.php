<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class KhoaDaoTaoRequest extends FormRequest
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
                'tenKhoaDaotao' => 'unique:khoa_dao_taos,name'
            ];
        }

        if($method == 'update'){
            return [
                'tenKhoaDaotao' => 'unique:khoa_dao_taos,name,'.$this->id.',id'
            ];
        }
    }

    public function messages()
    {
        return [
            'tenKhoaDaotao.unique' => __('validation.unique',['attribute' => 'Khoá đào tạo']),
        ];
    }
}
