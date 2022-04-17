<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovementRent extends Model
{
    use HasFactory;
 
    //protected $table = 'equipment_solds';

    protected $fillable = ['type_id', 'equipment_id', 'customer_id', 'customer_name', 'customer_phone', 'date', 'from_location', 'to_location', 'expected_date'];

    public function parent_equipment(){    
  
        return $this->belongsTo('Vanguard\Model\Equipment','equipment_id'); 
    }
 
    public function parent_type(){    
  
        return $this->belongsTo('Vanguard\Model\CommonCode','type_id'); 
    }

    public function parent_customer(){    
  
        return $this->belongsTo('Vanguard\Model\Customer','customer_id'); 
    }
}
