<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;

class FinalCart extends Model
{
    protected $table = 'final_cart';
    protected $guarded=[];
}