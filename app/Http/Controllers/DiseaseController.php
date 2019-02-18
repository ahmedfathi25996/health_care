<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disease;
use App\Symptom;
use RealRashid\SweetAlert\Facades\Alert;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $diseases=Disease::all();
        return view('admin.disease.index',compact('diseases','symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $symptoms=Symptom::all();
         return view('admin.disease.add',compact('symptoms'));

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
        // $this->validate($request,[
        //     'disease_name' => 'required',
        //     'symptom1'=> 'required',
        //     'symptom2'=> 'required',
        //     'symptom3'=> 'required',
            
        // ]);


       
       
       $diseases=new Disease;
     
       $diseases->name=$request->input('name');
       $diseases->save();
 $diseases->symptoms()->attach($request->symptoms);
       if($diseases->save())
       {
                Alert::success('Disease Added Successfully');

       return redirect('/adminpanel/diseases');
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
        return view('admin.disease.edit',compact('disease','symptoms'));
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
            'symptom1'=> 'required',
            'symptom2'=> 'required',
            'symptom3'=> 'required',
            
        ]);
        $diseases=Disease::find($id);
      $sym1=Symptom::find($request->input('symptom1'));
      $sym2=Symptom::find($request->input('symptom2'));
      $sym3=Symptom::find($request->input('symptom3'));
       $diseases->disease_name=$request->input('disease_name');
       $diseases->symptom1=$sym1->id;
      
       $diseases->symptom2=$sym2->id;
      $diseases->symptom3=$sym3->id;

       if($diseases->save())
       {
                Alert::success('Disease Updated Successfully');

       return redirect('/adminpanel/diseases');
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
                Alert::success('Disease Deleted Successfully');

        return redirect('/adminpanel/diseases');
    }
}
