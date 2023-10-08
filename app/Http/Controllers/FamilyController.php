<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\StudentParent;
use App\Models\StudentClass;
use App\Models\Family;
use App\Models\employees;
use App\Models\ClassSection;
use App\Models\AcademicSession;
use Illuminate\Http\Request;
use App\Models\FamilyMember;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus =$this->globalSettings();
        $data = Family::where('campus_id',$campus->id)->groupBy('custom_id')->get();
        return view('modules.families.index', compact(['data']));
    }
    public static function total_families()
    {
        $campus_id=Auth::user()->campus_id;
        $data = Family::where('campus_id',$campus_id)->count();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus =$this->globalSettings();
        $parents= StudentParent::where('campus_id',$campus->id)->get();
        return view('modules.families.add',compact(['parents']));
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
        $custom_id = $this->generateCustomId();
        for($count=0; $count<count($request->fathers_ids); $count++){
            $req=array();
        
            $req['campus_id']=$campus->id;
            $req['custom_id']=$custom_id;
            $req['family_name']=$request->family_name;
            $req['fathers_id']=$request->fathers_ids[$count];
            $history = $this->newlog('family',$req['fathers_id'],'Create','New Family Created');
            

        Family::create($req);

        }

        return redirect()->route('families.index')->with('success','Family has been created successfully.');
    }
    public function newFamily(Request $request)
    {
        $custom_id = $this->generateCustomId();
        for($i=0; $i<count($request->fathers_cnic); $i++){

            $data = new Family();
            $campus =$this->globalSettings();
            $data->campus_id=$campus->id;
            $data->custom_id=$custom_id;
            $data->fathers_id = $request->fathers_cnic[$i];
            $data->family_name = $request->family_name;
            $data->save();
        
        }
 

        return response(['data'=>$data],200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit($family)
    {
        $data = Family::find($family);
        $parents= StudentParent::all();

        return view('modules.families.edit',compact(['data','parents']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$family)
    {
        $data = family::find($family);
        $history = $this->newlog('family',$data->fathers_id,'Update','Family Updated');
        $data->update($request->all());
         return redirect()->route('families.index')->with('success','family has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy($family)
    {
        $family = family::find($family);
        $history = $this->newlog('family',$family->fathers_id,'Delete','Family Deleted'); 
         $family->delete();
        return response(['msg'=>'Deleted'], 200);
    }

    public function createFamilyModel(){

        $campus =$this->globalSettings();
        $parents=StudentParent::where('campus_id',$campus->id)->get();

        return view('modules.students.includes.create_family_model',compact(['parents']));

    }
    public function generateCustomId()
    {
        $trackingid = rand(100000, 999999);
        return $this->checkCustomId($trackingid);
    }
    public function checkCustomId($trackingdid)
    {
        $verifytrackingid = family::where('custom_id', $trackingdid)->get();
        if (count($verifytrackingid) == 0) {
            return $trackingdid;
        } else {
            return $this->generateCustomId();
        }
    }
}
