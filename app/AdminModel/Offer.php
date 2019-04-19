<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table="offers";
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
