<?php

namespace App\Http\Controllers;
use App\Models\Kyc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KycController extends Controller
{
    
    public function index(kyc $data)
    {
        $role=Auth::user()->role;
        if($role==1){
            $user_id = Auth::id();
            $data = DB::table('users')
            ->join('kycs', 'kycs.uid', '=', 'users.uid')
            ->orderBy('kycs.created_at', 'desc')
            ->get();        
            return view('admin.kyc.index',compact('data'));
        }
        if($role==0){
            $user_id = Auth::id();
            $data = DB::table('kycs')->where('uid', $user_id)->get();        
            return view('user.kyc.index',compact('data'));
        }
    
    }
    
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(kyc $user_id)
    {
        $role=Auth::user()->role;
        if($role==1){
            $user_id = Auth::id();
            return view('admin.kyc.create',compact('user_id'));
        }
        if($role==0){
            $user_id = Auth::id();
            return view('user.kyc.create',compact('user_id'));
        }
    
    
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $role=Auth::user()->role;
        if($role==1){
            $request->validate([
                'uid' => 'required',
                'dbType' => 'required',
                'id_number' => 'required',
                'dob' => 'required',
                'phone_number' => 'required',
                'whatsapp_number' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'district' => 'required',
                'province' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
                'selfie_photo' => 'required',
                
                
                ]);
                $kyc = new kyc;
                $kyc->uid= $request->uid;
                $kyc->dbType= $request->dbType;
                if($request->file('selfie_photo')){
                    $file= $request->file('selfie_photo');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->selfie_image = $filename;
                }
                if($request->file('id_photo_front')){
                    $file= $request->file('id_photo_front');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->id_front_image = $filename;
                }
                if($request->file('id_photo_back')){
                    $file= $request->file('id_photo_back');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->id_back_image = $filename;
                }
                
                $kyc->id_number = $request->id_number;
                $kyc->dob = $request->dob;
                $kyc->phone_number = $request->phone_number;
                $kyc->whatsapp_number = $request->whatsapp_number;
                $kyc->street_address = $request->street_address;
                $kyc->city = $request->city;
                $kyc->district = $request->district;
                $kyc->province = $request->province;
                $kyc->country = $request->country;
                $kyc->postal_code = $request->postal_code;
                
                $kyc->save();
                return redirect()->route('kyc.index')
                ->with('success','KYC has been created successfully.');
        }
        if($role==0){
            $request->validate([
                'uid' => 'required',
                'dbType' => 'required',
                'id_number' => 'required',
                'dob' => 'required',
                'phone_number' => 'required',
                'whatsapp_number' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'district' => 'required',
                'province' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
                'selfie_photo' => 'required',
                
                
                ]);
                $kyc = new kyc;
                $kyc->uid= $request->uid;
                $kyc->dbType= $request->dbType;
                if($request->file('selfie_photo')){
                    $file= $request->file('selfie_photo');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->selfie_image = $filename;
                }
                if($request->file('id_photo_front')){
                    $file= $request->file('id_photo_front');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->id_front_image = $filename;
                }
                if($request->file('id_photo_back')){
                    $file= $request->file('id_photo_back');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->id_back_image = $filename;
                }
                $kyc->id_number = $request->id_number;
                $kyc->dob = $request->dob;
                $kyc->phone_number = $request->phone_number;
                $kyc->whatsapp_number = $request->whatsapp_number;
                $kyc->street_address = $request->street_address;
                $kyc->city = $request->city;
                $kyc->district = $request->district;
                $kyc->province = $request->province;
                $kyc->country = $request->country;
                $kyc->postal_code = $request->postal_code;
                
                $kyc->save();
                return redirect()->route('kyc.index')
                ->with('success','KYC has been created successfully.');
        }
    
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\kyc  $kyc
    * @return \Illuminate\Http\Response
    */
    public function show(kyc $kyc)
    {
        $role=Auth::user()->role;
        if($role==1){
            return view('admin.kyc.show',compact('kyc'));
        }
        if($role==0){
            return view('user.kyc.show',compact('kyc'));
        }
    
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $kyc
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $kyc, $id)
    {
        $role=Auth::user()->role;
        if($role==1){
            $kyc = kyc::find($id);
            return view('admin.kyc.edit',compact('kyc','id'));
        }
        if($role==0){
            $user_id = Auth::id();
            $kyc = DB::table('kycs')->where('uid', $user_id)->get();  
            return view('user.kyc.edit',compact('kyc','id'));
        }
    
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\kyc  $kyc
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $role=Auth::user()->role;
        if($role==1){
            $request->validate([
                
                'status' => 'required',
                ]);
                $kyc = kyc::find($id);
                
                $kyc->status = $request->status;
                $kyc->save();
                return redirect()->route('kyc.index')
                ->with('success','KYC Has Been updated successfully');
        }
        if($role==0){
            $request->validate([
                'uid' => 'required',
                'dbType' => 'required',
                'id_number' => 'required',
                'dob' => 'required',
                'phone_number' => 'required',
                'whatsapp_number' => 'required',
                'street_address' => 'required',
                'city' => 'required',
                'district' => 'required',
                'province' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
                'selfie_photo' => 'required',
                'status' => 'required',
                ]);
                $kyc = kyc::find($id);
                if($request->file('selfie_photo')){
                    $file= $request->file('selfie_photo');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->selfie_image = $filename;
                }
                if($request->file('id_photo_front')){
                    $file= $request->file('id_photo_front');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->id_front_image = $filename;
                }
                if($request->file('id_photo_back')){
                    $file= $request->file('id_photo_back');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/kycs/img'), $filename);
                    $kyc->id_back_image = $filename;
                }
                $kyc->uid= $request->uid;
                $kyc->dbType= $request->dbType;
                $kyc->id_number = $request->id_number;
                $kyc->dob = $request->dob;
                $kyc->phone_number = $request->phone_number;
                $kyc->whatsapp_number = $request->whatsapp_number;
                $kyc->street_address = $request->street_address;
                $kyc->city = $request->city;
                $kyc->district = $request->district;
                $kyc->province = $request->province;
                $kyc->country = $request->country;
                $kyc->postal_code = $request->postal_code;
                
                $kyc->status = $request->status;
                $kyc->save();
                return redirect()->route('kyc.index')
                ->with('success','KYC Has Been updated successfully');
        }
    
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $kyc
    * @return \Illuminate\Http\Response
    */
    public function destroy(kyc $kyc)
    {
        $role=Auth::user()->role;
        if($role==1){
            $kyc->delete();
            return redirect()->route('kyc.index')
            ->with('success','Company has been deleted successfully');
        }
        if($role==0){
            $kyc->delete();
            return redirect()->route('kyc.index')
            ->with('success','Company has been deleted successfully');
        }
    
    }

}
