<?php

namespace App\Http\Controllers;

use App\AdminModel\Product;
use App\FavPro;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
     public function Subscribe(Request $request)
     {
         dd($request->all());
     }
}