<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;

class Temp_cart extends Model
{
    protected $table = 'temp_carts';
    protected $guarded=[];
}