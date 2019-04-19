<?php

namespace App\Http\Controllers;

use App\AdminModel\Product;
use App\FavPro;
use Illuminate\Http\Request;
use App\Monthly;
use DateTime;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\Ondemand_order;
use Hash;
use App\User;
class OndmandPackageController extends Controller
{
   
    public function ondmandpackge(Request $request)
    {
         $request->validate([
            // 'file' => 'required|mimes:jpeg,png',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
		]);
    
		if(User::where('email' , $request->email)->exists())
		{
		   $get_user = User::where('email' , $request->email)->first(); 
		   $pass = 1;
		}else{
		   $get_user =  User::create(['name' => $request->name , 'email' => $request->email , 'password' => Hash::make($request->phone) , 'address' => $request->address ,'active' => 1 ]);
		   $pass = $request->phone;
		}
        
         if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
              unset($request['file']);
         }
           $getmonthly =  Ondemand_order::create([ 'name' => $request->name , 'email' => $request->email , 'phone' => $request->phone ,'address' => $request->address , 'img' => $request['img']]);
           $getpackage =  $getmonthly;
           $email = $getmonthly->email;
          if($getmonthly){
              //order@chefaa.com
                // Mail::send('website.mail.newuser_admin',['getpackage' => $getpackage , 'email' => $email],function($message) use ($getpackage,$email){
                //   $message->to('order@chefaa.com');
                //   $message->subject('new user for monthly package');
                // });
                //  Mail::send('website.mail.newuser_admin',['getpackage' => $getpackage , 'email' => $email],function($message) use ($getpackage,$email){
                //   $message->to('doaa@chefaa.com');
                //   $message->subject('new user for monthly package');
                // });
                //  Mail::send('website.mail.newuser_admin',['getpackage' => $getpackage , 'email' => $email],function($message) use ($getpackage,$email){
                //   $message->to('info@chefaa.com');
                //   $message->subject('new user for monthly package');
                // });
                //  Mail::send('website.mail.usermonthlypackage',['getpackage' => $getpackage , 'email' => $email , 'get_user' => $get_user ,'pass' => $pass],function($message) use ($getpackage,$email,$get_user,$pass){
                //   $message->to($email);
                //   $message->subject('شكرا لإستخدامك شفاء ');
                // });
          
          
        }
         session()->flash('success_message' , 'تم الإشتراك فى هذه الخدمة مجانأ بالكامل برجاء مراجعة ايميلك ');
         return redirect()->back();
    }
}