<?php

namespace Vanguard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        
        return [
            'company_name' => 'required', //|unique:suppliers,company_name
            'supplier_name' => 'required',
            'phone' => 'required'
        ];
    }
}
