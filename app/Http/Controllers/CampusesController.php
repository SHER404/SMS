<?php

namespace App\Http\Controllers;

use App\Models\Campuses;
use App\Models\AcademicSession;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CampusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Campuses::all();
        return view('modules.campuses.index',compact(['data']));
    }


    public static function activeCampus($id)
    {
        $data = Campuses::where('id', $id)->first();
        return $data;
    }
    public  function getSettings()
    {
        $campus =$this->globalSettings();
        return view('modules.crmSettings.index',compact(['campus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session= AcademicSession::all();
        return view('modules.campuses.add',compact(['session']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data =   Campuses::create($request->post());
      
        $history = $this->newlog('campuses', $data->id ,'Create','Campus Created');

        return redirect()->route('campuses.index')->with('success','campus has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campuses  $campuses
     * @return \Illuminate\Http\Response
     */
    public function show(campuses $campuses)
    {
        return view('modules.campuses.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campuses  $campuses
     * @return \Illuminate\Http\Response
     */
    public function edit($campuses)
    {   
        $user=auth()->user();
        $campus =$this->globalSettings();
       
        if(Auth::user()->hasRole('Super Admin')){
            $data = campuses::find($campuses);
            $session = AcademicSession::where('campus_id',$campuses)->get();
        }else{

            $session = AcademicSession::where('campus_id',$campus->id)->get();
            $data = campuses::find($user->campus_id);
        }
        
        
        
        return view('modules.campuses.edit',compact(['data','session']));
    }
    public static function crmSettings()
    {   
        $user=auth()->user();
        $session = AcademicSession::where('campus_id',$user->campus_id)->get();
        $data = campuses::find($user->campus_id);
        return $data;
    }
    public static function crmSessions()
    {   
        $user=auth()->user();
        $session = AcademicSession::where('campus_id',$user->campus_id)->get();
       
        return $session;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\campuses  $campuses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $campuses)
    {
        $data = campuses::find($campuses);
        $history = $this->newlog('campuses',$data->id,'Update','Campus Updated');
        $data->update($request->except('isCrm'));
        if(Auth::user()->hasRole('Super Admin') && !isset($request->isCrm)){
            return redirect()->route('campuses.index')->with('success','Campus has been updated successfully.');
        }else{
            return redirect()->back()->with('success', 'Campus has been updated successfully!');  
           
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campuses  $campuses
     * @return \Illuminate\Http\Response
     */
    public function destroy($campuses)
    {
        $campuses = campuses::find($campuses); 
        $history = $this->newlog('campuses',$campuses->id,'Delete','Campus Deleted');
        $campuses->delete();

        return response(['msg'=>'Deleted'], 200);
         
    }
}
