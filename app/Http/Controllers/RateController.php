<?php

namespace App\Http\Controllers;

use App\AdminModel\Mcase;
use App\Rate;
use DB;
use Illuminate\Http\Request;
use Auth;
use Cookie;
use Response;
use App\Temp_Rate;
class RateController extends Controller
{
        public function rateproduct($id , Request $request)
       {
             if(Auth::check()  and  Cookie::get('rate') == null ){

                    $rateCheck = Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->count();
                    if($rateCheck > 0){
                        $rateUser =  Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first();
                        $rateUser->stars = $request->star;
                        $rateUser->save();
                    }else{
                        Rate::create(['user_id' => Auth()->user()->id , 'product_id' => $id , 'stars' => $request->star]);
            
                    }
             }elseif(Auth::check()  and  Cookie::get('rate') !== null)
             {
                 $rateCheckauth = Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->count();
                 $rateCheckcookie = Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->count();
                 
                 if($rateCheckauth > 0 and $rateCheckcookie > 0 )
                 {
                    $gettimeauth =  Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first()->updated_at;
                    $gettimecookie = Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->first()->updated_at;
                    
                    if($gettimeauth > $gettimecookie)
                    {
                        $rateUser = Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first()->stars;
                         if($rateUser > 0){
                            $rateUser =  Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first();
                            $rateUser->stars = $request->star;
                            $rateUser->save();
                        }else{
                            Rate::create(['user_id' => Auth()->user()->id , 'product_id' => $id , 'stars' => $request->star]);
                            
                        }
                    }
                    
                 }elseif($rateCheckauth == 0 and $rateCheckcookie != 0)
                 {
                     $rateUser = Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->first()->stars;
                     
                       if($rateUser > 0){
                        $rateUser =  Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->first();
                        $rateUser->stars = $request->star;
                        $rateUser->save();
                        }else{
                                Temp_Rate::create(['anonim' => Cookie::get('rate') , 'product_id' => $id , 'stars' => $request->star]);
                        }
                 }elseif($rateCheckcookie == 0 and $rateCheckauth != 0)
                 {
                     $rateUser = Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first()->stars;
                      if($rateUser > 0){
                        $rateUser =  Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first();
                        $rateUser->stars = $request->star;
                        $rateUser->save();
                    }else{
                        Rate::create(['user_id' => Auth()->user()->id , 'product_id' => $id , 'stars' => $request->star]);
                        
                    }
                 }else{
                     if(Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->count()){
                         $rateUser = Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first()->stars;
                        $rateUser =  Rate::where(['product_id' => $id , 'user_id' => Auth()->user()->id])->first();
                        $rateUser->stars = $request->star;
                        $rateUser->save();
                    }else{
                        Rate::create(['user_id' => Auth()->user()->id , 'product_id' => $id , 'stars' => $request->star]);
                        
                    }
                 }
                 
                 
             }
              elseif(!Auth::check() and Cookie::get('rate') != null )
            {
                $check  = Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->count();
                if($check > 0){
                    $rateUser = Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->first()->stars;
                     $rateUser =  Temp_Rate::where(['product_id' => $id , 'anonim' => Cookie::get('rate')])->first();
                            $rateUser->stars = $request->star;
                            $rateUser->save();
                }else{
                             $response = new Response('Hello World');
                             $value=DB::table("temp_rate")->max("anonim");
                            if($value == null){
                                $value=0;
                            }else{
                                $value += 1;
                            }
                              Cookie::queue(Cookie::make('rate', $value, 40000));
                            Temp_Rate::create(['anonim' => $value , 'product_id' => $id , 'stars' => $request->star]);
                        }
            }
            else{
                        $response = new Response('Hello World');
                        $value=DB::table("temp_rate")->max("anonim");
                        if($value == null){
                            $value=0;
                        }else{
                            $value += 1;
                        }
                          Cookie::queue(Cookie::make('rate', $value, 40000));
                        Temp_Rate::create(['anonim' => $value , 'product_id' => $id , 'stars' => $request->star]);
            }
            return redirect()->back();
       }
}