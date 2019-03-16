<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Disease;
use Charts;
use App\Feedback;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
     public function index()
    {
        $users=User::all();
        $diseases=Disease::all();
        $feedbacks= Feedback::all();
        $activities= Activity::all();
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
        return view('admin.home.index',compact('users','lastUsers','lastDiseases','diseases','userChart','diseaseChart','feedbacks','activities'));
    }
}
