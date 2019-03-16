<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Symptom;
use App\User;
use App\Feedback;
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

    public function showAllDoctors()
    {
        $doctors = User::where('role','=','doctor')->get();
        return view('website.showalldoctors',compact('doctors'));
    }

    public function showAllPatients()
    {
        $patients = User::where('role','=','patient')->get();

        return view('website.showallpatients',compact('patients'));
    }




}
