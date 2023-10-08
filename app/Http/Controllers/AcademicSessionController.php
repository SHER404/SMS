<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use Illuminate\Http\Request;

class AcademicSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $campus =$this->globalSettings();
        $data = AcademicSession::where('campus_id',$campus->id)->get();
       
        return view('modules.academic_sessions.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = AcademicSession::all();
        return view('modules.academic_sessions.add',compact(['data']));
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
        $history = $this->newlog('academic-session', $campus->id,'Create','Academic Session Created');
    
        AcademicSession::create($request->post()+ ['campus_id' => $campus->id]);

        return redirect()->route('academic-sessions.index')->with('success','Academic Session has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicSession  $academicSession
     * @return \Illuminate\Http\Response
     */
    public function show($academicSession)
    {
        return view('modules.academic_sessions.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicSession  $academicSession
     * @return \Illuminate\Http\Response
     */
    public function edit($academicSession)
    {
        $data = AcademicSession::find($academicSession);
       

        return view('modules.academic_sessions.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicSession  $academicSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$academicSession)
    {
        $data = AcademicSession::find($academicSession);
        $history = $this->newlog('academic-session',$data->id,'Update','Academic Session Updated');
        $data->update($request->all());
        return redirect()->route('academic-sessions.index')->with('success','Academic Session has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicSession  $academicSession
     * @return \Illuminate\Http\Response
     */
    public function destroy($academicSession)
    {
        $academicSession = academicSession::find($academicSession); 
        $history = $this->newlog('academic-session',$academicSession->id,'Delete','Academic Session Deleted');
        $academicSession->delete();

        return response(['msg'=>'Deleted'], 200);
         
    }
}
