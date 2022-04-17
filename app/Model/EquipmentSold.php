<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentSold extends Model
{
    use HasFactory;

    protected $table = 'equipment_solds';

    protected $fillable = ['type_id', 'equipment_id', 'sale_description', 'sale_date', 'sale_price', 'sale_to', 'note'];

    public function parent_equipment(){    
  
        return $this->belongsTo('Vanguard\Model\Equipment','equipment_id'); 
    }

    public function parent_type(){    
  
        return $this->belongsTo('Vanguard\Model\CommonCode','type_id'); 
    }
}
