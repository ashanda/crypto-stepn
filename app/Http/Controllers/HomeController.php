<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WisdomDiala\Cryptocap\Facades\Cryptocap;
Use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(User $user_data)
    {
        $role=Auth::user()->role;
        if($role==1){

            return view('admin');
        }
        if($role==0){
            $user_id = Auth::id();
            $user_data = DB::table('users')->where('uid', $user_id)->get();
            return view('dashboard',compact('user_data'));
        }
    }


    public function package_earn(){
        $role=Auth::user()->role;
        if($role==1){

            return view('admin.package_earn.index')
            ->with('success','successfully Tranfer');;
        }
        

    }

    public function package_earn_tranfer(){
        $role=Auth::user()->role;
        if($role==1){
            package_commission();
            return view('admin.package_earn.index');
        }
        

    }

    

    

    
}
