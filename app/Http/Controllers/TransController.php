<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use App\Models\Transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransController extends Controller
{
    public function p2p()
    {
        $role=Auth::user()->role;
        if($role==0){
                  
            return view('user.withdraw.p2p');
        }
    }

    public function crypto()
    {
        $role=Auth::user()->role;
        if($role==0){
                  
            return view('user.withdraw.bank');
        }
    }

    public function store(Request $request)
    {
       

            
                
                $withdraw = new Transection;
                $withdraw->uid= Auth::user()->uid;
                $withdraw->amount= $request->amount;
                $withdraw->p2p_id = $request->p2p_id;
                $withdraw->wallet_address = $request->wallet_address;      
                $withdraw->currency_type = $request->currency_type;  
                $withdraw->network = $request->network;        
                $withdraw->save();
                return redirect()->route('wallet.index')
                ->with('success','withdraw has been created successfully.');
        
    
    }
}
