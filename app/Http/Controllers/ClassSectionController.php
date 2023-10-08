<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;

class ClassSectionController extends Controller
{
    public function index()
    {
        $campus =$this->globalSettings();
        $data = ClassSection::where('campus_id',$campus->id)->with('class')->get();
        return view('modules.class-sections.index',compact(['data']));
    }
    public static function total_sections()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = ClassSection::where('campus_id',$campus_id)->count();
        return $data;
    }

    public function create()
    {
        $campus =$this->globalSettings();
        $data = StudentClass::where('campus_id',$campus->id)->get();
        return view('modules.class-sections.add',compact(['data']));
    }

    public function store(Request $request)
    {
        $campus =$this->globalSettings();
        
        $data=ClassSection::create($request->post() + ['campus_id' => $campus->id]);
        $history = $this->newlog('class-section',$data->id,'Create','New Class Section Created');

        return redirect()->route('class-sections.index')->with('success','Section has been created successfully.');
    }
    public function newClassSection(Request $request)
    {
        $campus =$this->globalSettings();
        $data= ClassSection::create($request->post()+ ['campus_id' => $campus->id]);
        $history = $this->newlog('class-section',$data->id,'Create','New Class Section Created');

        return response(['data'=> $data],200);
    }
    public function getSections(Request $request)
    {
        $data= ClassSection::where('class_id',$request->class_id)->get();

        return response(['data'=> $data],200);
    }


    public function edit($ClassSection)
    {
        $data = ClassSection::find($ClassSection);
        $campus =$this->globalSettings();
       
        $classes = StudentClass::where('campus_id',$campus->id)->get();

        return view('modules.class-sections.edit',compact(['data','classes']));
    }

    public function update(Request $request, $ClassSection)
    {
        $data = ClassSection::find($ClassSection);
        $data->update($request->all());
        $history = $this->newlog('class-section',$ClassSection,'Update','Class Section Updated');
        return redirect()->route('class-sections.index')->with('success','Section has been updated successfully.');
    }    

    public function destroy($ClassSection)
    {
        $ClassSection = ClassSection::find($ClassSection);
        $history = $this->newlog('class-section',$ClassSection->id,'Delete','Class Section Deleted'); 
        $ClassSection->delete();

        return response(['msg'=>'Deleted'], 200);
    }

    public function show($ClassSection)

    {
        return view('modules.class-sections.view');
    }

}
