<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use Mail;
use File;
use Socialite;
use App\AdminModel\charity;
class AuthUserController extends Controller
{
    public function login(Request $request)
    {
         $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'active' => 1])) {
            session()->flash('success_message', ' تم الدخول بنجاح');
            return redirect('/profile/'.auth()->user()->id);
        }else if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'active' => 0]))
        {
             session()->flash('error_message', '  برجاء تفعيل بريدك الإلكترونى  ');
            return back();
        }
        else {
            session()->flash('error_message', '  كلمة المرور او البريد غير صحيحة');
            return back();
        }
    }
    public function login2(Request $request)
    {
         $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'active' => 1])) {
            session()->flash('success_message', ' تم الدخول بنجاح');
            return redirect('/checkout');
        }else if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'active' => 0]))
        {
             session()->flash('error_message', '  برجاء تفعيل بريدك الإلكترونى  ');
            return back();
        }
        else {
            session()->flash('error_message', '  كلمة المرور او البريد غير صحيحة');
            return back();
        }
    }
 
    public function register(Request $request)
    {
            $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'sex' => 'required',
            'state_id' => 'required'

        ]);
        
       
       $get = User::create(['name' => $request->name , 'password' => Hash::make($request->password) , 'email' => $request->email , 'state_id' =>$request->state_id , 'active' => 0 , 'sex' => $request->sex]);
           Mail::send('website.mail.activation2',['get' => $get],function($message) use ($get){
              $message->to($get->email);
              $message->subject('شكرا لتسجيلك فى شفاء ');
            });
         session()->flash('success_message', 'تم ارساله ايميل اليك لتفعيل الحساب');
            return redirect('/');
    }
 
      public function register2(Request $request)
    {
            $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'sex' => 'required',
            'state_id' => 'required'

        ]);
        
       
       $get = User::create(['name' => $request->name , 'password' => Hash::make($request->password) , 'email' => $request->email , 'state_id' =>$request->state_id , 'active' => 0 , 'sex' => $request->sex]);
           Mail::send('website.mail.activation2',['get' => $get],function($message) use ($get){
              $message->to($get->email);
              $message->subject('شكرا لتسجيلك فى شفاء ');
            });
         session()->flash('success_message', 'تم ارساله ايميل اليك لتفعيل الحساب');
            return redirect('/checkout');
    }
    
     public function reqistercharity(Request $request)
   {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        
       $get = User::create(['name' => $request->name , 'password' => Hash::make($request->password) , 'email' => $request->email , 'phone' => $request->phone , 'active' => 0  ,'address' => $request->address,'type' => 6]);
       charity::create(['name_ar' => $request->name , 'address_ar' => $request->address]);
         Mail::send('website.mail.activation2',['get' => $get],function($message) use ($get){
              $message->to($get->email);
              $message->subject('شكرا لتسجيلك فى شفاء ');
            });
       session()->flash('success_message', 'تم ارساله ايميل اليك لتفعيل الحساب');
            return redirect('/csr');
        
   }
   
   public function login_charity(Request $request)
   {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password , 'type' => 6])) {
        $get_charity = User::where('email' , $request->email)->first();
       session()->flash('success_message', 'تم الدخول بنجاح  ');
            return redirect('charity_profile/'.$get_charity->id); 
    }else{
           session()->flash('success_message', 'هناك خطأ');
           return back();
    }
   }
    public function updateprofile_charity(Request $request)
   {
         unset($request['_token']);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
        }
       User::find($request->id)->update($request->except('file'));
       session()->flash('success_message','تم تعديل البيانات بنجاح ');
       return  redirect()->back();
   }
    public function activate($id)
    {
       $id1 = (int)$id;
        User::where('id',$id1)->update(['active' => 1]);
          session()->flash('success_message', 'تم تفعيل البريد الإلكترونى  بنجاح  !');
            return redirect('/store');
    }
    
      public function redirect($service) {
        return Socialite::driver ( $service )->redirect ();
    }
      public function callback($service) {
        $user = Socialite::with ( $service )->user ();
    
        return view ( 'home' )->withDetails ( $user )->withService ( $service );
    }
    
      public function RedirectTofacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

      public function RedirectTogoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function RedirectTotwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function callbackfacebook()
    {
        $Socialite = Socialite::driver('facebook')->user();
        $isuser = User::whereFb_id($Socialite->getId())->first();
        if($isuser){
            Auth::login($isuser);
            return redirect('/store');
        }else{
            $contents = file_get_contents($Socialite->getAvatar());
            $user = new User ;
            $user->fb_id = $Socialite->getId();
            if($Socialite->getName()){
            $user->name = $Socialite->getName();
            }
            $filename = time() . '.' .'avatar.jpg';
            File::put('uploads/files/'.$filename, $contents);
            $user->img = $filename;
            $user->save();
            Auth::login($user);
              session()->flash('success_message', 'يجب تكملت بيناتك لتستطيع الشراء من شفاء');
        return redirect('/profile/'.auth()->user()->id);
        }
       
    }
    public function callbacktwitter()
    {
        $Socialite = Socialite::driver('twitter')->user();
           $isuser = User::whereFb_id($Socialite->getId())->first();
        if($isuser){
            Auth::login($isuser);
              return redirect('/store');
        }else{
            $contents = file_get_contents($Socialite->getAvatar());
            $user = new User ;
            $user->fb_id = $Socialite->getId();
            if($Socialite->getName()){
            $user->name = $Socialite->getName();
            }
            $filename = time() . '.' .'avatar.jpg';
            File::put('uploads/files/'.$filename, $contents);
            $user->img = $filename;
            $user->save();
            Auth::login($user);
          session()->flash('success_message', 'يجب تكملت بيناتك لتستطيع الشراء من شفاء');
        return redirect('/profile/'.$user->id);
        }
       
    
    }
    
        public function callbackgoogle()
    {
        $Socialite = Socialite::driver('google')->stateless()->user();
        $isuser = User::whereFb_id($Socialite->getId())->first();
        if($isuser){
            Auth::login($isuser);
              return redirect('/store');

        }else{
            $contents = file_get_contents($Socialite->getAvatar());
            $user = new User ;
            $user->fb_id = $Socialite->getId();
            if($Socialite->getName()){
            $user->name = $Socialite->getName();
            }
            $filename = time() . '.' .'avatar.jpg';
            File::put('uploads/files/'.$filename, $contents);
            $user->img = $filename;
            $user->save();
            Auth::login($user);
        
        }
         session()->flash('success_message', 'يجب تكملت بيناتك لتستطيع الشراء من شفاء');
        return redirect('/profile/'.auth()->user()->id);
    }
    
    public function resetpassword(Request $request)
    {
            $this->validate($request,[
            'email' => 'required|string',
        ]);
        $email = $request->email;
        if(User::where(['email' => $email])->exists()){    
        $token =  User::where(['email' => $email])->first()->password;
        
           Mail::send('website.mail.reset',['token'=> $token,'email'=> $email ],function($message) use ($token,$email){
                      $message->to($email);
                      $message->subject('  لاسترجاع حسابك الشخصى ');
                    });
           session()->flash('success_message', '  تم ارسال ايميل لتغير كلمة المرور الخاصة بك  ');

           return redirect('store');
        }
        else{
            session()->flash('error_message', 'البريد الإلكترونى غير صحيح ');
            return back();
        }
    }
    
    
     public function resetaccount(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        return view('website.resetaccount',compact('token','email')); 
    }
    
    public function doresetpass(Request $request)
    {
        
      if(User::where(['email' => $request->email,'password' => $request->token])->exists()){    
       $get = User::where(['email' =>  $request->email])->update(['password' => Hash::make($request->password)]);
        session()->flash('success_message', 'تم تغير كلمة المرور الخاصة بك بنجاح    ');

                    return redirect('store');
      }else{
            session()->flash('error_message', 'البريد الإلكترونى غير صحيح ');
            return back();
      }
    }
    
    public function login_monthly(Request $request)
    {
        User::where(['email' =>  $request->email])->update(['password' => Hash::make($request->password)]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            session()->flash('success_message', ' تم الدخول بنجاح');
            return redirect('/profile/'.auth()->user()->id);
        }else
        {
             session()->flash('error_message', '  برجاء تفعيل بريدك الإلكترونى  ');
            return back();
        }
        
    }

}
