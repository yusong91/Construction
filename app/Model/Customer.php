<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = ['company_name', 'customer_name', 'customer_phone', 'email', 'job', 'address', 'other'];

    public function child_movementrent(){    
   
        return $this->hasMany('Vanguard\Model\MovementRent','customer_id'); 
    }

    public function child_revenue(){    
   
        return $this->hasMany('Vanguard\Model\Revenue','customer_id'); 
    } 

    public function child_equipment(){    
   
        return $this->hasMany('Vanguard\Model\Equipment','equipment_id'); 
    }

     
    
}
