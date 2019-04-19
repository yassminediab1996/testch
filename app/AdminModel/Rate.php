<?php

namespace App;

use App\FavPro;
use App\Temp_Fav;
use Illuminate\Database\Eloquent\Model;
use DB;
class Rate extends Model
{
    protected $table="rate";
    protected $guarded = [];
}