<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
class DashboardAdminController extends Controller
{
    //
    function show() {
      
        $role=Profile::where('id',Auth::id())->pluck('role_id');
       
        foreach($role as $value){
            $role_id=$value;
        }
        if($role_id==1){
            $users = Profile::with('getProfiles')
        ->get();
        $list=Role::get();
        }else
        if($role_id==2){
            $users = Profile::with('getProfiles')->where('role_id','<>',1)
        ->get();
        $list=Role::where('id','<>',1)->get();
        }else{
            $users = Profile::with('getProfiles')->where('role_id', $role_id)
            ->get();
            $list=Role::where('id', $role_id)->get();
        }
        
        $data=[
            'menu'=>$list,
            'data'=>$users,
            'auth_id'=>$role_id,
        ];
    
        
        return view('admin.dashboard', compact('data'));
    }

    function dashboard() {
        
        $users = Auth::user();
        return $users->role->name;
        // return $users;
    }
}
