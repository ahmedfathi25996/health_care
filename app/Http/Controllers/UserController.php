<?php

namespace App\Http\Controllers;

use App\City;
use App\Events\UserRegistered;
use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $users=User::where('id','!=', Auth::user()->id)->get();
        return view('admin.user.index',compact('users'));

    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $city = City::all();
        return view('admin.user.add',compact('city'));
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
           $fileName='user-male-icon.png';
       }
       
       $users=new User;
      
       $users->name=$request->input('name');
       $users->email=$request->input('email');
       $users->password=bcrypt($request->input('password'));
       $users->address = $request->input('address');
       $users->lat = $request->input('lat');
       $users->lng = $request->input('lng');
       $users->city_id = $request->input('city');
       $users->phone_number = $request->input('phone_number');
       //$user->api_token= str_random(60);

       $users->role=$request->input('role');
       $users->activated=$request->input('activated');

       $users->image=$fileName;

       if($users->save())
       {
        activity()->causedBy($users)->useLog('Add User')->log('Add User By Admin');
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
              $city = City::all();

        return view('admin.user.edit',compact('user','city'));
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
       $user->address = $request->input('address');
       $user->lat = $request->input('lat');
       $user->lng = $request->input('lng');
       $user->city_id = $request->input('city');
       $user->phone_number = $request->input('phone_number');
      // $user->password=bcrypt($request->input('password'));
       $user->role=$request->input('role');
      // $user->image=$fileName;
       $user->save();
       activity()->causedBy($user)->useLog('Update User')->log('Update User By Admin');

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
        activity()->causedBy($user)->useLog('Delete User')->log('Delete User By Admin');

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
     activity()->causedBy(Auth::user())->useLog('Send Email')->log('Send Email By Admin');

      Alert::success('E-Mail Has Been Sent Successfuly');
     return redirect('/adminpanel');

    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password'=>'required|string|min:6|confirmed'
        ]);
        $fileName = 'null';
        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            
            $file->move($destinationPath,$fileName);
        }
        
        else{
           $fileName='user-male-icon.png';
       }
        $user= new User();
        $user->name= $request->input('name');
        $user->email=$request->input('email');
        
        
        $user->password=bcrypt($request->input('password'));

        $user->api_token= str_random(60);
        $user->image=$fileName;
        if($user->save())
        {
            Auth::login($user);
            
             event(new UserRegistered($user));
             //$job=(new ActivationJob($user->email))->delay(Carbon::now()->addSeconds(5));
             //dispatch($job);
             activity()->causedBy($user)->useLog('Registeration')->log('Register User');

            Alert::success('Register Successfully, Check Your Email For Activation', 'Success');

            return redirect('/user/profile');
        }


     

          

         
    }
     public function activation($api_token)
    {
         $user= User::active($api_token);
         if( $user)
         {
             $user->activated= 1;
            
             $user->save();
             activity()->causedBy($user)->useLog('Activation')->log('Activate User');
             Alert::success('Acount Activited Successfuly', 'Success');
             return redirect('/');
         }

       
    }

   
}
