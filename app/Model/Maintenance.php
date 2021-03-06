<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
 
    protected $table = 'maintenances';

    protected $fillable = ['type', 'type_id', 'equipment_id', 'supplier_id', 'staff_id', 'inventory_id', 'service', 'quantity', 'unit', 'unit_price', 'amount', 'invoice_number', 'invoice_file', 'note', 'image_broken', 'image_replace', 'date'];

    public function parent_inventory(){    
  
        return $this->belongsTo('Vanguard\Model\Inventory','inventory_id'); 
    }

    public function parent_equipment(){    
  
        return $this->belongsTo('Vanguard\Model\Equipment','equipment_id'); 
    } 

    public function parent_supplier(){    
  
        return $this->belongsTo('Vanguard\Model\Supplier','supplier_id'); 
    }

    public function parent_staff(){    
  
        return $this->belongsTo('Vanguard\Model\Staff','staff_id'); 
    }

    public function inventory(){     
  
        return $this->belongsTo('Vanguard\Model\Inventory','inventory_id'); 
    }

    public function supplier(){    
  
        return $this->belongsTo('Vanguard\Model\Supplier','supplier_id'); 
    }

    public function sparepart_children(){ 

        return $this->hasMany('Vanguard\Model\Sparepart','maintenance_id'); 
    }

    public static function boot() {
         
        parent::boot();    

        static::deleting(function($sparepart) {
             
            $sparepart->sparepart_children()->delete();
        });
    }
    
}
 