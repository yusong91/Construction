<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $table = 'spareparts';
    protected $fillable = ['maintenance_id', 'name', 'quantity', 'unit', 'unit_price', 'amount'];

    public function parent_maintenance(){    
  
        return $this->belongsTo('Vanguard\Model\Maintenance','maintenance_id'); 
    }

    public function parent_equipment(){    
  
        return $this->belongsTo('Vanguard\Model\Equipment','equipment_id'); 
    }
}
