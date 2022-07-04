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
                   
            return view('dashboard');
        }
    
    }

    public function edit(Request $userbuypackage, $id){
        $role=Auth::user()->role;
        if($role==1){
            $current_user_package = DB::table('users')
            ->join('user__packages', 'users.uid', '=', 'user__packages.uid')
            ->join('packages', 'user__packages.package_id', '=', 'packages.id')
            ->where('user__packages.id',$id) 
            ->select('user__packages.id','user__packages.package_id','user__packages.package_value','packages.package_name','user__packages.currency_type','user__packages.network','user__packages.deposite_ss','user__packages.status')
            ->get();
            $kyc = User_Package::find($id);
            return view('admin.user_package.edit',compact('userbuypackage','id','current_user_package'));
        }
        if($role==0){
            $user_id = Auth::id();
            $kyc = DB::table('kycs')->where('uid', $user_id)->get();  
            return view('user.kyc.edit',compact('userbuypackage','id'));
        }
    }

    public function update(Request $request, $id)
        {
        $request->validate([
            
            'package_status' => 'required',
            'package_row_id' => 'required',
            'package_id' => 'required',
            'package_value' => 'required',
        ]);
        $package = User_Package::find($id);
        $package->status = $request->package_status;
        $status = (int)$request->package_status;
        $package_id = (int)$request->package_id;
        if( $status == 1){
            
                
                $user_current_package = DB::table('packages')->where('id','=',$request->package_row_id)->get(); 
                // Commission function call
                $previous_package = previous_package_check($package_id);
                
                
                if ($previous_package == 1){
                    dd($request->package_value,$request->package_id,$user_current_package[0]->id);
                    buy_package($request->package_value,$request->package_id,$user_current_package[0]->id); 
                    
                   
                }else{
                    
                    buy_package_secound_time($request->package_value,$request->package_id,$user_current_package[0]->id); 
                    
                }
                
            
            store_fee( $package->uid,$package->package_value);
            
        }
        $package->save();
       
        return redirect()->route('user_buy_package.index')
        ->with('success','Package Has Been updated successfully');
        }
        
        public function destroy(User_Package $package)
        {
        $package->delete();
        return redirect()->route('user_buy_package.index')
        ->with('success','User Package has been deleted successfully');
        }
}
