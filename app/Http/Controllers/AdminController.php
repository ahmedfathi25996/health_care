<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Feedback;
use App\Http\Requests;
use App\Symptom;
use App\User;
use Charts;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
     public function index()
    {
        $users=User::all();
        $diseases=Disease::all();
        $feedbacks= Feedback::all();
        $activities= Activity::all();
        $symptoms = Symptom::orderBy('id','desc')->take(5)->get();
        $lastUsers = User::orderBy('id', 'desc')->take(8)->get();
        $lastDiseases = Disease::orderBy('id', 'desc')->take(8)->get();
        $userChart = Charts::database(User::all(), 'bar', 'highcharts')
        ->responsive(false)
        ->width(0)
        ->title("Monthly User Insertion")
        ->elementLabel("Total Users")
        ->dimensions(500, 300)
        ->groupByMonth('2019', true);

        $diseaseChart = Charts::database(Disease::all(), 'bar', 'highcharts')
        ->responsive(false)
        ->width(0)
        ->title("Monthly Diseases Insertion")
        ->elementLabel("Total Diseases")
        ->dimensions(500, 300)
        ->groupByMonth('2019', true);
        return view('admin.home.index',compact('users','lastUsers','lastDiseases','diseases','userChart','diseaseChart','feedbacks','activities','symptoms'));
    }
}
