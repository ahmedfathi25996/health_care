<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Validation
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240 ',
        ]);


        //Handel Upload User Image
        $fileName = 'null';
        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            
            $file->move($destinationPath,$fileName);
        }
        
        else{
           $fileName='user-male-icon.jpg';
       }
       
       $users=new User;
      
       $users->name=$request->input('name');
       $users->email=$request->input('email');
       $users->password=bcrypt($request->input('password'));
       $users->role=$request->input('role');
       $users->image=$fileName;

       if($users->save())
       {
        activity()->causedBy($users)->log('Look mum, I logged something');
        Alert::success('User Added Successfuly', 'Success');
       return redirect('/adminpanel/users');
       }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validation
         $this->validate($request,[
            'name' => 'required',
            'email'=> 'required',
            //'password'=> 'required',
            'role'=>'required',
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240 ',
        ]);


        //Handel Upload User Image
        
       //  if($request->hasFile('image')){
       //      $file = $request->file('image') ;
       //      $fileName = $file->getClientOriginalName() ;
       //      $destinationPath = public_path().'/images/' ;
            
       //      $file->move($destinationPath,$fileName);
       //  }
        
       //  else{
       //     $fileName='noimage.jpg';
       // }
       
       $user=User::find($id);
      
       $user->name=$request->input('name');
       $user->email=$request->input('email');
      // $user->password=bcrypt($request->input('password'));
       $user->role=$request->input('role');
      // $user->image=$fileName;
       $user->save();
        Alert::success('User Updated Successfuly');
       return redirect('/adminpanel/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user=User::find($id);
        $user->delete();
        Alert::success('User Deleted Successfuly');

        return redirect('/adminpanel/users');
    }

    public function sendEmail(Request $request)
    {
      $data= array(
        'email'=>$request->email,
        'subject'=>$request->subject,
        'msg'=>$request->message
      );
     Mail::send('email.newsletter',$data,function($message) use($data){
      
      $message->to($data['email']);
      $message->subject($data['subject']);

     });
      Alert::success('E-Mail Has Been Sent Successfuly');
     return redirect('/adminpanel');

    }
}
