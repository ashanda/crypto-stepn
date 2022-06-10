<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        if($role==1){
            return view('admin');
        }
        if($role==0){
          
            return view('package');
        }
    }
}
