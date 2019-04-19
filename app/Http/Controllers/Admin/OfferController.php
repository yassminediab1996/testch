<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offer.index',compact('offers'));

    }

    public function Create(Request $request)
    {
        $offer = new Offer();
        $offer->product_id = $request->product_id;
        $offer->percentage = $request->percentage;
        $offer->deadline_offer = $request->deadline_offer;
        $offer->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {

        unset($request['_token']);

      //  Offer::updateOrCreate(['day_id' => $request->day_id , 'doctor_id' => $request->doctor_id],['type' => $t]);
        Offer::updateOrCreate(['product_id' => $request->product_id],$request->except(['id']));
       // Offer::whereId($request->id)->update($request->except(['file']));
        return redirect()->back();
    }
    public function Getinfo(Request $request)
    {
        // $request['o_price'] = Product::Price($request->id);
        return Offer::find($request->id);
    }
    public function delete(Request $request)
    {
        Offer::find($request->id)->delete();
        return redirect()->back();
    }
}
