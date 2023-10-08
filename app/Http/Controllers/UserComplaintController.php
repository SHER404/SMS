<?php

namespace App\Http\Controllers;

use App\Models\Campuses;
use App\Models\StudentClass;
use App\Models\UserComplaint;
use Illuminate\Http\Request;

class UserComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus =$this->globalSettings();
       
        $data = UserComplaint::where('campus_id',$campus->id)->with(['class','classSection'])->get();
        return view('modules.complaint.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses = Campuses::all();
        $campus =$this->globalSettings();
        $classes = StudentClass::where('campus_id',$campus->id)->get();
        return view('modules.complaint.add',compact(['campuses','classes']));
    }
    public function track(Request $request)
    {   
        $comp=null;
        $error=0;
        if($request->tid){
            $comp = UserComplaint::where('tracking_id',$request->tid)->first();
            if(!$comp){
                $error=1;
            }
        }else{
            $comp = UserComplaint::where('tracking_id',0)->first();
            
        }
        
        return view('modules.complaint.track',compact(['comp','error']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateTID()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkTID($trackingid);
    }
    public function checkTID($trackingdid)
    {
        $verifytrackingid = UserComplaint::where('tracking_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateTID();
        }
    }
    public function store(Request $request)
    {
        $tid=$this->generateTID();
        $comp = UserComplaint::create($request->post()+['tracking_id' => $tid]);
        return view('modules.complaint.success',compact(['comp','tid']));
    }
    public function complaintstatus(Request $request)
    {
        $id=$request->id;
        $data = UserComplaint::find($id);
        return view('modules.complaint.changeStatus',compact(['data']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserComplaint  $userComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(UserComplaint $userComplaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserComplaint  $userComplaint
     * @return \Illuminate\Http\Response
     */
    public function edit(UserComplaint $userComplaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserComplaint  $userComplaint
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, $userComplaint)
    {
        $data = UserComplaint::find($userComplaint);
        $history = $this->newlog('complaint', $data->id,'Update','Complaint Updated');
        $data->update($request->all());
        return redirect()->route('complaint.index')->with('success','Complaint has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserComplaint  $userComplaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($userComplaint)
    {
        $userComplaints = UserComplaint::find($userComplaint);
        $history = $this->newlog('complaint', $userComplaints->id,'Delete','Complaint Deleted');  
        $userComplaints->delete();
       
        return response(['msg'=>'Deleted'], 200);
    }
}
