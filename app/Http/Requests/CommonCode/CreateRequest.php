<?php

namespace Vanguard\Http\Requests\CommonCode;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'key' => 'required|unique:commond_codes,key',
            'value' => 'required|unique:commond_codes,value'
        ];
    }
}
