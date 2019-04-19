<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\AdminModel\Mcase;
class CharityController extends Controller
{
    public function addcase_charity(Request $request)
    {
        Mcase::create($request->all());
        session()->flash('success_message','تم إرسال الحاله وسوف يتم فحصها والقبول قريبا');
        return back();
    }
    
    public function deletecase_charity(Request $request)
    {
        $case = Mcase::find($request->id);
        if($case->approval == 0)
        {
            $case->delete();
            session()->flash('success_message','تم مسح الحاله بنجاح');

        }else{
            session()->flash('error_message','تم قبول الحاله برجاء التواصل معنا لمسحها');
        }
        
        return back();
    }
}