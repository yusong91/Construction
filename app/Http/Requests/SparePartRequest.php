<?php

namespace Vanguard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparePartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        
        return [
            'value' => 'required|unique:commond_codes,value'
        ];
    }
}
