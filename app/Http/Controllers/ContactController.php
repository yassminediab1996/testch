<?php

namespace App\Http\Controllers;


use App\ContactUs;
use App\Quickform;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function  contact(Request $request)
    {
         $this->validate($request,[
            'email' => 'required|string',
            'name' => 'required|string',
            'message' => 'required|string',
            'phone' => 'required|numeric',
        ]);
//         dd($request->all());
        $ins = ContactUs::create($request->all());
        $get = ContactUs::find($ins->id);

//         Mail::send('website.mail.contact',['get' => $get],function($message) use ($get){
//              $message->to('doaa@chefaa.com');
//              $message->subject('contact us from chefaa.com');
//            });
            
        if($ins)
        {
            session()->flash('success_message', '  تمت الاضافه بنجاح !');
               return redirect()->back();
        }else{
            session()->flash('error_message', '  حدث خطا الرجاء الارسال مرة اخرى   !');
               return redirect()->back();
        }
        
    }
    
    public function ContactStore(Request $request)
    {
          $this->validate($request,[
            'email' => 'required|string',
            'name' => 'required|string',
              'phone' => 'required|numeric',
            'message' => 'required|string',
          
        ]);
       $ins = ContactUs::create($request->all());
        $get = ContactUs::find($ins->id);
        
         Mail::send('website.mail.contact',['get' => $get],function($message) use ($get){
              $message->to('doaa@chefaa.com');
              $message->subject('contact us from chefaa.com/store');
            });
            
        if($ins)
        {
              session()->flash('success_message', '  تمت الاضافه بنجاح !');
               return redirect()->back();
        }else{
            session()->flash('error_message', '  حدث خطا الرجاء الارسال مرة اخرى   !');
               return redirect()->back();
        }
    }
    
    
    public function quickform(Request $request)
    {
         $this->validate($request,[
            'email' => 'required|string',
            'name' => 'required|string',
            'message' => 'required|string',
          
        ]);
       $quick =  Quickform::create($request->all());
       if($quick){
        session()->flash('success_message2', ' سوف يتم التواصل معك  ');
        return redirect()->back();
       }else{
         session()->flash('error_message2', 'هناك مشكلة');
                 return redirect()->back();

       }
    }
}