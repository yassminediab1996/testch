<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Map;
use App\Ondemand_order;
use App\AdminModel\Pharmacy_ondemand;
use App\Feedback;
use Mail;
class OndemandController extends Controller
{
    // assign => 0 default
    // assign => 1 to phrmcy
    // assign => 3 done call to customer
    // assign => 4 customer rejected
    public function getformmounth(Request $request)
    {
      $getmounth = Monthly::find($request->id);
      return view('admin.Monthly.formmounth',compact('getmounth'));
    }
   public function filter(Request $request)
   {
        $query = Ondemand_order::query();

        if (request()->has('d1') && request()->get('d1') != '') {
            $query = $query->whereDate('date', '>=', request()->get('d1'));
        }
        if (request()->has('d2') && request()->get('d2') != '') {
             $query = $query->whereDate('date', '<=', request()->get('d2'));
         }
         if (request()->has('d3') && request()->get('d3') != '') {
            $query = $query->whereDate('created_at', '>=', request()->get('d3'));
         }
         if (request()->has('d4') && request()->get('d4') != '') {
              $query = $query->whereDate('created_at', '<=', request()->get('d4'));
         }
        if (request()->has("name") && request()->get("name") != "") {
             $query = $query->where("name", "like", "%" . request()->get("name") . "%");
         }
        if (request()->has("phone") && request()->get("phone") != "") {
              $query = $query->where("phone", "like", "%" . request()->get("phone") . "%");
         }
       if (request()->has("address") && request()->get("address") != "") {
              $query = $query->where("address", "like", "%" . request()->get("address") . "%");
        }
        $getmon =$query->where('assign' ,'!=' ,4)->get();
      
        return view('admin.ondemand.index',compact('getmon')); 
   }
   public function delete(Request $request)
   {
       Ondemand_order::find($request->id)->delete();
       session()->flash('success_message','deleted succssfully');
       return redirect()->back();
   }
   public function Getinfo(Request $request)
   { 
       return Ondemand_order::where('id',$request->id)->first();
   }
   public function update(Request $request)
   {
        unset($request['_token']);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '.' .$file->getClientOriginalName();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath,$filename);
            $request['img'] = $filename;
        }
        Ondemand_order::whereId($request->id)->update($request->except(['file']));
         session()->flash('success_message','updated succssfully');
        return redirect()->back();
   }
   
   public function assign(Request $request)
   {
       $phar = Map::find($request->pharmacy_id);
       $email = $phar->email;
        Mail::send('website.mail.assign_pharm_admin',['email' => $email ],function($message) use ($email){
                  $message->to($email);
                  $message->subject('تم إرسال روشته شهريه');
                });
       Pharmacy_ondemand::create($request->all());
       Ondemand_order::find($request->ondemand_id)->update(['assign' => 1]);
       
        session()->flash('success_message','assigned succssfully');
       return redirect()->back();
   }
   
   public function getform(Request $request)
   {
       $idmon = $request->id;
       $phar = $request->phar;
       return view('admin.Monthly.getform',compact('idmon' , 'phar'));
   }
   
   public function editassign(Request $request)
   {
       $up = Pharmacy_ondemand::where('mon_id' ,$request->mon_id)->update(['parmact' =>$request->parmact]);
        $phar = Map::find($request->parmact);
       $email = $phar->email;
        Mail::send('website.mail.assign_pharm_admin',['email' => $email ],function($message) use ($email){
                  $message->to($email);
                  $message->subject('تم إرسال روشته شهريه');
                });
         session()->flash('success_message','update assign succssfully');
       return redirect()->back();
   }
   public function editassign_cancel(Request $request)
   {
       $up = Pharmacy_ondemand::where('mon_id' ,$request->mon_id)->update(['parmact' =>$request->parmact , 'state' => 0]);
         session()->flash('success_message','update assign succssfully');
       return redirect()->back();
       
   }
    public function confirm(Request $request)
   {
      Ondemand_order::find($request->id)->update(['assign' => 3]);
      return $request->id ;

   }
   
   public function rejected(Request $request)
   {
       Ondemand_order::find($request->id)->update(['assign' => 4]);
       return redirect()->back(); 
   }
   
   public function getfeedback(Request $request)
   {
       $id= $request->id;
       $getfeedback = Feedback::where('mon_id' , $request->id)->first();
       return view('admin.Monthly.get_feedback',compact('id','getfeedback'));
   }
   
   public function get_details_mon(Request $request)
   {
        $get_monthly = Ondemand_order::find($request->id);
        return view('admin.Monthly.details',compact('get_monthly'));
   }
   
   public function rejected_monthly()
   {
     $getmon = Ondemand_order::where('assign',4)->get();
     return view('admin.Monthly.index',compact('getmon')); 
   }

   public function cancel_monthly()
   {
      $getmon = Pharmacy_ondemand::where([ 'state' => 5])->get();
       
      return view('admin.Monthly.get_cancel',compact('getmon'));
   }
   
   public function getresone(Request $request)
   {
       $resone = Pharmacy_ondemand::where('mon_id' , $request->id)->first()->resone;
       return $resone; 
   }
   public function getform_cancel(Request $request)
   {
       $idmon = $request->id;
       $phar = $request->phar;
       return view('admin.Monthly.getform_cancel',compact('idmon' , 'phar'));
     
   }
   public function undone_monthly(Request $request)
   {
         $getmon = Pharmacy_ondemand::where([ 'state' => 6])->get();
       
      return view('admin.Monthly.get_undone',compact('getmon'));
   }
   public function getresoneundone(Request $request)
   {
      $resone = Pharmacy_ondemand::where('mon_id' , $request->id)->first()->resone_undone;
       return $resone;  
   }
   
}