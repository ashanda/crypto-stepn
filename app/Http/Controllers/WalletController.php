<?php

namespace App\Http\Controllers;

use App\Models\Transection;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        if($role==1){
            
            $data = DB::table('transections')
            ->join('users', 'transections.uid', '=', 'users.uid')
            ->select('users.*', 'transections.*', 'transections.status as trstatus')
            ->get();        
            return view('admin.wallet.index',compact('data'));
        }
        if($role==0){
                  
            return view('user.wallet.index');
        }
    
    }

    public function edit(Request $withdraw, $id)
    {
        $role=Auth::user()->role;
        if($role==1){
            $withdraw = Transection::find($id);
            return view('admin.wallet.edit',compact('withdraw','id'));
        }
        
    
    }

    public function update(Request $request, $id)
        {
        $request->validate([
            
            'uid' => 'required',
            'amount' => 'required',
            'package_status' => 'required',
        ]);
        $withdraw = Transection::find($id);
        $withdraw->status = $request->package_status;
        $withdraw->amount = $request->amount;
        $fee = get_trxfee($request->amount);
                if($fee == -1){
                   // return;
                }

       $change_wallet_balance = DB::table('wallets')
       ->where('uid',"=",$request->uid )
       ->first();

       $id_update_row = $change_wallet_balance->id;
       $old_balance = $change_wallet_balance->wallet_balance;
       $old__available_balance =$change_wallet_balance->available_balance;
       $wallet_balance = wallet::find($id_update_row);

       if($request->package_status == 2){
        $wallet_balance->available_balance = $wallet_balance->available_balance + $request->amount+$fee;
    }else if($request->package_status == 0){
        $wallet_balance->available_balance = $wallet_balance->available_balance - $request->amount; 
    }else if($request->package_status == 1){
        store_fee($request->uid,$fee);
        if($wallet_balance->direct_balance > $wallet_balance->binary_balance){
            $new_balance_direct = $wallet_balance->direct_balance - $request->amount;

            // check if the direct balance is less than the binary balance
            if($new_balance_direct == 0){
                $wallet_balance->direct_balance = $new_balance_direct;
            }else{
                $new_balance_binary = $wallet_balance->binary_balance - $new_balance_direct;
                $wallet_balance->binary_balance  = $new_balance_binary;
            } 
        }else{

            $new_balance_binary = $wallet_balance->binary_balance - $request->amount;

            // check if the direct balance is less than the binary balance
            if($new_balance_binary == 0){
                $wallet_balance->binary_balance = $new_balance_binary;
            }else{
                $new_direct_balance = $wallet_balance->binary_balance - $new_balance_binary;
                $wallet_balance->direct_balance  = $new_direct_balance;
            } 

        }   
        $wallet_balance->available_balance = $old__available_balance - ($request->amount+$fee);
        $wallet_balance->wallet_balance = $old_balance - ($request->amount + $fee);
       }
       $wallet_balance->save();
       $withdraw->save();
        return redirect()->route('wallet.index')
        ->with('success','Wallet Has Been updated successfully');
        }
        
        public function destroy(wallet $package)
        {
        $package->delete();
        return redirect()->route('package.index')
        ->with('success','Company has been deleted successfully');
        }

    


}
