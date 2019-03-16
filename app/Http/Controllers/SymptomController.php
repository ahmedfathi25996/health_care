<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Symptom;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                 $symptoms=Symptom::all();

        return view('admin.symptom.index',compact('symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.symptom.add');
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
            
            
        ]);


       
       
       $symptoms=new Symptom;
      
       $symptoms->name=$request->input('name');
     

       if($symptoms->save())
       {
        activity()->causedBy(Auth::user())->useLog('Add Symptom')->log('Add Symptom By Admin');

                        Alert::success('Symptom Added Successfully');


       return redirect('/adminpanel/symptoms');
       
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
         $symptom=Symptom::find($id);
        return view('admin.symptom.edit',compact('symptom'));
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
            
            
        ]);


       
       
       $symptoms=Symptom::find($id);
      
       $symptoms->name=$request->input('name');
     

       if($symptoms->save())
       {
        activity()->causedBy(Auth::user())->useLog('Update Symptom')->log('Update Symptom By Admin');


                        Alert::success('Symptom Updated Successfully');

       return redirect('/adminpanel/symptoms');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $symptom=Symptom::find($id);
        $symptom->delete();
        activity()->causedBy(Auth::user())->useLog('Delete Symptom')->log('Delete Symptom By Admin');

        Alert::success('Symptom Deleted Successfully');

        return redirect('/adminpanel/symptoms');
    }
}
