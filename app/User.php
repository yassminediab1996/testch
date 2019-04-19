<?php

namespace App;

use App\AdminModel\City;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favproduct()
    {
        return $this->hasOne(FavPro::class);
    }

    public function fees()
    {
        return $this->belongsTo(City::class , 'state_id','id');
    }

    public static function GetFees($id)
    {
        $getstate = User::find($id)->state_id;
           return City::find($getstate)->fees;
       
    }
 
}
