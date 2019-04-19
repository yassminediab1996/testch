<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderProduct;
use App\User;
use App\CouponOrder;
class Order extends Model
{
    protected $table="orders";
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function coponuser()
    {
         return $this->belongsTo(CouponOrder::class);
    }
}
