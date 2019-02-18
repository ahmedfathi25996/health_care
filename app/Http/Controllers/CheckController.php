<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disease;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    public function check_diseases(Request $request)
    {
        $input=$request->symptoms;
        $diseases=Disease::whereHas('symptoms',function($query) use($input){
         return $query->whereIn('name',$input);
        })->get();  
        return view('website.result',compact('diseases')); 
    }
}
