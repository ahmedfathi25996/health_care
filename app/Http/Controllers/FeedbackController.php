<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
	public function index(){
    $feeds = Feedback::all();
    return view('admin.feedbacks.index',compact('feeds'));
}
}
