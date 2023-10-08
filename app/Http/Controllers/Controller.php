<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Campuses;
use App\Models\Histories;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function globalSettings(){
                     $campus_id=Auth::user()->campus_id;
                     $campus = campuses::find($campus_id);

                     return $campus;
    }
    public static function globalSettingsBlade(){
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::with('session')->where('id',$campus_id)->first();

        return $campus;
}
    public function newlog($module_type,$module_id,$action,$msg){
        $user_id=Auth::user()->id;
        $campus_id = Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $session_id=$campus->active_session;
        
        $history = Histories::create([
            'action' => $action,
            'msg' => $msg,
            'module_id' => $module_id,
            'module_type' => $module_type,
            'user_id' => $user_id,
            'campus_id' => $campus_id,
            'session_id' => $session_id,
            
            
        ]);   
        return $history;
    }

    // public function delldata($module_type,$module_id,$msg){
    //     $user_id=Auth::user()->id;
    //     $campus_id = Auth::user()->campus_id;
    //     $campus = campuses::find($campus_id);
    //     $session_id=$campus->active_session;
        
    //     $history = Histories::create([
    //         'action' => 'delete',
    //         'msg' => $msg,
    //         'module_id' => $module_id,
    //         'module_type' => $module_type,
    //         'user_id' => $user_id,
    //         'campus_id' => $campus_id,
    //         'session_id' => $session_id,
            
            
    //     ]);   
    //     return $history;
    // }


}
