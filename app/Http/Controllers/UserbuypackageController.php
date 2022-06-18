<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User_Package;

class UserbuypackageController extends Controller
{
    public function index(User_Package $data)
    {
        $role=Auth::user()->role;
        if($role==1){
            $data =DB::table('users')
            ->join('user__packages', 'users.uid', '=', 'user__packages.uid')
            ->join('packages', 'user__packages.package_id', '=', 'packages.id')
            ->select('user__packages.id','users.fname', 'users.lname', 'packages.package_name', 'user__packages.status')
            ->get();     
            return view('admin.user_package.index',compact('data'));
        }
        if($role==0){
            $user_id = Auth::id();
            $data = DB::table('kycs')->where('uid', $user_id)->get();        
            return view('user.kyc.index',compact('data'));
        }
    
    }

    public function edit(Request $userbuypackage, $id){
        $role=Auth::user()->role;
        if($role==1){
            $kyc = User_Package::find($id);
            return view('admin.user_package.edit',compact('userbuypackage','id'));
        }
        if($role==0){
            $user_id = Auth::id();
            $kyc = DB::table('kycs')->where('uid', $user_id)->get();  
            return view('user.kyc.edit',compact('userbuypackage','id'));
        }
    }
}
