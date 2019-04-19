<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ContactCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Notify_cusserv;
use App\AdminModel\Comment_Contact;
use App\ContactUs;
class ContactController extends Controller
{
    public function assign(Request $request)
    {
           ContactCustomer::create($request->all());
           Notify_cusserv::create(['user_id' => $request->customer_id , 'text' => 'you have a new assign to your contact list  ' ]);
           session()->flash('success_message','added assign sucsssfully');
           return redirect()->back();
    }
   public function customer($id)
   {
       $getall = ContactCustomer::where('customer_id' ,auth()->guard('admin')->user()->id )->get();
       return view('admin.contact.viewforcustomer',compact('getall'));
   }
   public function getform(Request $request)
   {
       $contact = $request->id;
       $customer = $request->customer;
        return view('admin.contact.getform',compact('customer' , 'contact'));

   }
   
   public function editassign(Request $request)
   {
       //dd($request->all());
      $getall = ContactCustomer::where('content_id' , $request->content_id )->update(['customer_id' => $request->customer_id]);
      session()->flash('success_message','updated succssfully');
      return redirect()->back();

   }
   
   public function changstat(Request $request)
   {
       ContactCustomer::find($request->con)->update(['state' => $request->id]);
       session()->flash('success_message','chang state succsffully');
       return redirect()->back();
   }
   
   public function addcomment(Request $request)
   {
       Comment_Contact::create(['contact_id' => $request->id , 'comment' => $request->comment]);
              session()->flash('success_message','added comment   succsffully');

       return redirect()->back();
   }
   
   public function delete(Request $request)
   {
       $getcus = ContactCustomer::where('content_id',$request->id)->first();
           if(Comment_Contact::where('contact_id',$getcus->id)->exists())
           {
              $getcoms = Comment_Contact::where('contact_id',$getcus->id)->get();
               foreach($getcoms as $com1)
               {
                   $com1->delete();
               } 
           }
           $getcus->delete();
        ContactUs::find($request->id)->delete();
       session()->flash('success_message','delted succsffully');
       return redirect()->back();
   }
   public function viewcomment(Request $request)
   {

      $comments =  Comment_Contact::where('contact_id' , $request->id)->get();
      
      return view('admin.contact.viewcomments',compact('comments'));

   }
}
