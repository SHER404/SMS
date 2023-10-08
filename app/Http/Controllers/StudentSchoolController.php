<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSchool;
use Illuminate\Support\Facades\Hash;


class StudentSchoolController extends Controller
{
   
    public function index()
    {
        
        $data= StudentSchool::get();
        return view('modules.studentSchool.index',compact(['data']));
    }

    public function create()
    {
        $city = StudentSchool::all();
        return view('modules.studentSchool.add', compact(['city']));
    }

   
    public function store(Request $request)
    {
        StudentSchool::create($request->post());
        return redirect()->route('studentSchools.index')->with('success','StudentSchool has been created successfully.');
    }
   

  
    public function show(StudentSchool $StudentSchool)
    {
        return view('modules.studentSchool.view');
    }

   
    public function edit($StudentSchool)
    {
        $data = StudentSchool::find($StudentSchool);
        return view('modules.studentSchool.edit',compact(['data']));
    }

   
    public function update(Request $request,$StudentSchool)
    {
        $data = StudentSchool::find($StudentSchool);
        $data->update($request->all());
        return redirect()->route('studentSchools.index')->with('success','StudentSchool has been updated successfully.');
    }

       public function destroy($StudentSchool)
    {
        $StudentSchool = StudentSchool::find($StudentSchool); 
        $StudentSchool->delete();
        return response(['msg'=>'Deleted'], 200);
    }

}
