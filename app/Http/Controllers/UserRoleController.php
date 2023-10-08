<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class UserRoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
       
        return view('modules.roles.index',compact(['roles']));
    }
    public static function allRoles()
    {
        $data = Role::select('name')->get();
        $roles =array();
        foreach($data as $d){
            $roles[]=$d->name;
        }
       
        return $roles;
    }
    
    public function create()
    {
      
  
        return view('modules.roles.add');
    }
    public function store(Request $request)
    {

        $role = Role::create(['name' => $request->name,'guard_name' => 'web']);
        $history = $this->newlog('roles',$role->id,'Create','New Role Created');
        return redirect()->route('roles.index')->with('success','Role has been created successfully.');
    }
    public function destroy($role)
    {
        $role = Role::find($role); 
        $history = $this->newlog('roles',$role->id,'Delete','Role Deleted');
        $role->delete();
        return response(['msg'=>'Deleted'], 200);
    }
   


    public function allPermissions(Request $request)
    {
        if(Auth::user()->hasRole('Super Admin')){
            $permissions = Permission::all();
        }else{
            $permissions = Permission::where('name','!=','campuses')
                                      ->where('name','!=','permission-managment')
                                      ->where('name','!=','country')
                                      ->where('name','!=','city')
                                      ->where('name','!=','town')
                                      ->where('name','!=','user-management')
                                      ->where('name','!=','reports')
                                      ->get();
           
             
        }
       
        $user_id=$request->user_id;
        $user_permissions = DB::table('model_has_permissions')->where('model_id',$request->user_id)->get();
        return view('modules.permission.index',compact(['permissions','user_permissions','user_id']));
    }
    public function changeStatus(Request $request){

        $user_id = $request->user_id;
        $type = $request->type;
        $status = $request->status;
        if($status=='Active'){
            $user = User::find($user_id);
            $user->assignRole($type);
            $data=User::where('id',$user_id)->update(['status'=>$status]);
            info($data);
        }else{
            $user = User::find($user_id);
            $user->removeRole($type);
            $data=User::where('id',$user_id)->update(['status'=>$status]);
            info($data);
        }
        

        return response(['data'=>$data],200);

    }
    public function changePermission(Request $request){

        $user_id = $request->user_id;
        $type = $request->action;
        $permission = $request->permission;
        if($type=='add'){

        $perm = Permission::find($permission);
        $user = User::find($user_id);
        $user->givePermissionTo($perm);
        }else{
            $perm = Permission::find($permission);
            $user = User::find($user_id);
            $user->revokePermissionTo($perm);
        }
        

        return response(['data'=>$user],200);

    }
    public function createRole(){

        $role = "admin";

        $role = Role::create(['name' => $role]);

        return "Role Created";

    }

    public function createPermission(){

        $permission = "student_reports";

        $permission = Permission::create(['name' => $permission]);

        return "Permission Created";

    }

    public function assignPermission(){

        $permission = 19;
        $role = 1;

        $permission = Permission::find($permission);
        $role = Role::find($role);

        //$permission->assignRole($role);
        $role->givePermissionTo($permission);

        //print_r($permission);

        return "Permission Assigned";

    }

    public function assignRole(){

        $user = 1;

        $user = User::find($user);

        $user->assignRole('admin');

        return "Role Assigned";

    }

    
}
