<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory; 

    protected $table = 'inventorys';

    protected $fillable = [
            
        'name', 'sparep_id', 'menufacture', 'vender', 'quantity', 'unit', 'price', 'purchased_date', 'warehouse_id', 'image'
    ];

    public function parent_category(){    
        return $this->belongsTo('Vanguard\Model\CommonCode','category_id'); 
    }

    public function parent_customer(){    
        return $this->belongsTo('Vanguard\Model\Customer','customer_id'); 
    }

    public function parent_equipment(){    
        return $this->belongsTo('Vanguard\Model\Customer','equipment_id'); 
    }

    public function parent_warehouse(){    
        return $this->belongsTo('Vanguard\Model\Warehouse','warehouse_id'); 
    }

    
}
