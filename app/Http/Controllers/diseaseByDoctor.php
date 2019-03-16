<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disease;
use App\Symptom;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
class diseaseByDoctor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases=Disease::all();
        return view('website.diseases.index',compact('diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $symptoms=Symptom::all();
         return view('website.diseases.add',compact('symptoms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diseases=new Disease;
     
       $diseases->name=$request->input('name');

       $diseases->description=$request->input('description');
       $diseases->save();
 $diseases->symptoms()->attach($request->symptoms);
       if($diseases->save())
       {
        activity()->causedBy(Auth::user())->useLog('Add Disease')->log('Add Disease');

                Alert::success('Disease Added Successfully');

       return redirect('/doctor/diseases');
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
        $disease=Disease::find($id);
        $symptoms=Symptom::all();
        return view('website.diseases.edit',compact('disease','symptoms'));
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
            'disease_name' => 'required',
            
            
        ]);
        $disease=Disease::find($id);
       $disease->name=$request->input('name');

       $disease->save();
 $disease->symptoms()->attach($request->symptoms);
       if($disease->save())
       {
        activity()->causedBy(Auth::user())->useLog('Update Disease')->log('Update Disease By Doctor');

                Alert::success('Disease Updated Successfully');

       return redirect('/doctor/diseases');
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
        $disease=Disease::find($id);
        $disease->delete();
        activity()->causedBy(Auth::user())->useLog('Delete Disease')->log('Delete Disease By Doctor');

                Alert::success('Disease Deleted Successfully');

        return redirect('/doctor/diseases');
    }
}
