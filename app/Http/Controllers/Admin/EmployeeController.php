<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Mcase;
use App\UserCase;
use App\AdminModel\Admin;
use Hash;
class EmployeeController extends Controller
{
       public function index()
        {
            $supcategories = Admin::where('permission' , '!=',19 )->get();
            return view('admin.emp.index',compact('supcategories'));
    
        }

      public function Create(Request $request)
    {
     $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:admins',
        ]);
     if($request->per[0] == 20)
     { 
         
         Admin::create(['name' => $request->name , 'password' => Hash::make($request->password) , 'email' => $request->email ,'permission' => 20]);

     }else{
        Admin::create(['name' => $request->name , 'password' => Hash::make($request->password) , 'email' => $request->email ,'permission' => json_encode($request->per)]);
     }
         session()->flash('success_message', 'add new employee  successful!');
        
        return redirect('17$es12/employee');
    }

    public function update(Request $request)
    {
        unset($request['_token']);
     
        $request['permission'] = json_encode($request->per);
        unset($request['per']);
        if (empty($request['password'])) unset($request['password']);
        else $request['password'] = bcrypt($request['password']);
        Admin::whereId($request->id)->update($request->all());
        session()->flash('success_message', '    edited successfully !');
        return redirect('17$es12/employee');
    }
    public function update2(Request $request)
    {
       unset($request['_token']); 
       if ($request['password'] == null) unset($request['password']);
         else $request['password'] = bcrypt($request['password']);
        Admin::whereId($request->id)->update($request->all());
        
        session()->flash('success_message', ' edited successfully !');
        return redirect('17$es12/employee');
    }
    public function update3(Request $request)
    {
       unset($request['_token']); 
       if ($request['password'] == null) unset($request['password']);
         else $request['password'] = bcrypt($request['password']);
        Admin::whereId($request->id)->update($request->all());
        
        session()->flash('success_message', ' edited successfully !');
        return redirect('17$es12/employee');
    }
    public function update4(Request $request)
    {
       unset($request['_token']); 
       if ($request['password'] == null) unset($request['password']);
         else $request['password'] = bcrypt($request['password']);
        Admin::whereId($request->id)->update($request->all());
        
        session()->flash('success_message', ' edited successfully !');
        return redirect('17$es12/employee');
    }
    public function Getinfo(Request $request)
    {
        // $request['o_price'] = Product::Price($request->id);
        return Admin::find($request->id);
    }
    public function delete(Request $request)
    {
        Admin::find($request->id)->delete();
         session()->flash('success_message', '    deleted successfully !');
        return redirect()->back();
    }
    

}