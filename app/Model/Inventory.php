<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory; 

    protected $table = 'inventorys';

    protected $fillable = [
            
        'name', 'sparep_id', 'menufacture', 'vender', 'quantity', 'unit', 'price', 'purchased_date', 'warehouse_location', 'image'
    ];

    public function parent_sparepart(){    
        return $this->belongsTo('Vanguard\Model\CommonCode','sparep_id'); 
    }

    public function parent_customer(){    
        return $this->belongsTo('Vanguard\Model\Customer','customer_id'); 
    }

    public function parent_equipment(){    
        return $this->belongsTo('Vanguard\Model\Customer','equipment_id'); 
    }

    
}
