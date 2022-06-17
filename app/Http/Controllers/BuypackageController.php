<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Package;
use App\Models\User_Parent;
use App\Models\Direct_Commission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PackageController;
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

                
                
                ]);
                $buy_package = new User_Package();
                $buy_package->uid = Auth::user()->uid;
                $buy_package->package_id = $request->package_id;
                $package_revenue = $request->package_value * 5;
                $buy_package->package_revenue = $package_revenue;
                $buy_package->parent_id = $request->pref_id;
                $buy_package->pref_side = $request->pref_side;

                //User parent Record
                $user_parents = User_Parent::where('parent_id', '=', $request->pref_id)->first();
                    if ($user_parents == null) {
                        $user_parent = new User_Parent();
                        $user_parent->uid = Auth::user()->uid;
                        $user_parent->parent_id = $request->pref_id;
                        $user_parent->save();
                    }
                
                //Direct Commission Record 10%

                $direct_commission = new Direct_Commission();
                $direct_commission->uid = Auth::user()->uid;
                $direct_commission->child_uid = $request->pref_id;
                $direct_commission->direct_commission = $request->package_value * master_data()->direct_sales;
                $direct_commission->save();


                //Direct Commission Record 30%

                $in_direct_level_1 = new Direct_Commission();
                if($request->pref_id !='NULL' ){
                $d1 = User_Parent::where('uid', '=', $request->pref_id)->whereNotNull("parent_id")->first();
                var_dump($d1!=Null);
                if(!is_null($d1) || !empty($d1)){
                $in_direct_level_1->uid = $d1->uid;
                $in_direct_level_1->child_uid =$d1->parent_id;
                $in_direct_level_1->direct_commission = $request->package_value * master_data()->in_direct_level_1;
                $in_direct_level_1->save();
                }
                }

                 //Direct Commission Record 20%
                if($d1!=Null){
                 $in_direct_level_2 = new Direct_Commission();

                 $d2 = User_Parent::where('uid', '=', $d1->parent_id)->whereNotNull("parent_id")->first();
                 if(!is_null($d2) || !empty($d2)){
                 $in_direct_level_2->uid = $d2->uid;
                 $in_direct_level_2->child_uid =$d2->parent_id;
                 $in_direct_level_2->direct_commission = $request->package_value * master_data()->in_direct_level_2;
                 $in_direct_level_2->save();
                 }   
                }
                 //Direct Commission Record 10%

                 if($d1!=Null){
                 $in_direct_level_3 = new Direct_Commission();

                 $d3 = User_Parent::where('uid', '=', $d2->parent_id)->whereNotNull("parent_id")->first();
                 if(!is_null($d3) || !empty($d3)){
                 $in_direct_level_3->uid = $d3->uid;
                 $in_direct_level_3->child_uid =$d3->parent_id;
                 $in_direct_level_3->direct_commission = $request->package_value * master_data()->in_direct_level_3;
                 $in_direct_level_3->save();
                 } 
                }


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
        public function edit(Request $buy_package,$id)
        {
           
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
