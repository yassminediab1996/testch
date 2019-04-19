<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //order_products

    protected $table="order_products";
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);

    }
}
