<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Feedback;
use Illuminate\Support\Facades\Auth;

class ContactusController extends Controller
{
    public function SendMessage(Request $request)
    {
         $this->validate($request,[
         	'firstname'=>'required',
         	'lastname'=>'required',
         	'email'=>'required|email',
         	'message'=>'required',

         ]);

         $data=[
         'firstname'=>$request->firstname,
         'lastname'=>$request->lastname,
         'subject'=>$request->subject,
         'email'=>$request->email,
         'body'=>$request->message
          
         ];
         Mail::send('email.contactus',$data,function($message) use($data){
         	$message->from($data['email']);
          $message->to('HealthManagement25996@gmail.com');
          $message->subject($data['subject']);
         });
         Alert::success('Message Sent Successfuly', 'Success');
         return back();
    }

    public function feedback(Request $request)
    {
         $this->validate($request,[
         	'firstname'=>'required',
         	'lastname'=>'required',
         	
         	'comment'=>'required',

         ]);

        $feedback = new Feedback();
        $feedback->user_id= Auth::user()->id;
        $feedback->comment = $request->input('comment');
        $feedback->save();
         Alert::success('Feedback Added Successfuly', 'Success');
         return back();
    }
}
