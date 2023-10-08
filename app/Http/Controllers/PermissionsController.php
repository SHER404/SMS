<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
       
        return view('modules.permission.index-table',compact(['permissions']));
    }
    
    public function create()
    {
      
  
        return view('modules.permission.add');
    }
    public function store(Request $request)
    {

        $permission = Permission::create(['name' => $request->permission,'guard_name' => 'web']);
        return redirect()->route('permissions.index')->with('success','Permission has been created successfully.');
    }
    public function destroy($permission)
    {
        $permission = Permission::find($permission); 
        $permission->delete();
        return response(['msg'=>'Deleted'], 200);
    }
   


    
}
