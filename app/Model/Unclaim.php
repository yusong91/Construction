<?php

namespace Vanguard\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unclaim extends Model
{
    use HasFactory;

    protected $table = 'unclaims';

    protected $fillable = ['maintenance_id', 'staff_id', 'invoice_date', 'invoice_number', 'memo', 'price'];

    public function staff_parent(){    
  
        return $this->belongsTo('Vanguard\Model\Staff','staff_id'); 
    }
}
