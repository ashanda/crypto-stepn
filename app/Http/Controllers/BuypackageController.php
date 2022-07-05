<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User_Package;
use App\Models\User_Parent;

use App\Models\Direct_Commission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PackageController;

use App\Models\Package;
use App\Models\User;

class BuypackageController extends Controller
{
    public function index()
        {
            $role=Auth::user()->role;
            if($role==1){
                $user_id = Auth::id();
                $data = DB::table('packages')->get();     
                return view('admin.package.index',compact('data'));
            }
            if($role==0){
                $user_id = Auth::id();
                $data = DB::table('packages')->get();   
                $package_data = DB::table('user__packages')->where('uid', $user_id)->get();   
                return view('user.package.index',compact('data','package_data'));
            }
        }

        public function active(){
            $role=Auth::user()->role;
            if($role==0){
            $user_id = Auth::id();
                $data = DB::table('users')
                ->join('user__packages', 'users.uid', '=', 'user__packages.uid')
                ->join('packages', 'user__packages.package_id', '=', 'packages.id')
                ->where('users.uid', '=', $user_id)
                ->select('user__packages.id','users.fname', 'users.lname', 'packages.package_name', 'user__packages.status','packages.created_at')
                ->get();    
                return view('user.package.active',compact('data'));
            }
        }
        
        /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
        public function create()
        {
            
      
        }
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */

        

        public function store(Request $request)
        {
            $request->validate([
                
            
                
                'package_id' => 'required',
                'package_value' => 'required',
                'currency_type' => 'required',
                'network'=>'required',

                
                
                ]);
                $buy_package = new User_Package();
                $buy_package->uid = Auth::user()->uid;
                if($request->file('deposite_ss')){
                    $file= $request->file('deposite_ss');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/deposite/img'), $filename);
                    $buy_package->deposite_ss = $filename;
                }
                $buy_package->package_id = $request->package_id;
                
                $user_current_package = DB::table('packages')->where('id','=',$buy_package->package_id)->get();
                
                // check previous package
                $previous_package = previous_package_check($request->package_id,$buy_package->uid);
                
                
                if ($previous_package == 0){
                     
                    $package_revenue = $request->package_value * 5;
                    $package_revenue_double = $request->package_value * 2;
                }else{
                    $package_revenue_double = $request->package_value * 2;
                    $package_revenue = $request->package_value * 4;
                }
                if(user_package_count() == 0){
                    $buy_package->package_value = $request->package_value+10;
                }else{
                    $buy_package->package_value = $request->package_value;
                }
                
                $buy_package->package_double_value = $package_revenue_double;
                $buy_package->package_revenue = $package_revenue;
                $buy_package->currency_type = $request->currency_type;
                $buy_package->network = $request->network;
                $buy_package->save();
                return redirect()->route('buy_package.index')
                ->with('success','Package has been buying successfully.');
        
           
        }

        
        /**
        * Display the specified resource.
        *
        * @param  \App\buy_package  $buy_package
        * @return \Illuminate\Http\Response
        */
        public function show(User_Package $buy_package)
        {
       
        } 
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Company  $buy_package
        * @return \Illuminate\Http\Response
        */
        public function buy($id)
            {
                $role=Auth::user()->role;
                if($role==1){
                    $buy_package = Package::find($id);
                    
                    return view('admin.kyc.edit',compact('buy_package','id'));
                }
                if($role==0){
                    
                    $buy_package = DB::table('packages')->where('id', $id)->get();  
                    
                    return view('user.package.buy',compact('buy_package','id'));
                }
            
            }

            public function wallet_buy($id)
            {
                $role=Auth::user()->role;
                if($role==1){
                    $buy_package = Package::find($id);
                    
                    return view('admin.kyc.edit',compact('buy_package','id'));
                }
                if($role==0){
                    
                    $buy_package = DB::table('packages')->where('id', $id)->get();  
                    
                    return view('user.package.wallet_buy',compact('buy_package','id'));
                }
            
            }
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\buy_package  $buy_package
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
        }

}
