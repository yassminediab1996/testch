<?php
namespace App\Http\Controllers\Admin;

use App\AdminModel\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Map;
use App\Ondemand_order;
use App\AdminModel\Notify;
use App\AdminModel\Pharmacy_ondemand;
use App\AdminModel\PharmMon;
use Hash;
use Mail;
use App\AdminModel\Admin;
class Pharmacy_ondemandController extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:admins',
        ]);
        $phar = Map::create($request->all());
        $email = $phar->email;
           Mail::send('website.mail.new_pharmaacy',['phar' => $phar , 'email' => $email],function($message) use ($phar,$email){
                  $message->to($email);
                  $message->subject(' خدمة الروشتة الشهرية من شفاء    ');
                });
             Mail::send('website.mail.admin_new_pharmaacy',['phar' => $phar],function($message) use ($phar){
                  $message->to('info@chefaa.com');
                  $message->subject(' add new pharmacy ');
                });
              Mail::send('website.mail.admin_new_pharmaacy',['phar' => $phar],function($message) use ($phar){
                  $message->to('doaa@chefaa.com');
                  $message->subject(' add new pharmacy ');
                });
                  Mail::send('website.mail.admin_new_pharmaacy',['phar' => $phar],function($message) use ($phar){
                  $message->to('order@chefaa.com');
                  $message->subject(' add new pharmacy ');
                });
               
         $per = json_encode(21);
        Admin::create(['name' => $request->name , 'email' => $request->email , 'password' => Hash::make($request->password) ,'permission' => $per]);
        session()->flash('success_message','added succefully');

        return redirect()->back();
    }
    
    public function viewpharmacyorder($id)
    {
          $phar = Admin::find($id);
          $pharmacy = Map::where('email',$phar->email)->first();
          $getall = Pharmacy_ondemand::where('pharmacy_id',$pharmacy->id)->get();
          return view('admin.ondemand.vieworder',compact('getall'));
    }
    
    public function delete($id)
    {
        $email = Map::find($id);
        Map::find($id)->delete();
        $getall = PharmMon::where('parmact' , $id)->get();
        $getnot = Notify::where('phar_id',$id)->get();
        Admin::where('email' , $email->email)->delete();
        foreach($getall as $get)
        {
            $get->delete();
        }
        foreach($getnot as $not)
        {
            $not->delete();
        }
        session()->flash('success_message','deleted succefully');
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        return Map::find($request->id);
    }
    public function update(Request $request)
    {
       
        // $phar = Map::find($request->id);
        
        // if($request->email)
        // {
        //     Admin::where('email' , $phar->email)->update(['email' => $request->email]);
            
        // }elseif($request->password){
            
        //   Admin::where('email' , $phar->email)->update(['password' => Hash::make($request->password)]);

        // }else{
            Map::find($request->id)->update($request->all());
       // }
        session()->flash('success_message','updated succsssuflly');
        return back();
    }
    public function index2()
    {
        $getmaps = Map::all();
        return view('admin.ondemand.index2',compact('getmaps'));
    }
    public function vieworders($id)
    {
        $getall = PharmMon::where('parmact',$id)->get();
        return view('admin.ondemand.vieworder',compact('getall'));
    }
    
   public function chngmon(Request $request)
   {
       if($request->id == 4) // done
       {
           return 1;
       }elseif($request->id == 5) { // cancel
           return 2;
       }elseif($request->id == 6) // undone
       {
           return 3;
       }
       else{
         pharmacy_ondemand::find($request->order)->update(['state' => $request->id]);
         $phmon = pharmacy_ondemand::find($request->order);
         $phar = Map::find($phmon->pharmacy_id);
         $client = Ondemand_order::find($phmon->ondemand_id);
         $email = $client->email;
         $getproducts = $client;
        
         if($request->id == 1) // confirmed
         {
             Notify::create(['phar_id' => $phmon->pharmacy_id , 'mon_id' => $request->monid , 'text' => $phar->name.' pharmacy confirmed order for  '.$client->name  ]);
                     Mail::send('website.mail.pharm_confirm_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('order@chefaa.com');
                  $message->subject('pharmacy confirm monthly package');
                });
                   Mail::send('website.mail.pharm_confirm_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('doaa@chefaa.com');
                  $message->subject('pharmacy confirm monthly package');
                });
                   Mail::send('website.mail.pharm_confirm_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('info@chefaa.com');
                  $message->subject('pharmacy confirm monthly package');
                });
                
                 
         } 
         if($request->id == 2) // preparing
         {
              Notify::create(['phar_id' => $phmon->pharmacy_id , 'mon_id' => $request->monid , 'text' => $phar->name.' pharmacy praparing order for  '.$client->name  ]);
            Mail::send('website.mail.prepare_patient',['getproducts' => $getproducts, 'email' => $email],function($message) use ($getproducts ,$email){
                      $message->to($email);
                      $message->subject('   جاري تحضير الروشتة الشهرية');
                    }); 
                    
                       Mail::send('website.mail.pharm_prepare_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('order@chefaa.com');
                          $message->subject('pharmacy preparing monthly package');
                        });
                        
                          Mail::send('website.mail.pharm_prepare_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('doaa@chefaa.com');
                          $message->subject('pharmacy preparing monthly package');
                        });
                        
                          Mail::send('website.mail.pharm_prepare_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('info@chefaa.com');
                          $message->subject('pharmacy preparing monthly package');
                        });
                        
         } 
         elseif($request->id == 3) // delevering
         {
                          Notify::create(['phar_id' => $phmon->pharmacy_id , 'mon_id' => $request->monid , 'text' => $phar->name.' pharmacy delevered order for  '.$client->name  ]);

            Mail::send('website.mail.deliver_patient',['getproducts' => $getproducts, 'email' => $email],function($message) use ($getproducts ,$email){
                      $message->to($email);
                      $message->subject('   تم شحن طلبك من خدمة الروشتة الشهرية 
    ');
                    }); 
                    
                     Mail::send('website.mail.pharm_deliver_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('order@chefaa.com');
                          $message->subject('pharmacy delevering monthly package');
                        });
                        
                           Mail::send('website.mail.pharm_deliver_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('doaa@chefaa.com');
                          $message->subject('pharmacy delevering monthly package');
                        });
                        
                           Mail::send('website.mail.pharm_deliver_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('info@chefaa.com');
                          $message->subject('pharmacy delevering monthly package');
                        });
                       
         } 
        
         
       }
       session()->flash('success_message','updated succefully');
        return redirect()->back();
   }
   
   public function adddetails(Request $request)
   {
          pharmacy_ondemand::find($request->order)->update(['state' => $request->id , 'total' => $request->total , 'date' => $request->date]);
         $phmon = pharmacy_ondemand::find($request->order);
         $phar = Map::find($phmon->pharmacy_id);
         $client = Ondemand_order::find($phmon->ondemand_id);
         $email = $client->email;
              Notify::create(['phar_id' => $phmon->pharmacy_id , 'mon_id' => $request->monid , 'text' => $phar->name.' pharmacy done order for  '.$client->name  ]);
          Mail::send('website.mail.done_patient',['getproducts' => $client, 'email' => $email],function($message) use ($client ,$email){
                      $message->to($email);
                      $message->subject('تم تسليم طلبك برجاء تقييم الخدمة');
                    });
                    
                       Mail::send('website.mail.pharm_done_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('order@chefaa.com');
                          $message->subject('pharmacy  delivered monthly package');
                        });
                        
                         Mail::send('website.mail.pharm_done_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('doaa@chefaa.com');
                          $message->subject('pharmacy  delivered monthly package');
                        });
                        
                         Mail::send('website.mail.pharm_done_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                          $message->to('info@chefaa.com');
                          $message->subject('pharmacy  delivered monthly package');
                        });
                        
       session()->flash('success_message','updated succefully');
        return redirect()->back(); 
    
   }
   
   public function get_details_mon(Request $request)
   {
       $get_monthly = Ondemand_order::find($request->id);
       return view('admin.ondemand.detalis',compact('get_monthly'));
   }
   
   public function resone_cancel(Request $request)
   {
      pharmacy_ondemand::find($request->order)->update(['state' => $request->id , 'resone' => $request->resone]);
         $phmon = pharmacy_ondemand::find($request->order);
         $phar = Map::find($phmon->pharmacy_id);
         $client = Ondemand_order::find($phmon->ondemand_id);
         $email = $client->email;
              Notify::create(['phar_id' => $phmon->pharmacy_id , 'mon_id' => $request->monid , 'text' => $phar->name.' pharmacy canceled order for  '.$client->name  ]);
        Mail::send('website.mail.pharm_reject_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('order@chefaa.com');
                  $message->subject('pharmacy rejected order');
                });
                
                  Mail::send('website.mail.pharm_reject_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('doaa@chefaa.com');
                  $message->subject('pharmacy rejected order');
                });
                
                  Mail::send('website.mail.pharm_reject_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('info@chefaa.com');
                  $message->subject('pharmacy rejected order');
                });
                
       session()->flash('success_message','updated succefully');
        return redirect()->back();
   }
   public function resone_undone(Request $request)
   {
     //  dd($request->all());
        pharmacy_ondemand::find($request->order)->update(['state' => $request->id , 'resone_undone' => $request->resone]);
         $phmon = pharmacy_ondemand::find($request->order);
         $phar = Map::find($phmon->pharmacy_id);
         $client = Ondemand_order::find($phmon->ondemand_id);
         $email = $client->email;
              Notify::create(['phar_id' => $phmon->pharmacy_id , 'mon_id' => $request->monid , 'text' => $client->name.'  canceled order for  '.$phar->name  ]);
        
        Mail::send('website.mail.pharm_reject_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('order@chefaa.com');
                  $message->subject('customer rejected order');
                });
                  Mail::send('website.mail.pharm_reject_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('doaa@chefaa.com');
                  $message->subject('customer rejected order');
                });
                  Mail::send('website.mail.pharm_reject_admin',['phar' => $phar , 'email' => $email , 'client' => $client , 'phmon' => $phmon],function($message) use ($phar,$email ,$client,$phmon){
                  $message->to('info@chefaa.com');
                  $message->subject('customer rejected order');
                });
                 
       session()->flash('success_message','updated succefully');
        return redirect()->back();
   }
}