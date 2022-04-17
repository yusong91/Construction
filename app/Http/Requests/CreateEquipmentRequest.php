<?php

namespace Vanguard\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEquipmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(){
        
        return [
            'equip_type_id' => 'required',
            'equipment_id' => 'required|unique:equipment,equipment_id',
            'brand_id' => 'required',
            'chassis_no' => 'required',
            'engine_no' => 'required',
            'historical_cost' => 'required',
            'purchase_date' => 'required',
            'weight' => 'required',
            'year' => 'required',
            'receipt_no'=>'required',
            'vender'=>'required',
            'note'=>'required',
            'image'=>'required'
        ];
    }
}
