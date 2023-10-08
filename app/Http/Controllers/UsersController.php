<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Campuses;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->hasRole('Super Admin')){
            $data=User::with(['Campuses','employee'])->get();
        }else{
            $campus =$this->globalSettings();
            $data=User::with(['Campuses','employee'])->where('campus_id',$campus->id)->where('user_type','!=','Super Admin')->where('user_type','!=','Admin')->get();
           
        }
       
        return view('modules.user.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('Super Admin')){
            $campuses = Campuses::all();
            $roles = Role::all();
        }else{
            $campus =$this->globalSettings();
           
            $campuses = Campuses::where('id',$campus->id)->get();
            $roles = Role::where('name','!=','Super Admin')->where('name','!=','Admin')->get();
             
        }
       
       
  
        return view('modules.user.add', compact(['campuses','roles']));
    }
    public function createEmpUser(Request $request)
    {
        $emp_id=$request->emp_id;
        $emp_name=$request->emp_name;
        $emp_type=$request->emp_type;
        $emp_campus=$request->emp_campus;
        return view('modules.user.createEmployeeUser', compact(['emp_id','emp_name','emp_type','emp_campus']));
    }
    public function deleteConfirm(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $user=User::where('email',$email)->first();
        if($user){
            if (Hash::check($password, $user->password)){
                return 'success';
            }else{
                return 'unauthenticated';
            }

        }else{
            return 'unauthenticated';
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'campus_id'=> $request->campus_id,
            'user_type'=> $request->user_type,
            'password'=> Hash::make($request->password)         
        ]);  
        
         $history = $this->newlog('Users-Section',$user->id,'Created','New user created');
        
        if($user){
            
               
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
    

            
        
           
            
            $employoee = Employees::create([
                'employee_name'=> $request->name,
                'campus_id'=> $request->campus_id,
                'user_id'=> $user->id,
                'employee_job'=> $request->user_type,
                'dob'=> $request->dob,
                'joining_date'=> $request->joining_date,
                'adress'=> $request->adress,
                'employee_phone'=> $request->employee_phone,
                'employee_cnic'=> $request->employee_cnic,
                'img'=> $request->img
                
                        
            ]);  
            
        }   

        return redirect()->route('users.index')->with('success','user has been created successfully.');
        
    }
    public function storeEmpUser(Request $request)
    {
        
       
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'campus_id'=> $request->campus_id,
            'user_type'=> $request->user_type,
            'password'=> Hash::make($request->password)         
        ]);  
        if($user){
            $employee = Employees::find($request->emp_id);
            $employee->user_id = $user->id;
            $employee->update(); 
                
        }   

        return redirect()->route('employees.index')->with('success','User has been created successfully.');
    }
   


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $data = User::with(['Campuses','employee'])->where('id',$user)->first();
        // echo $data;
        // die();
        return view('modules.user.view',compact(['data']));
        // return view('modules.user.view');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        if(Auth::user()->hasRole('Super Admin')){
            $data = User::find($user);
            $campuses = Campuses::all();
            $roles = Role::all();
        }else{
            $campus =$this->globalSettings();
            $data = User::find($user);
            $campuses = Campuses::where('id',$campus->id)->get();
            $roles = Role::where('name','!=','Super Admin')->where('name','!=','Admin')->get();
             
        }
        

        return view('modules.user.edit',compact(['data','campuses','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        $data = User::find($user);
        $request->merge(['password'=> Hash::make($request->password) ]);
        $history = $this->newlog('Users updated',$user,'Update','Users updated');
        $data->update($request->all());
     
        return redirect()->route('users.index')->with('success','user has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::find($user);
        $permissions=$user->getAllPermissions();
        if($permissions){
            foreach($permissions as $p){
                $user->revokePermissionTo($p);
            } 

        }
        
        $user->removeRole($user->user_type);
        $history = $this->newlog('Users delleted',$user->id,'Delete','Users delleted'); 
        $user->delete();

        return response(['msg'=>'Deleted'], 200);
    }
    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

}
