<?php

namespace App\Http\Controllers;
use App\Models\User;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)

    {
        

        if (Auth::check()) {
            $user_id = Auth::id();
            $ip_address = request()->getClientIp();
            $user_agent =request()->userAgent();
            return view('profile.show',compact('ip_address', 'user_agent' ,'user_id'));
        }else{
            return view('auth.login');
        }
    }
    public function user(Request $request)

    {
        

        if (Auth::check()) {
            $user_id = Auth::id();
            $ip_address = request()->getClientIp();
            $user_agent =request()->userAgent();
            return view('profile.show',compact('ip_address', 'user_agent' ,'user_id'));
        }else{
            return view('auth.login');
        }
    }
    public function update(Request $request, $id)
    {
        
        if(Auth::check()){
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'password' => 'required',
                
                ]);
                $user = user::find($id);
                if($request->file('profile_pic')){
                    $file= $request->file('profile_pic');
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('/profile/img'), $filename);
                    $user->profile_pic = $filename;
                }
                $user->fname= $request->fname;
                $user->lname = $request->lname;
                
                $user->save();
                return redirect()->route('user.index')
                ->with('success','profile Has Been updated successfully');
        }else{
            return redirect()->route('login');
        }
        
    
    }
}
