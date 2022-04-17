<?php

namespace Vanguard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        
        return [
            'sparep_id' => 'required',
            'name' => 'required',
            'menufacture' => 'required|unique:equipment,equipment_id',
            'vender' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'purchased_date' => 'required',
            'warehouse_location' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ];
    }
}
