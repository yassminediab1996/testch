<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\search;
use App\Order;
use App\AdminModel\City;
use DB;
class SearchController extends Controller
{
    public function Getsearch()
    {
        $get = search::all();
        return view('admin.search.index',compact('get'));
    }
    
    public function defaultlinechart()
    {
        $getall = array();
        $arrstate = array();
        $count = 0;
        date_default_timezone_set('Africa/Cairo');
            // $getall = search::orderBy('id','DESC')->take(10)->get();
            $getall = DB::table('search')
                 ->select(DB::raw('date(created_at) as create_date'), DB::raw('count(created_at) as count'))
                 ->groupBy(DB::raw('date(created_at)') )
                 ->orderBy('id','DESC')
                 ->limit(10)
                 ->get();
                  foreach($getall as $get)
                    {
                        $value = 'last 10 orders';
                        $id =  1;
                        $arrstate[$value]['name'] = $value ;
                        $arrstate[$value]['date'][] =  $get->create_date ;
                        $arrstate[$value]['count'][] =  $get->count ;
                        $arrstate[$value]['id'] = $id;
                    }
                    
                       $result = [];
            foreach($arrstate as $stat) $result[] = $stat;
         
            return $result;
    }
    
    public function defalultdata()
    {
        $data = search::orderBy('id','DESC')->get();
        return view('admin.search.datatable',compact('data'));
    }
    public function insightdate(Request $request)
    {
        $getall = array();
        $arrstate = array();
        
        $count = 0;
        date_default_timezone_set('Africa/Cairo');
        if($request->fromdate and $request->todate and  $request->state_id == null){
            $getall = DB::table('search')
                 ->select(DB::raw('date(created_at) as create_date'),'goverid', DB::raw('count(created_at) as count'))
                  ->whereBetween(DB::raw('date(created_at)'), array($request->fromdate,$request->todate))
                 ->where('goverid' , $request->goverid)
                 ->groupBy(DB::raw('date(created_at)') , 'goverid')
                 ->get();
                
                  foreach($getall as $get)
                    {
                        $value = City::find($get->goverid)->name_en;
                        $id =  City::find($get->goverid)->id;
                        $arrstate[$value]['name'] = $value ;
                        $arrstate[$value]['date'][] = $get->create_date ;
                        $arrstate[$value]['count'][] = $get->count ;
                        $arrstate[$value]['id'] = $id;
                    }
                 
        }elseif($request->state_id == null and $request->fromdate == null and $request->todate == null){
            $getall = DB::table('search')
                 ->select(DB::raw('date(created_at) as create_date'),'goverid', DB::raw('count(created_at) as count'))
                 ->where('goverid' , $request->goverid)
                 ->groupBy(DB::raw('date(created_at)') , 'goverid')
                 ->get();
                  foreach($getall as $get)
            {
                $value= City::find($get->goverid)->name_en;
                $id =  City::find($get->goverid)->id;
                $arrstate[$value]['name'] = $value ;
                $arrstate[$value]['date'][] = $get->create_date ;
                $arrstate[$value]['count'][] = $get->count ;
                $arrstate[$value]['id'] = $id;
            }
        }elseif($request->state_id  and $request->fromdate and $request->todate ){
                  $getall = DB::table('search')
                 ->select(DB::raw('date(created_at) as create_date'),'state_id', DB::raw('count(created_at) as count'))
                 ->whereBetween(DB::raw('date(created_at)'), array($request->fromdate,$request->todate))
                 ->where('state_id' , $request->state_id)
                 ->groupBy(DB::raw('date(created_at)') , 'state_id')
                 ->get();
                 foreach($getall as $get)
                 {
                        $value= City::find($get->state_id)->name_en;
                        $id =  City::find($get->state_id)->id;
                        $arrstate[$value]['name'] = $value ;
                        $arrstate[$value]['date'][] = $get->create_date ;
                        $arrstate[$value]['count'][] = $get->count ;
                        $arrstate[$value]['id'] = $id;
                  }
        }elseif($request->state_id  and $request->fromdate == null and $request->todate == null ){
                  $getall = DB::table('search')
                 ->select(DB::raw('date(created_at) as create_date'),'state_id', DB::raw('count(created_at) as count'))
                 ->where('state_id' , $request->state_id)
                 ->groupBy(DB::raw('date(created_at)') , 'state_id')
                 ->get();
                  foreach($getall as $get)
            {
                $value= City::find($get->state_id)->name_en;
                $id =  City::find($get->state_id)->id;
                $arrstate[$value]['name'] = $value ;
                $arrstate[$value]['date'][] = $get->create_date ;
                $arrstate[$value]['count'][] = $get->count ;
                $arrstate[$value]['id'] = $id;
            }
        }
           
            $result = [];
            foreach($arrstate as $stat) $result[] = $stat;
         
            return $result;
    }
    
  
      public function downloadTxt()
    {
      $txt = "";
      $datas = search::select('name')
                ->orderBy('id','desc')
                ->get();
               // dd($datas);
               $i = 2;
      foreach($datas as $data){
      $txt .= $data['name'].PHP_EOL;
      $txt .= $i;
      $i++;
      }
    //  echo $txt;
      //dd($txt);
      $txtname = date("Y-m-d h:i:s").'-search.txt';
         $headers = ['Content-type'=>'text/plain', 'test'=>'YoYo', 'Content-Disposition'=>sprintf('attachment; filename="%s"', $txtname),'X-BooYAH'=>'WorkyWorky','Content-Length'=>strlen($txt)];
            return \Response::make($txt , 200, $headers );
           

    }
    
    public function deleteorder($id)
    {
        Order::find($id)->delete();
        session()->flash('success_message', 'order deleted!');

        return redirect()->back();
    }
    
    public function getdatainsight(Request $request)
    {
        
            if(search::where('state_id' , $request->data[0]['id'])->exists() )
            {
                $data = search::where('state_id' , $request->data[0]['id'])->get();
                
            }elseif(search::where('goverid' , $request->data[0]['id'])->exists())
            {
                $data = search::where('goverid' , $request->data[0]['id'])->get();
            }
      //  dd($request->data[0]['id']);
        //$data = $request->data; 
        return view('admin.search.datatable',compact('data'));
    }
    
      public function getstateinsight(Request $request)
    {
  
        $data = $request->data; 
        return view('admin.search.getstateinsight',compact('data'));
    }
    public function getdrugname(Request $request)
    {
      $getall = search::where('state_id' , $request->stateid)->whereDate('created_at' , $request->data)->get(); 
      return view('admin.search.getdatainsight2',compact('getall'));
    }
}