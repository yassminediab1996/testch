<?php

namespace App;

use App\AdminModel\Product;
use Illuminate\Database\Eloquent\Model;
use Cookie;
use Auth;
use DB;
class Cart extends Model
{
    protected $table = 'carts';
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    
    public static function Insertcart()
    {
       
      if(Auth()->check()){
        if(Cart::where('user_id',Auth()->user()->id)->count() > 0 and Temp_cart::where('anonim',Cookie::get('cart')))
        {
          
            $sql = DB::select('SELECT SUM(Total.Quantity)as Quantity,Total.product_id FROM (SELECT SUM(temp_carts.quantity)as Quantity,temp_carts.product_id FROM temp_carts WHERE temp_carts.anonim = '. Cookie::get('cart') . ' GROUP BY temp_carts.product_id UNION ALL SELECT SUM(carts.quantity)as Quantity,carts.product_id FROM carts WHERE carts.user_id = '.Auth()->user()->id.' GROUP BY carts.product_id) Total GROUP BY Total.product_id');
            
            
            
            foreach($sql as $s)
            {
                if(FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->exists() and FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->exists())
                {
                     $produb1 = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->first();
                     $produb2 = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->first();
                     $qty1 = $produb1->quantity;
                     $qty2 = $produb2->quantity;
                     FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id , 'quantity' => $qty1 + $qty2 + $s->Quantity ]) ;
                     $produb1->delete();
                     $produb2->delete();
                }
                elseif(FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->exists() and !FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->exists())
                {
                    $produb = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->first();
                    FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->update(['quantity' => $produb->quantity + $s->Quantity ]);
                }
                elseif(FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->exists() and !FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->exists()){
                   $produb = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->first();
                       FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id , 'quantity' => $produb->quantity + $s->Quantity ]) ;
                        $produb->delete();
                }else{
                   FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id , 'quantity' => $s->Quantity]) ;
                }
                
            }
            
           Cart::where('user_id',Auth()->user()->id)->delete();
           Temp_cart::where('anonim',Cookie::get('cart'))->delete();
        }elseif(Cart::where('user_id',Auth()->user()->id)->count() > 0)
        {

            $sql = DB::select('`SELECT` `SUM`(carts.quantity)as Quantity,carts.product_id `FROM` `carts` `WHERE` carts.user_id = '.Auth()->user()->id.' `GROUP` `BY` carts.product_id');
             
             foreach($sql as $s)
            {
                 if(FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->exists())
                {
                    $produb = FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->first();
                    FinalCart::where(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id])->update(['quantity' => $produb->quantity + $s->Quantity ]);
                }else{
                   FinalCart::create(['user_id' => Auth()->user()->id , 'product_id' => $s->product_id , 'quantity' => $s->Quantity]) ;
                }
            }
            
            Cart::where('user_id',Auth()->user()->id)->delete();
        }elseif(Temp_cart::where('anonim',Cookie::get('cart'))->count() > 0 )
        {
            $sql = DB::select('SELECT SUM(temp_carts.quantity)as Quantity,temp_carts.product_id FROM `temp_carts`  WHERE temp_carts.anonim = '. Cookie::get('cart') . ' GROUP BY temp_carts.product_id');
             foreach($sql as $s)
            {
                if(FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->exists()){
                   $produb = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->first();
                   FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->update(['quantity' => $produb->quantity + $s->Quantity ]);
                }else{
                     FinalCart::create(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id , 'quantity' => $s->Quantity]);
                }
            }
            
             Temp_cart::where('anonim',Cookie::get('cart'))->delete();
        }
        
     
      }else{
          if(Temp_cart::where('anonim',Cookie::get('cart'))->count() > 0 )
          {
           
            $sql = DB::select('SELECT SUM(temp_carts.quantity)as Quantity,temp_carts.product_id FROM `temp_carts`  WHERE temp_carts.anonim = '. Cookie::get('cart') . ' GROUP BY temp_carts.product_id');
      
             foreach($sql as $s)
            {
                 if(FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->exists()){
                   $produb = FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->first();
                   FinalCart::where(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id])->update(['quantity' => $produb->quantity + $s->Quantity ]);
                }else{
                     FinalCart::create(['anonim' => Cookie::get('cart') , 'product_id' => $s->product_id , 'quantity' => $s->Quantity]);
                }
            }
            Temp_cart::where('anonim',Cookie::get('cart'))->delete();
          }else{
              $sql = array();
          }

      }
    
    }
}
