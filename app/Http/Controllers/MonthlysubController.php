<?php

namespace App\Http\Controllers;

use App\AdminModel\Product;
use App\FavPro;
use Illuminate\Http\Request;
use App\Monthly;
use DateTime;
use Mail;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Hash;

class MonthlysubController extends Controller
{
     /*
      * Function [ show_monthly_subscription_view ] That Returns
      * The Monthly Subscription View..
      */
     public function show_monthly_subscription_view() {
    	return view('website.monthly_subscription');
     }
 
    public function monthlypackage(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'date' => 'required',
		]);
		
        $date1 = new DateTime($request->date);
        $date = $date1->format('Y-m-d');
        
		if(User::where('email' , $request->email)->exists()) {
		   $get_user = User::where('email',$request->email)->first();
		   $pass = 1;
		} else{
		   $get_user =  User::create(['name' => $request->name , 'email' => $request->email  , 'address' => $request->address ,'active' => 1 ,'type' => 2]);
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
         
           $getmonthly =  Monthly::create([ 'date' => $date ,'name' => $request->name , 'email' => $request->email , 'phone' => $request->phone ,'address' => $request->address , 'img' => $request['img']]);
           $getpackage =  $getmonthly;
           $email = $getmonthly->email;
          if($getmonthly){
              //order@chefaa.com
                Mail::send('website.mail.newuser_admin',['getpackage' => $getpackage , 'email' => $email ],function($message) use ($getpackage,$email){
                  $message->to('order@chefaa.com');
                  $message->subject('new user for monthly package');
                });
                //  Mail::send('website.mail.newuser_admin',['getpackage' => $getpackage , 'email' => $email],function($message) use ($getpackage,$email){
                //   $message->to('doaa@chefaa.com');
                //   $message->subject('new user for monthly package');
                // });
                //  Mail::send('website.mail.newuser_admin',['getpackage' => $getpackage , 'email' => $email],function($message) use ($getpackage,$email){
                //   $message->to('info@chefaa.com');
                //   $message->subject('new user for monthly package');
                // });
                 Mail::send('website.mail.usermonthlypackage',['getpackage' => $getpackage , 'email' => $email , 'get_user' => $get_user ,'pass' => $pass],function($message) use ($getpackage,$email,$get_user,$pass){
                  $message->to($email);
                  $message->subject('شكرا لإستخدامك شفاء ');
                });
          
          
        }
        //   session()->flash('success_message' ,' تم الإشتراك في خدمة الروشتة الشهرية ' . '<br>' . 'هذه الخدمة مجاناً بالكامل' . '<br>' .'برجاء مراجعة بريدك الإلكترونى ');
         session()->flash('success_message' , 'تم الإشتراك فى خدمة الروشتة الشهرية هذه الخدمة مجانأ بالكامل برجاء مراجعة ايميلك ');
         return redirect()->back();
    }
    
    public function resetpassword_monthly($email)
    {
        session()->flash('success_message','برجاء كتابة كلمة مرور جديدة لتعديل بيناتك ');
        return view('website.resetpassword_monthly',compact('email'));
        
    }
    
     public function getformmounth(Request $request)
   {
      $getmounth = Monthly::find($request->id);
      return view('admin.Monthly.formmounth',compact('getmounth'));
   }
   
   public function active_monthly($id)
   {
      User::where('id',$id)->update(['active' => 1]);
      $data = User::find($id);
      return view('website.update_monthly',compact('data'));
   }
   public function get_monthly($id)
   {
      $data = User::find($id);
      return view('website.profile/'.$id,compact('data'));
   }
   public function update_monthly(Request $request)
   {
           unset($request['_token']);
           if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
        }
       if($request->date == null)
       {
           $month =  Monthly::find($request->id)->update($request->except(['file','date']));
       }else{
       $month =  Monthly::find($request->id)->update($request->except(['file']));
       }
       session()->flash('success_message','تم تحديث الروشتة الشهرية');
       return redirect()->back();
   }
   
  
}