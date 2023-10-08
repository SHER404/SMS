<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\Campuses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus =$this->globalSettings();
        $data = Employees::where('campus_id',$campus->id)->with('user')->get();
        return view('modules.employees.index',compact(['data']));
    }
    public static function total_employees()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = Employees::where('campus_id',$campus_id)->count();
        return $data;
    }
    public static function birthday_employees(){

        $campus_id = Auth::user()->campus_id;
        $campus = Campuses::find($campus_id);
        $std_birthday = Employees::where('campus_id',$campus_id)->whereMonth('dob','=',date('m'))->whereDay('dob','=',date('d'))->count();
       
    return $std_birthday;

       
    }
    public function birthdays()
    {
        $campus =$this->globalSettings();
        $birthdays = Employees::where('campus_id',$campus->id)->whereMonth('dob','=',date('m'))->whereDay('dob','=',date('d'))->with('user')->get();
        return view('modules.employees.birthdays',compact(['birthdays']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Employees::all();
        if(Auth::user()->hasRole('Super Admin')){
            $campuses = Campuses::all();
            $roles = Role::all();
        }else{
            $campus =$this->globalSettings();
           
            $campuses = Campuses::where('id',$campus->id)->get();
            $roles = Role::where('name','!=','Super Admin')->where('name','!=','Admin')->get();
             
        }
        return view('modules.employees.add',compact(['data','campuses','roles']));
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
    
        $user_id=null;
        if($request->is_user=='on'){
             if($request->password=='' || $request->email==''){
                return redirect()->back()->with('error', 'Email And Password required for user creation!');  
             }
             $user = User::create([
                'name'=> $request->employee_name,
                'email'=> $request->email,
                'campus_id'=> $request->campus_id,
                'user_type'=> $request->employee_job,
                'password'=> Hash::make($request->password)         
            ]);
    
            if($user){
                $user_id=$user->id;
            }
            
            
        }
        if ($_FILES['file']['name']) {
                   
            if (!$_FILES['file']['error']) {
                  $request->validate([
                  'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                  ]);
                  $imageName = time().'.'.$request->file->extension();  
                  $destination ='images/' .  $imageName ;
                  $request->file->move(public_path('images'), $imageName);
              
                //echo '/images/' . $filename;
                
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
      
       
        $employee = Employees::create($request->except('is_user','email','password','file') + ['user_id' => $user_id]);
        $history =  $this->newlog('class-section',$employee->id,'Create','New Class Section Created');

        return redirect()->route('employees.index')->with('success','Employess has been created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        return view('modules.employees.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit( $employees)
    {   
       
        if(Auth::user()->hasRole('Super Admin')){
            $campuses = Campuses::all();
            $roles = Role::all();
        }else{
            $campus =$this->globalSettings();
           
            $campuses = Campuses::where('id',$campus->id)->get();
            $roles = Role::where('name','!=','Super Admin')->where('name','!=','Admin')->get();
             
        }

        $data = employees::find($employees);
        
        return view('modules.employees.edit',compact(['data','campuses','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employees)
    {

        
        $data = employees::find($employees);
        if ($_FILES['file']['name']) {
                   
            if (!$_FILES['file']['error']) {
                  $request->validate([
                  'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                  ]);
                  $imageName = time().'.'.$request->file->extension();  
                  $destination ='images/' .  $imageName ;
                  $request->file->move(public_path('images'), $imageName);
              
                //echo '/images/' . $filename;
                
                  $request->merge([
                    'img'=> $destination,
                  ]);
            
            } else {
                
                echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
            
          }
          $history = $this->newLog('employees-sections',$employees,'Update','Employee Updated');
        $data->update($request->except('file'));
        return redirect()->route('employees.index')->with('success','employees has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($employees)
    {
        $user_id=null;
        $employee = employees::find($employees); 
        if($employee->user_id!='' && $employee->user_id!=null){
            $user_id=$employee->user_id;
        }
        $history = $this->newLog('employees-sections',$employees,'Delete','Employee Deleted');
        $employee->delete();
        if($user_id!=null){
            $user = User::find($user_id); 
            $user->delete();
        }
        

        return response(['msg'=>'Deleted'], 200);
    }
}
