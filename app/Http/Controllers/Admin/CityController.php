<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::where('parent',0)->get();
        return view('admin.City.index',compact('cities'));

    }
    public function index2()
    {
        $cities = City::where('parent',0)->get();
        $subcity = array();
        foreach($cities as $city)
        {
          $subcity = City::where('parent',$city->id)->get();

        }
        return view('admin.City.index2',compact('subcity'));
    }
    public function Create(Request $request)
    {
         City::create($request->all());
        session()->flash('success_message', 'added  successful!');
        return redirect()->back();
    }

    public function update(Request $request)
    {

        unset($request['_token']);

        City::whereId($request->id)->update($request->all());
         session()->flash('success_message', 'updated  successful!');
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        return City::find($request->id);
    }
    public function delete(Request $request)
    {
        City::find($request->id)->delete();
        session()->flash('success_message', 'deleted  successful!');
        return redirect()->back();
    }
    
    public function addstate(Request $request)
    {
        City::create($request->all());
        session()->flash('success_message', 'added  successful!');
        return redirect()->back();
    }
    public function getallstate(Request $request)
    {
       $allstate =  City::where('parent',$request->id)->get();
       dd($allstate);
       return $allstate;
    }
}
