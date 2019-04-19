<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;
use App\AdminModel\Mcase;
class UserQuize extends Model
{
    protected $table="user_quize";
    protected $guarded=[];

  public function userQuestion() {
      return $this->hasMany('App\UserQuestion', 'ques_id', 'id');
  }
}