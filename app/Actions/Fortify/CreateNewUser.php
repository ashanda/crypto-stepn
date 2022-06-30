<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\User_Parent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
   
    {
        
        
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'system_id' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        $puid = DB::table('users')->where('system_id', '=' ,$input['ref_id'])->first();
            if(!empty($puid)){
                $puid = $puid->uid;
            }else{
                $puid = null;
            }
            
            $user_valid = DB::table('users')->where('id_number', '=' ,$input['id_number'])->count();
            if($user_valid > 0){
                
            }else{
                $user =  User::create([
            
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'ref_id' => $input['ref_id'],
            'system_id'=>$input['system_id'],
            'dbType' => $input['dbType'],
            'id_number' => $input['id_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            ]); 
            User_Parent::create([
                'parent_id' => $puid,
                'ref_s' => $input['ref_s'],
            ]);
            return $user;
                
            }
          
        
        

    }
}
