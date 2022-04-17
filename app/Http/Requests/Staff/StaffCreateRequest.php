<?php

namespace Vanguard\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class StaffCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        
        return [
            'name' => 'required|unique:staff,name',
            'job'=>'required',
            'phone'=>'required'
        ];
    }
}
