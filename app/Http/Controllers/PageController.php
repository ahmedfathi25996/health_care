<?php

namespace App\Http\Controllers;

use App\City;
use App\Feedback;
use App\Http\Requests;
use App\Symptom;
use App\User;
use Illuminate\Http\Request;
class PageController extends Controller
{
     public function home()
    {
        $feedbacks = Feedback::all();
        $users = User::where('role','doctor')->get();
        return view('website.index',compact('feedbacks','users'));
    }
    public function contactUs()
    {

        return view('website.contact');
    }

public function popup()
    {

        return view('website.popup');
    }


    public function services()
    {
        return view('website.services');
    }

    public function diseases()
    {
        $symptoms= Symptom::all();
       return view('website.disease',compact('symptoms'));

    }

  

    public function chat_with_doctors()
    {
        return view('website.doctors');
    }

    public function showAllDoctors(Request $request)
    {
        $city = City::all();
        $location = $request->input('city');
        $doctors = new User();
        if($location)
            $doctors = $doctors->with('city')->where('role','doctor')->where('city_id',$location);
        
        
        $doctors = $doctors->where('role','doctor')->get();
      

        
        return view('website.showalldoctors',compact('doctors','city'));
    }

    public function showAllPatients()
    {
        $patients = User::where('role','=','patient')->get();

        return view('website.showallpatients',compact('patients'));
    }

    public function showSingleDoctor($id)
    {
        $doctor = User::find($id);
        return view('website.singledoctor',compact('doctor'));
    }
//      public function filterDoctor(Request $request)
//      {

      

//      $location = $request->input('city');
//        User::where('role','doctor')->where('city','=',$location)->get();
//         return view('website.showalldoctors');




// }




}
