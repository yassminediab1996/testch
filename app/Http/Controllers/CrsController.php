<?php

namespace App\Http\Controllers;

use App\AdminModel\Mcase;
use App\UserCase;
use DB;
use Illuminate\Http\Request;
use App\User;

class CrsController extends Controller
{
   public function index(){
       $casecount = Mcase::all()->count();
       $caselist = Mcase::where('approval',1)->paginate(3);
       $amountcount = DB::table('cases')->sum('cases.amount');

    return view('website.csr',compact('amountcount','casecount','caselist'));
   }
   
   public function send(Request $request){
     $this->validate($request,[
            'email' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'qty' => 'required|numeric',
            'goverid' => 'required',
            'type' => 'required',

        ]);
        
        $get_user = null;
    	if(!User::where('email' , $request->email)->exists()) {
		
		   $get_user =  User::create(['name' => $request->name , 'email' => $request->email , 'password' => Hash::make($request->phone) , 'address' => $request->goverid ,'active' => 1 ,'type' => 3]);
		    UserCase::create(['case_id' => $request->case_id , 'user_id' => $get_user->id ,'qty' => $request->qty , 'type' => $request->type]);

    	    
    	}else{
    	    $get_user = User::where('email', $request->email)->first();
    	    UserCase::create(['case_id' => $request->case_id , 'user_id' => $get_user->id ,'qty' => $request->qty , 'type' => $request->type]);

    	}
       session()->flash('success_message' , 'شكرا لتبرعك سيتم التواصل معك ');
       return redirect()->back();
   }
  
   public function getformcsr($id)
   {
       return view('website.formcsr',compact('id')); 
   }
   
   
   
} 
    
