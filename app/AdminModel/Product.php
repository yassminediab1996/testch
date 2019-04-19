<?php

namespace App\AdminModel;

use App\FavPro;
use App\Temp_Fav;
use App\Rate;
use Illuminate\Database\Eloquent\Model;
use DB;
use Cookie;
class Product extends Model
{
    protected $table ="products";
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function Price($id)
    {
        
    //     $newPrice = Product::find($id)->n_price;
    //   if($newPrice == "0")
    //   {
    //      return Product::find($id)->o_price ;
    //   }else{
    //       return  Product::find($id)->n_price;
    //   }
          if(Product::find($id)->offer)
        {
            $prs= Product::find($id)->offer->percentage;
            $oldprice = Product::find($id)->o_price;
            $newprice = ($oldprice*$prs)/100;
            //dd($newprice);
            return Product::find($id)->o_price - $newprice;
        }else{
            return Product::find($id)->o_price ;
        }
    }
    public function ProOffer($id)
    {
        
        if(Product::find($id)->offer)
        {
            $prs = Product::find($id)->offer->percentage;
            $oldprice = Product::find($id)->o_price;
            $newprice = (float)($oldprice*$prs)/100;
            //dd($newprice);
            return $newprice;
        }else{
            return 0;
        }
    }
    public static function isFav($user , $pro)
    {
        if(Auth()->check() and Cookie::get('fav') == null){
            if(FavPro::where(['user_id' => $user , 'product_id' => $pro])->exists()) {
                $getfav = FavPro::where(['user_id' => $user, 'product_id' => $pro])->first()->fav;
                if($getfav == 0)
                    return 1;
                if($getfav == 1)
                    return 0;
            }
            else{
                return 1;
            }
            }elseif(Auth()->check() and Cookie::get('fav') != null){
                
                  if(Temp_Fav::where(['anonim' => $user , 'product_id' => $pro])->exists()) {
                $getfav = Temp_Fav::where(['anonim' => $user, 'product_id' => $pro])->first()->fav;
                if($getfav == 0)
                    return 1;
                if($getfav == 1)
                    return 0;
                  }else{
                      return 1;
                  }
                
            }
        elseif(!Auth()->check() and Cookie::get('fav') != null){
             if(Temp_Fav::where(['anonim' => $user , 'product_id' => $pro])->exists()) {
                $getfav = Temp_Fav::where(['anonim' => $user, 'product_id' => $pro])->first()->fav;
                if($getfav == 0)
                    return 1;
                if($getfav == 1)
                    return 0;
            }
            else{
                return 1;
            }
        }else{
            if(Temp_Fav::where(['anonim' => $user , 'product_id' => $pro])->exists()) {
                $getfav = Temp_Fav::where(['anonim' => $user, 'product_id' => $pro])->first()->fav;
                if($getfav == 0)
                    return 1;
                if($getfav == 1)
                    return 0;
            }else{
                return 1;
            }
           
        }
    }

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
     public static function PopularProducs()
    {
        $sql = DB::select('SELECT * FROM products
                  WHERE products.id IN(SELECT product_id FROM `order_products` 
                   group BY product_id  )limit 4');
        return $sql;

    }
    
    public function imges()
    {
        return $this->hasMany(ImageProduct::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rate::class);
    }
    


}
