<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserQuize;
use App\QuizeScore;
use App\Quize;
use App\UserQuestion;
use App\Gift;
use DB;
class QuizeController extends Controller
{
    public function userquize(Request $request)
    {
             UserQuize::create($request->all());
             return redirect('userquize');
    }
    
    public function getquestion()
    {
        $user = UserQuize::orderBy('created_at', 'desc')->first();
        $seed = rand(1,9999);
        $questions1  = Quize::take(7)->inRandomOrder()->get();
        if(! UserQuestion::where('user_id' , $user->id)->exists()){
            foreach($questions1 as $qes)
            {
                UserQuestion::create(['ques_id' => $qes->id , 'user_id' => $user->id]);
            }
        }
       // $questions  = Quize::inRandomOrder()->paginate(1);
        $questions  =  UserQuestion::where('user_id' , $user->id)->paginate(1);
         return view('website.quize.viewquestion',compact('questions'));
    }
    public function choseqes(Request $request)
    {
        $user = UserQuize::orderBy('created_at', 'desc')->first();
        UserQuestion::where(['user_id'=> $user->id , 'ques_id' => $request->qid])->update(['answer_id' => $request->id]);
        return 1;
    }
    
    public function gitgist(Request $request)
    {
        $get = Gift::find($request->id);
        return $get;
    }
}
