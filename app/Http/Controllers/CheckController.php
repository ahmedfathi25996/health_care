<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disease;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
class CheckController extends Controller
{
    public function check_diseases(Request $request)
    {
    	


        $input=$request->symptoms;
        $diseases=Disease::whereHas('symptoms',function($query) use($input){
         return $query->whereIn('name',$input);
        })->get();  
        activity()->causedBy(Auth::user())->useLog('Check Diseases')->log('Check for Any Kind OF Diseases');

        return view('website.result',compact('diseases')); 
    }
}
