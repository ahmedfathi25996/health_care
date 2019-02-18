<?php

namespace App\Http\Controllers;
use App\AdminMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
class ChatsController extends Controller
{
       public function __construct()
      {
        $this->middleware('auth');
      }

      public function index()
       {
       return view('admin/chat/chat');
       }

       public function fetchMessages()
{
  return AdminMessages::with('user')->get();
}
public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);
broadcast(new MessageSent($user, $message))->toOthers();
  return ['status' => 'Message Sent!'];
}
}
