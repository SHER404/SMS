<?php

namespace App\Http\Controllers;

use App\Models\StudentParent;
use Illuminate\Http\Request;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;


class StudentParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus =$this->globalSettings();
        $parents=StudentParent::where('campus_id',$campus->id)->get();

        return view('modules.parents.index',compact(['parents']));
    }
    public static function total_parents()
    {
        $campus_id=Auth::user()->campus_id;
       
        $data = StudentParent::where('campus_id',$campus_id)->count();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('modules.parents.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus =$this->globalSettings();
        $history = $this->newlog('parent',$campus->id,'Create','New Parent Created');
        StudentParent::create($request->post()+ ['campus_id' => $campus->id]);

        return redirect()->route('parents.index')->with('success','parent has been created successfully.');
    }
    public function newParent(Request $request){
      
        $campus =$this->globalSettings();
        
        $data= StudentParent::create($request->post()+ ['campus_id' => $campus->id]);
         info($data);
        return response(['data'=>$data],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function show(StudentParent $studentParent)
    {
        return view('modules.parents.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function edit($StudentParent)
    {
        $data = StudentParent::find($StudentParent);

        return view('modules.parents.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$studentParent)
    {
        $data = StudentParent::find($studentParent);
        $history = $this->newlog('parent',$data->id,'Update','Parent Updated');
        $data->update($request->all());
     
        return redirect()->route('parents.index')->with('success','Parent has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentParent)
    {
        $studentParent = StudentParent::find($studentParent); 
        $history = $this->newlog('parent',$studentParent->id,'Delete','Parent Deleted');
        $studentParent->delete();
        return response(['msg'=>'Deleted'], 200);
    }

    public function fetchParents(){

        $data = StudentParent::all();

        return response(['data'=>$data],200);

    }

}
