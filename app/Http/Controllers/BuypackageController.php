<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PackageController;

class BuypackageController extends Controller
{
    public function store()
        {
            if(Auth::check()){
            $user_id = Auth::id();
            $data = DB::table('packages')->get(); 
            return view('user.package.index',compact('data'));
            }
            
        }
}
