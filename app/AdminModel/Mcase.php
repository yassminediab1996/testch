<?php
namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
class Mcase extends Model
{
    protected $table="cases";
    protected $guarded = [];
    
    public function userscase()
    {
        return $this->hasMany('App\AdminModel\UserCase' ,'case_id' ,'id' );
    }
}