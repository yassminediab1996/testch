<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\search;
use App\User;
use App\UserCase;
use App\Monthly;
use App\AdminModel\City;
use Auth;
class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
    public function search(Request $request)
    {
         $this->validate($request,[
            'email' => 'required|string|email',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'search' => 'required|string',
            'goverid' => 'required',
            'state_id' => 'required',
        ]);
       
       search::create($request->all());
       session()->flash('success_message', 'تم الارسال بنجاح');
       return redirect()->back();
    }

     public function getallstate(Request $request)
    {
       $allstate =  City::where('parent',$request->id)->get();
       return $allstate;
    }
    public function logout()
    {
        Auth()->logout();
        return redirect('/store');
    }
    public function store()
    {
        return view('website.index');
    }
    public function sendsearch($search)
    {
        return view('website.sendsearch',compact('search'));
    }
    public function profile_from_monthly($id)
    {
        //  $data = User::find($id);
        // if(Auth::attempt(['email' => $data->email , 'password' => $data->password ])){
        //      $data_mon  = Monthly::where('email' , $data->email)->first();
        //      $user_case = UserCase::where('user_id' ,$data->id)->get();
        //      session()->flash('success_message','ي');
        //      return view('website.newprofile',compact('data' ,'data_mon','user_case'));
        // }else{
        //       session()->flash('error_message', '  كلمة المرور او البريد غير صحيحة');
        //       return back();
        // }
          $data = User::find($id);
          $data_mon  = Monthly::where('email' , $data->email)->first();
          $user_case = UserCase::where('user_id' ,$data->id)->get();
         return view('website.newprofile',compact('data' ,'data_mon','user_case'));

    }
  public function profile($id) { 
          
        $data = User::find($id);
        $data_mon = Monthly::where('email' , $data->email)->first();
        $user_case = UserCase::where('user_id' ,$data->id)->get();
        return view('website.newprofile',compact('data' ,'data_mon','user_case'));
      }
      
      public function charity_profile() {
          return view('website.charity_profile');
          
      }

      public function profilenew($id)
      { 
          
        $data = User::find($id);
        $data_mon = Monthly::where('email' , $data->email)->first();
        //   return view('website.profile',compact('data' ,'data_mon'));
        return view('website.profilenew',compact('data' ,'data_mon'));
      }

    public function updateprofile(Request $request)
    {
         $this->validate($request,[
            'state_id' => 'required',
           // 'email' => 'required|string|email|max:255|unique:users',
        ]);
      
            unset($request['_token']);
            $user = User::find($request->id);
            if($request->email == $user->email )
            {
                 if($request->hasFile('file')){
                    $file = $request->file('file');
                    $filename = time() . '.' .$file->getClientOriginalName();
                    $destinationPath = 'uploads/files';
                    $file->move($destinationPath,$filename);
                    $request['img'] = $filename;
                   }
                    User::whereId($request->id)->update($request->except(['file']));
                    session()->flash('success_message', 'تم تحديث بياناتك بنجاح ');
                    return redirect()->back();
            }else{
                $users = User::all();
                $check = 0;
                foreach($users as $user)
                {
                    if($request->email == $user->email)
                    {
                        $check = 1;
                    }
                }
                
                if($check == 1)
                {
                  session()->flash('error_message', 'الإيميل مستخدم من قبل ');

                 return redirect()->back();
                    
                }if($request->password)
                {
                     if($request->hasFile('file')){
                    $file = $request->file('file');
                    $filename = time() . '.' .$file->getClientOriginalName();
                    $destinationPath = 'uploads/files';
                    $file->move($destinationPath,$filename);
                    $request['img'] = $filename;
                   }
                    $request['password'] = Hash::make($request->password);
                    User::whereId($request->id)->update($request->except(['file']));
                    session()->flash('success_message', 'تم تحديث بياناتك بنجاح ');
        
                   return redirect()->back();
                }
                else{
                    if($request->hasFile('file')){
                    $file = $request->file('file');
                    $filename = time() . '.' .$file->getClientOriginalName();
                    $destinationPath = 'uploads/files';
                    $file->move($destinationPath,$filename);
                    $request['img'] = $filename;
                   }
                    User::whereId($request->id)->update($request->except(['file']));
                    session()->flash('success_message', 'تم تحديث بياناتك بنجاح ');
        
                   return redirect()->back();
                }
            }
         
    }
  
}
