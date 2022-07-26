<?php

namespace App\Http\Controllers;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report_kyc(kyc $data)
    {
        $role=Auth::user()->role;
        if($role==1){
            $user_id = Auth::id();
            $data = DB::table('users')
            ->leftjoin('kycs', 'users.uid', '=', 'kycs.uid')
            ->where('kycs.uid', 'IS NULL')
            ->orderBy('kycs.created_at', 'desc')
            ->get();        
            return view('admin.report.all',compact('data'));
        }
        
    
    }
}
