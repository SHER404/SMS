<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $campus =$this->globalSettings();
       
        $data = StudentClass::where('campus_id',$campus->id)->with(['sections','students'])->get();

        return view('modules.classes.index',compact(['data']));
    }
    public static function total_classes()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = StudentClass::where('campus_id',$campus_id)->count();
        return $data;
    }
    public static function all_classes()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = StudentClass::where('campus_id',$campus_id)->get();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.classes.add');
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
        $history = $this->newlog('Studentclass', $campus->id,'Create','StudentClass Created');
        StudentClass::create($request->post()+ ['campus_id' => $campus->id]);

        return redirect()->route('classes.index')->with('success','Class has been created successfully.');
    }
    public function newClass(Request $request)
    {   $campus =$this->globalSettings();
        $data= StudentClass::create($request->post()+ ['campus_id' => $campus->id]);

        return response(['data'=>$data],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show($studentClass)
    {
    
     return view('modules.classes.view');
    }
    public function getClasses(Request $request)
    {
       
       
        $data= StudentClass::where('campus_id',$request->campus_id)->get();
        
        return response(['data'=> $data],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit($studentClass)
    {
        $data = StudentClass::find($studentClass);

        return view('modules.classes.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentClass)
    {
        $data = StudentClass::find($studentClass);
        $history = $this->newlog('Studentclass-section', $data->id,'Update','StudentClass Section Updated');
        $data->update($request->all());
        return redirect()->route('classes.index')->with('success','Class has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentClass)
    {
        $studentClass = StudentClass::find($studentClass); 
       

        $studentClass->delete();
        $history = $this->newlog('Studentclass-section', $studentClass->id,'Delete','StudentClass Section Deleted'); 
        return response(['msg'=>'Deleted'], 200);
    }
    public function createclassModel(){
        info('abc');

        $campus =$this->globalSettings();
        $classes=  StudentClass::where('campus_id',$campus->id)->get();

        return view('modules.students.includes.create_section_model',compact('classes'));

    }
}
