<?php

namespace App\Http\Controllers;

use App\AdminModel\Mcase;
use App\UserCase;
use DB;
use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
  public function feedback(Request $request)
  {
         $this->validate($request,[
            'star_q1' => 'required',
            'star_q2' => 'required',
            'star_q3' => 'required',
            'note_q1' => 'required',
            'note_q2' => 'required',
            'note_q3' => 'required',
        ]);
      unset($request['ss']);
     if(Feedback::where('mon_id',$request->mon_id)->exists())
     {
              session()->flash('error_message','تم إرسال رايك مسبقا ');

     }else{
     Feedback::create($request->all());
     session()->flash('success_message','شكرا لك');
     
     }return back();
  }
} 
    
