<?php

namespace App\Http\Controllers;

use App\Models\Transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        if($role==1){
                   
            return view('admin.withdraw.index');
        }
        if($role==0){
                  
            return view('user.wallet.index');
        }
    
    }

    


}
