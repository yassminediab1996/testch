<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ImageProduct;
use App\AdminModel\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PDF;
class ItemController extends Controller
{

    public function pdfview(Request $request)
    {
        $items = DB::table("items")->get();
        view()->share('items',$items);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }


        return view('pdfview');
    }
}