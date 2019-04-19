<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\OrderProduct;
class ItemController extends Controller
{

    public function pdfview(Request $request)
    {
        $getproducts = OrderProduct::where('order_id',$request->order)->get();
        view()->share('getproducts',$getproducts);

        if($request->has('download')){
            $pdf = PDF::loadView('admin.order.pdfview');
            return $pdf->download('pdfview.pdf');
        }

        return redirect('admin/order/pdfview/');
    }
}