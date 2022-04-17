<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
 
    protected $fillable = ['type_id', 'equipment_id', 'customer_id', 'customer_name', 'from_date', 'date', 'number_working_day', 'rent_price', 'amount', 'note', 'file'];

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
