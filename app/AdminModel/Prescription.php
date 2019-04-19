<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table="prescription";
    protected $guarded=[];

     public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
     public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    

    
    
}
