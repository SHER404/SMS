<?php

namespace App\Http\Controllers;
use App\Models\Town;
use App\Models\FeeHead;
use App\Models\StudentsFee;
use App\Models\Students;
use App\Models\StudentParent;
use App\Models\StudentClass;
use App\Models\StudentHealth;
use App\Models\Family;
use App\Models\Employees;
use App\Models\ClassSection;
use App\Models\AcademicSession;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\City;
use App\Models\StudentLanguage;
use App\Models\EmergencyPhone;
use App\Models\RescuePhone;
use App\Models\FamilyMember;
use Illuminate\Support\Facades\View;




class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campus =$this->globalSettings();
        $classes = StudentClass::where('campus_id',$campus->id)->get();
        $families = Family::where('campus_id',$campus->id)->groupBy('custom_id')->get();
       
        $sections = ClassSection::where('campus_id',$campus->id)->get();
        $class_id='';
        $query= Students::query();
       
        $query->where('campus_id',$campus->id);
        $query->where('academic_session_id',$campus->active_session);
        $query->with('class');
        $query->with('father');
        $query->with('classSection');
        if($request->class_id){
            $class_id=$request->class_id;
            $query->where('class_id',$request->class_id);
        }
        if($request->section_id){
            $query->where('section_id',$request->section_id);
        }
        $data=$query->get();

        return view('modules.students.index',compact(['data','classes','class_id']));
    }
    public function birthdays()
    {
        $campus =$this->globalSettings();
        $birthdays = Students::where('campus_id',$campus->id)->where('academic_session_id',$campus->active_session)->whereMonth('dob','=',date('m'))->whereDay('dob','=',date('d'))->with('class')->with('father')->with('classSection')->get();
        return view('modules.students.birthdays',compact(['birthdays']));
    }
    public static function total_students()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Students::where('campus_id',$campus_id)->where('academic_session_id',$campus->active_session)->count();
        return $data;
    }
    public static function total_campusStudents()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Students::where('campus_id',$campus_id)->count();
        return $data;
    }
    public static function all_students($id)
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Students::where('class_id',$id)->where('academic_session_id',$campus->active_session)->count();
        return $data;
    }
    

    public static function birthday_students(){

        $campus_id = Auth::user()->campus_id;
        $campus = Campuses::find($campus_id);
        $std_birthday = students::where('campus_id',$campus_id)->where('academic_session_id',$campus->active_session)->whereMonth('dob','=',date('m'))->whereDay('dob','=',date('d'))->count();
       
    return $std_birthday;

       
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
        $town= Town::all();
        $classes = StudentClass::where('campus_id',$campus->id)->get();
        $families = Family::where('campus_id',$campus->id)->groupBy('custom_id')->get();
        $employees = employees::where('campus_id',$campus->id)->get();
        $sections = ClassSection::where('campus_id',$campus->id)->get();
        $sessions = AcademicSession::where('campus_id',$campus->id)->get();
        $campus = Campuses::all();
        $country = Country::all();
        $city = City::all();
        return view('modules.students.add',compact(['parents','classes','families','employees','sections','sessions','campus','country','city','town']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function genRegId($ec){
        
        $int =(int)filter_var($ec, FILTER_SANITIZE_NUMBER_INT);;
        $ec=$int;
        $numlength = mb_strlen($int);
            if ($numlength == 1) {
                $incr = $ec + 1;
                $add = '0000' . $incr;
            }
            if ($numlength == 2) {
                $incr = $ec + 1;
                $add = '000' . $incr;
            }
            if ($numlength == 3) {
                $incr = $ec + 1;
                $add = '00' . $incr;
            }
            if ($numlength == 4) {
                $incr = $ec + 1;
                $add = '0' . $incr;
            }
            if ($numlength > 4) {
                $add = $ec + 1;
            }
            return $add;

    }
    public function store(Request $request)
    {
         $campus =$this->globalSettings();
        // $request->campus_id=$campus->id;
        $latest = students::latest('id')->where('campus_id',$campus->id)->first();
       
        if($latest){
            $regis_int=$latest->Registration_id;
            $regis_int=$this->genRegId($regis_int);
        }else{
            $regis_int='00001';
        }
        

        $registration_id=$campus->campus_code.$regis_int;
        if ($_FILES['file']['name']) {     
            if (!$_FILES['file']['error']) {
                  $request->validate([
                  'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                  ]);
                  $imageName = time().'.'.$request->file->extension();  
                  $destination ='images/' .  $imageName ;
                  $request->file->move(public_path('images'), $imageName);
                  $request->merge([
                    'img'=> $destination,
                  ]);
            
            } else {
                $request->merge([
                    'img'=> '',
                ]);
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
            
          }
        

        $student = Students::create($request->except(['health_problem','file','student_language','rescue_phone','emergency_phone','family_member'])+ ['Registration_id' => $registration_id]);
        $history = $this->newlog('students',$student->id,'Create','New Student Created');
             for($i=0; $i<count($request->health_problem); $i++){

                        $studenthealth = new StudentHealth();
                        $studenthealth->health = $request->health_problem[$i];
                        $studenthealth->user_id = $student->id;
                        $studenthealth->save();

                        }

             for($i=0; $i<count($request->student_language); $i++){

                        $studentlanguages = new StudentLanguage();
                        $studentlanguages->languages = $request->student_language[$i];
                        $studentlanguages->user_id = $student->id;
                        $studentlanguages->save();
                
                        }

             for($i=0; $i<count($request->rescue_phone); $i++){

                        $RescuePhones = new RescuePhone();
                        $RescuePhones->rescue_phone = $request->rescue_phone[$i];
                        $RescuePhones->user_id = $student->id;
                        $RescuePhones->save();
                
                       }

             for($i=0; $i<count($request->emergency_phone); $i++){

                        $emerygencyPhone = new EmergencyPhone();
                        $emerygencyPhone->emergency_phone = $request->emergency_phone[$i];
                        $emerygencyPhone->user_id = $student->id;
                        $emerygencyPhone->save();
                
                        }

             for($i=0; $i<count($request->family_member); $i++){

                        $family_members = new FamilyMember();
                        $family_members->family_mamber = $request->family_member[$i];
                        $family_members->user_id = $student->id;
                        $family_members->save();
                
                        }
                        $fee_heads = FeeHead::all();
                        $studentId=$student->id;

        return redirect('fee-management/create?student_id='.$studentId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show($students)
    {
       
        return view('modules.students.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($students)
    {
        $campus =$this->globalSettings();

        $data = students::find($students);
       
        // $data = students::where('campus_id',$campus->id)->get($students);
         $parents= StudentParent::where('campus_id',$campus->id)->get();
        $classes = StudentClass::where('campus_id',$campus->id)->get();
        $families = Family::where('campus_id',$campus->id)->groupBy('custom_id')->get();
        $employees = employees::where('campus_id',$campus->id)->get();
        $sections = ClassSection::where('campus_id',$campus->id)->get();
        $sessions = AcademicSession::where('campus_id',$campus->id)->get();
        $campus = Campuses::all();
        $country = Country::all();
        $city = City::all();
        return view('modules.students.edit',compact(['data','classes','families','employees','sections','sessions','campus','parents','country','city']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $students)
    {
        $data = students::find($students);
        if ($_FILES['file']['name']) {     
            if (!$_FILES['file']['error']) {
                  $request->validate([
                  'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                  ]);
                  $imageName = time().'.'.$request->file->extension();  
                  $destination ='images/' .  $imageName ;
                  $request->file->move(public_path('images'), $imageName);
                  $request->merge([
                    'img'=> $destination,
                  ]);
            
            } else {
                
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
            
          }
          $history = $this->newlog('students',$students,'Update','Student Updated');
        $data->update($request->except(['file']));
        $history = $this->newlog('students',$students,'Update','Student Updated');
        return redirect()->route('students.index')->with('success','student has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($students)
    {
        $id=$students;
        $students = students::find($students); 
        $history = $this->newlog('students',$id,'Delete','Student Deleted');
        $students->delete();
        $history = $this->newlog('students',$id,'Delete','Student Deleted');
        
        return response(['msg'=>'Deleted'], 200);
    }





}
