<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Symptom;
use App\User;
class PageController extends Controller
{
     public function home()
    {
        return view('website.index');
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

    public function profile()
    {
      $users=User::all();
      return view('website.profile',compact('users'));
    }

    public function chat_with_doctors()
    {
        return view('website.doctors');
    }




}
