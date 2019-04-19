<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;

class FavPro extends Model
{
    protected $table="favourite_product";
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
