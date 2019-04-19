<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;
use App\AdminModel\Mcase;
class UserCase extends Model
{
    protected $table="user_case";
    protected $guarded=[];

  public function case()
  {
    return $this->belongsTo(Mcase::class);
  }
}