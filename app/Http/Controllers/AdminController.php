<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Disease;
use Charts;
class AdminController extends Controller
{
     public function index()
    {
        $users=User::all();
        $diseases=Disease::all();
        $lastUsers = User::orderBy('id', 'desc')->take(8)->get();
        $lastDiseases = Disease::orderBy('id', 'desc')->take(8)->get();
        $chart = Charts::database(User::all(), 'bar', 'highcharts')
        ->responsive(false)
        ->width(0)
        ->title("Monthly User Insertion")
        ->elementLabel("Total Users")
        ->dimensions(500, 300)
        ->groupByMonth('2018', true);
        return view('admin.home.index',compact('users','lastUsers','lastDiseases','diseases','chart'));
    }
}
