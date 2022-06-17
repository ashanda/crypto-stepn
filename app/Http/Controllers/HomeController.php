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

    

    
}
