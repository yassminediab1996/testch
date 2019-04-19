<?php
namespace App\AdminModel;
use App\AdminModel\Mcase;
use App\User;
use Illuminate\Database\Eloquent\Model;
class UserCase extends Model
{
    protected $table="user_case";
    protected $guarded=[];

    public function case()
    {
     return $this->belongsTo(Mcase::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}