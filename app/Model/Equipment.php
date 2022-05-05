<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;  

    protected $table = 'equipment';
    
    protected $fillable = [
        'equip_type_id', 'equipment_id', 'brand_id','chassis_no' ,'engine_no', 'historical_cost', 'purchase_date', 'weight', 'year', 'receipt_no', 'vender', 'note', 'image', 'sold'
    ];

    public function revenue_parent_quipment(){    
  
        return $this->belongsTo('Vanguard\Model\CommonCode','equip_type_id'); 
    }

    public function parent_quipment(){    
  
        return $this->belongsTo('Vanguard\Model\CommonCode','equip_type_id'); 
    }

    public function parent_brand(){    
  
        return $this->belongsTo('Vanguard\Model\CommonCode','brand_id'); 
    }

    public function child_revenue(){    
   
        return $this->hasMany('Vanguard\Model\Revenue','equipment_id'); 
    }

    public function child_maintenance(){    
   
        return $this->hasMany('Vanguard\Model\Maintenance','equipment_id'); 
    }

    public function child_movement(){    
  
        return $this->hasMany('Vanguard\Model\MovementRent','equipment_id'); 
    }



    

}
