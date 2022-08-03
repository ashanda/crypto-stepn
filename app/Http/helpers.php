<?php
    
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use App\Models\Master_Data;
    use App\Models\User_Package;
    use App\Models\User_Parent;
    use App\Models\Direct_Commission;
    use App\Models\User;
    use App\Models\Commission;
    use App\Models\UserCryptoWallet;
    Use App\Models\Kyc;
    use App\Models\Package;

use function PHPUnit\Framework\isEmpty;

   /**
   * Write code on Method
   *
   * @return response()
   */

//get package_earning_amount
function get_package_earning_amount($user_id){
  $package_earning_amount = DB::table('package__commissons')
  ->select(DB::raw("SUM(package_commission) as count"))
  ->where ('uid', $user_id)
  ->get();

  return $package_earning_amount;
}

// get parent name and email
function get_parent_name_email($uid){
    $parent_name_email = DB::table('users')
    ->select('users.fname', 'users.lname', 'users.email')
    ->where('users.uid', '=', $uid)
    ->first();
    return $parent_name_email;
}


// 1:2 package and users

function package_earn_satisfy(){
  $ldate = date('Y-m-d');
  $newdate = date('Y-m-d', strtotime($ldate. ' - 14 days'));
  $package_earn_satisfy = DB::table('user__packages')
    ->whereColumn('user__packages.package_double_value','>','user__packages.total')
    ->where('user__packages.package_level_commission_at', '<=', $newdate)
    ->where('user__packages.package_binary_commsion_at', '<=', $newdate)
    ->where('user__packages.package_commission_update_at', '<=', $newdate)
    ->where('user__packages.status','=','1')
    ->join('users', 'user__packages.uid', '=', 'users.uid')
    ->orderBy('user__packages.total', 'desc')
    ->get();
    
    return $package_earn_satisfy;
    
}

//client ip
function client_ip(Request $request)
{
   ($request->ip());
}


// pending Kyc count
function pendingKycCount()
{
    $pendingKyc = Kyc::where('status', '0')->count();
    return $pendingKyc;
}

//pending package count
function pendingPackageCount()
{
    $pendingPackage = User_Package::where('status', '2')->count();
    return $pendingPackage;
}

//package commission percentage get
function direct_package_commission_percentage(){
    $direct_commssion_precentages = DB::table('direct_commssion_precentages')->get();
    return $direct_commssion_precentages;
}


//package cat get and pass to admin package view
function package_cat_get(){
  $package_cat_get = DB::table('package__categories')
  ->get();
  return $package_cat_get;
}

//current user package commission

//user package count

function current_user_package_count($current_user_id,$package_cat_id)
{
    $user_package_count = User_Package::where('uid','=',$current_user_id,'AND','package_cat_id','=',$package_cat_id,'AND','current_status','=',1)->count();
    return $user_package_count;
}

function current_user_package_commission($current_user_id,$package_cat_id){
  $current_user_package_count = current_user_package_count($current_user_id,$package_cat_id);
  if($current_user_package_count == 1){
    $current_user_package_commission = DB::table('user__packages')
    ->join('packages', 'user__packages.package_id', '=', 'packages.id')
    ->join('package__categories', 'package__categories.cat_name', '=', 'packages.package_category')
    ->where('user__packages.uid', '=', $current_user_id)
    ->orderBy('packages.package_value', 'desc')
    ->get();
  }else{
    $current_user_package_commission = DB::table('user__packages')
    ->join('packages', 'user__packages.package_id', '=', 'packages.id')
    ->join('package__categories', 'package__categories.cat_name', '=', 'packages.package_category')
    ->where('user__packages.uid', '=', $current_user_id,'AND','user__packages.status','=','1')
    ->orderBy('packages.package_value', 'desc')
    ->get();
  }

  
  return $current_user_package_commission;
}

//user previous package check//
function previous_package_check($package_id,$user_id){
  $previous_package = DB::table('user__packages')
  ->where('package_id', '=', $package_id)
  ->where("uid", "=", $user_id)
  ->where("current_status", "=", 1)
  ->count();

 return $previous_package;
}   

//user package count

    function user_package_count()
    {
        $user_package_count = User_Package::where('uid','=',Auth::user()->uid)->count();
        return $user_package_count;
    }

//Geneology


function geneology( $target_parent){

 
 
  $parent_details = DB::table("kycs")
                  ->join('users',"users.uid", "=", "kycs.uid")
                  ->where("kycs.uid", "=", $target_parent)
                  ->select("users.uid","users.system_id","kycs.phone_number", "kycs.whatsapp_number", "users.email", "kycs.country", "kycs.created_at")
                  ->get();
   
  if($parent_details->isEmpty()){
    echo '
    <div class="alert alert-warning" role="alert">
        KYCS not yet approved for this user
    </div>';
    
  }else{
echo "
	
		<li class='current_parent'>
    <a  title='User Details'>
    
                  
                  <span class='geneology_child_info'>
                    <lable>User id - ".$parent_details[0]->system_id." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>Email - ".$parent_details[0]->email." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>Country - ".$parent_details[0]->country." </lable>
                  </span><br/>                 
                  <span class='geneology_child_info'>
                    <lable>Registered Date - ".$parent_details[0]->created_at." </lable>
                  </span><br/>
                  </a>
               
    </a>";
			
    
    $geneology = DB::table('users')
    ->join('user__parents', 'user__parents.uid', '=', 'users.uid')
    ->join('kycs', 'kycs.uid', '=', 'users.uid')
    ->where('user__parents.virtual_parent','=' ,$target_parent)
    ->select('user__parents.uid',"kycs.phone_number", "kycs.whatsapp_number", "users.email", "kycs.country", "kycs.created_at",'user__parents.ref_s' , 'users.fname' , 'users.email' , 'users.created_at')
    ->get();

    

    if($geneology->isEmpty()){
      echo '
      <div class="alert alert-warning" role="alert">
         No KYCS approved user yet
      </div>';
    }
$child_elements='';  
$left_child='';
$right_child='';        
    if(count($geneology)>0){
      echo '<ul>';
     
        foreach($geneology as $geneology_data){
          $data =DB::table("users")
          ->leftJoin("kycs", function($join){
              $join->on("users.uid", "=", "kycs.uid");
          })
          ->select("users.fname", "users.lname", "users.email", "users.created_at")
          ->where("kycs.uid",'=',$geneology_data->uid)
          ->first();
            
            if($geneology_data->ref_s == 0 && $data > 0){
              $left_child = 
              "<li class='left_child'>
                  <a href='/genealogy/?parent=$geneology_data->uid' title='User Details'>
                  <span class='geneology_child_info'>
                    <lable>User id - ".$geneology_data->email." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>Country - ".$geneology_data->country." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>WhatsApp - ".$geneology_data->whatsapp_number." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>Registered Date - ".$geneology_data->created_at." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>User Side - LEFT </lable>
                  </span><br/>
                  </a>
                </li>";

            }elseif($geneology_data->ref_s == 0 && $data < 0){
              $left_child = 
              "<li class='left_child'>
                  No data or KYCS not yet sumbitted
                </li>";
            }elseif($geneology_data->ref_s == 1 && $data > 0){
              $right_child = 
              "<li class='right_child'>
                  <a href='/genealogy/?parent=$geneology_data->uid' title='User Details'>
                  <span class='geneology_child_info'>
                    <lable>User id - ".$geneology_data->email." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>Country - ".$geneology_data->country." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>WhatsApp - ".$geneology_data->whatsapp_number." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>Registered Date - ".$geneology_data->created_at." </lable>
                  </span><br/>
                  <span class='geneology_child_info'>
                    <lable>User Side - RIGHT </lable>
                  </span><br/>
                  </a>
                </li>";
            }else{
              $right_child = 
              "<li class='right_child'>
                  No data or KYCS not yet sumbitted
               </li>";
            }

          }
          if($left_child != ''){
            
            echo $left_child;
          }
          if($right_child != ''){
            
            echo $right_child;
          }
          
        
    }
    echo '</ul>

    </li>
							
    
  ';
  }//end kyc check
  
}



// store fee
function store_fee($uid,$fee){
  $store_fee['uid'] = $uid;
  $store_fee['fee'] = $fee;

DB::table('company_profit_fee')->insert($store_fee);
}

 // fee
function get_trxfee($req_amount){
  if(9 < $req_amount && $req_amount< 50 ){
    $fee= 2;
    
}elseif(49 < $req_amount && $req_amount< 100){
    $fee= 2;
}elseif( $req_amount > 99){
    $fee= 2;
}else{
    $fee = -1;
}
return $fee;
} 

//kyc validate
function get_user_kyc_count(){
  $get_user_kyc_count = Kyc::where('uid','=',Auth::user()->uid,'AND','status','=','1')->count();
  return $get_user_kyc_count;
}

//wallet count
function get_user_wallets_count(){
  $get_user_wallets_count = UserCryptoWallet::where('uid','=',Auth::user()->uid)->count();
  return $get_user_wallets_count;
}


// wallet address get //
function get_user_wallets_data(){
  $get_user_wallets = UserCryptoWallet::where('uid',Auth::id())->get();
  return $get_user_wallets;
}


// wallete realtime value
 function wallet_available_balance_sum(){
  $wallet_available_balance_sum = DB::table('wallets')->where('uid',"=",Auth::user()->uid)->sum('available_balance');
  return $wallet_available_balance_sum;
 }


  // wallete function
  function wallet_insert($uid,$wallet_balance){
    DB::table('wallets')->insert([
      'uid' => $uid,
      'wallet_balance' => $wallet_balance,
      'available_balance' => $wallet_balance,
      'direct_balance' => $wallet_balance,
  ]);
  }


  function wallet_update_direct($uid,$wallet_balance){
    $wallet_balance_update =  DB::table("wallets")
            ->select("id", "uid" ,"wallet_balance",'binary_balance','direct_balance')
            ->where("uid", "=", $uid )
            ->first();
            $wallet_balance_update_check =  DB::table("wallets")
            ->select("id", "uid" ,"wallet_balance",'binary_balance','direct_balance')
            ->where("uid", "=", $uid )
            ->count();

           if($wallet_balance_update_check > 0){
            $wallet_id= $wallet_balance_update->id;
            $new_wallet_balance = $wallet_balance_update->wallet_balance + ($wallet_balance);
            $new_direct_balance = $wallet_balance_update->direct_balance + ($wallet_balance);
            
    DB::table('wallets')
              ->where('id', $wallet_id)
              ->update(['wallet_balance' => $new_wallet_balance,'available_balance' =>$new_wallet_balance,'direct_balance' =>$new_direct_balance]);
           }else{
            
          wallet_insert($uid,$wallet_balance);
           }
  }



  function wallet_update_binary($uid,$wallet_balance){
    $wallet_balance_update =  DB::table("wallets")
            ->select("id", "uid" ,"wallet_balance",'binary_balance','direct_balance')
            ->where("uid", "=", $uid )
            ->first();
            $wallet_balance_update_check =  DB::table("wallets")
            ->select("id", "uid" ,"wallet_balance",'binary_balance','direct_balance')
            ->where("uid", "=", $uid )
            ->count();

           if($wallet_balance_update_check > 0){
            $wallet_id= $wallet_balance_update->id;
            $new_wallet_balance = $wallet_balance_update->wallet_balance + ($wallet_balance);
            $new_binary_balance = $wallet_balance_update->binary_balance + ($wallet_balance);
            
                DB::table('wallets')
              ->where('id', $wallet_id)
              ->update(['wallet_balance' => $new_wallet_balance,'available_balance' =>$new_wallet_balance,'binary_balance' =>$new_binary_balance]);
           }else{
            DB::table('wallets')->insert([
              'uid' => $uid,
              'wallet_balance' => $wallet_balance,
              'available_balance' => $wallet_balance,
              'binary_balance' => $wallet_balance,
          ]);
            
           }
  }
//-------------------------------------------------

//wallet log//
function wallet_log(){
  $wallete = DB::table("wallets")
  ->where("uid", "=", Auth::user()->uid)
  ->count();
  if($wallete > 0){
    $wallete_log = DB::table("wallets")
    ->where("uid", "=", Auth::user()->uid)
    ->get();
    return $wallete_log;
  }
  
  
  
}

//commission log//
function commssion_log(){
  $commssion_log_check = DB::table("commissions")
  ->where("uid", "=", Auth::user()->uid)
  ->count();
  if($commssion_log_check > 0){
    $commssion_log = DB::table("commissions")
    ->where("uid", "=", Auth::user()->uid)
    ->get();
    return $commssion_log;
  }
}

// transection log
function transection(){
  $transection_log_check = DB::table("transections")
  ->where("uid", "=", Auth::user()->uid)
  ->count();
  if($transection_log_check > 0){
    $transection_log = DB::table("transections")
    ->where("uid", "=", Auth::user()->uid)
    ->get();
    return $transection_log;
  }

}


// package commission //
function package_commission(){
  $user_package_data = DB::table('user__packages')->get();
  foreach($user_package_data as $data){
  $package_commission =  DB::table("package__commissions")
    ->select("id", "uid" ,"package_id","commission")
    ->where("uid", "=", $data->uid,"AND","package_id","=",$data->package_id )
    ->count();    
      
      
       if($package_commission < 1){
           $commission = $data->package_value*0.025;
           $user['uid'] = $data->uid;
           
           $user['package_id'] = $data->package_id;
           $user['commission'] = $commission;
           DB::table('package__commissions')->insert($user);
           $ptype='Package commission';
           $lcommission = '';
           $pcommission = $commission;
           $bleft = '';
           $bright= '';
      all_commission($data->uid,$data->package_id,$data->package_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
       }else{
          $package_commission =  DB::table("package__commissions")
              ->select("id", "uid" ,"package_id","commission")
              ->where("uid", "=", $data->uid,"AND","package_id","=",$data->package_id )
              ->first();
           $new_package_commission = $package_commission->commission + ($data->package_value*0.025);      
           
           DB::table('package__commissions')
          ->where('id', $package_commission->id)
          ->update(['commission' => $new_package_commission]);
          $ptype='Package commission';
          $lcommission = '';
          $pcommission = $new_package_commission;
          $bleft = '';
          $bright= '';
          all_commission($data->uid,$data->package_id,$data->package_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
       }
       
    }
}



//get ref id function 
  function get_ref(){
    $get_ref = User_Parent::where('uid',Auth::user()->uid)->first();
    return $get_ref;
  }
//******************************* */



// package max 5 time //
  function get_package_status($packageid){
    $get_package_status = User_Package::where('uid','=',Auth::user()->uid,'AND','package_id','=',$packageid)->count();
    if($get_package_status > 5){
      $result_valu = 0;
    }else{
       $result_valu = 1;
    }
    return $result_valu;
}

/*********************************************** */


//package commission sum
function package_commission_sum(){
  $package_commission_sum = DB::table('package__commissions')->where('uid',Auth::id())->sum('commission');
  return $package_commission_sum;
}

// wallet total
function wallet_total(){
  $wallet_total_sum = DB::table('wallets')->where('uid',"=",Auth::user()->uid)->sum('wallet_balance');
  return $wallet_total_sum;
}


// direct commission sum 
  function direct_commision(){
    $direct_commision = DB::table('direct__commissions')->where('uid',Auth::id())->sum('direct_commission');
    return $direct_commision;
  }


  // binary commission sum
  function binary_commision(){
    $binary_commision = DB::table('wallets')->where('uid',Auth::user()->uid)->sum('binary_balance');
    
    
    return $binary_commision;
  }

  function binary_commision_right(){
    $binary_commision = DB::table('user_binary_commissions')->where('uid',Auth::id())->sum('current_right_balance');
    
    return $binary_commision;
  }

  function binary_commision_left(){
    $binary_commision = DB::table('user_binary_commissions')->where('uid',Auth::id())->sum('current_left_balance');
    
    return $binary_commision;
  }
/********************************* */



  function invest(){
    $invest = DB::table('user__packages')->where('uid',Auth::id())->sum('package_value');
    return $invest;
  }

  // buy package function 
  function buy_package($user_package_row_id,$package_value,$package_id,$package_cat,$current_user,$package_cat_id){
    
    assign_user_commissions( $user_package_row_id,$package_value,$package_id,$package_cat,$current_user,$package_cat_id );
    
  }

 //update user_package table in new commission
 function user_package_new_commission($id,$new_commission){
  $user_package_new_comission = DB::table('user__packages')
   ->where('id', $id)
   ->update(array('package_commission' => $new_commission));  
 }








/*************************************************/
// assign user commission function first time
  function assign_user_commissions($user_package_row_id,$package_value,$package_id,$package_cat,$current_user,$package_cat_id){
    
   
    $parent_id=-1;
    $virtual_parentid = 0;
    $parent_user_level = 0;
    $direct_parent_dna= -1;
    $current_row_uid = -1;
    
    while ( $virtual_parentid  != 1){// ID 2 is the top most user in the pyramid.*/ 
      
      if($parent_id == -1){
        $sub_level_parent = get_parent_details( $current_user );
      }else{
        $sub_level_parent = get_parent_details(  $virtual_parentid );
      }  

      
       
      if(!isset($sub_level_parent[0])){
          /*$top_level_user = new User_Parent();
          $top_level_user->uid = 2 ;
          $top_level_user->ref_s = -1 ;
          $top_level_user->parent_id = 0 ;
          $top_level_user->virtual_parent = 0 ;
          $top_level_user->save();*/
          break;
        }
      
      $current_row_uid = $sub_level_parent[0]->uid;
      $virtual_parentid =  $sub_level_parent[0]->virtual_parent;
      $parent_id  =  $sub_level_parent[0]->parent_id;
      
      $ref_s = $sub_level_parent[0]->ref_s; 

      // First Time Assign DNA Parent
      if($direct_parent_dna == -1){
        $direct_parent_dna = $parent_id; //3
      } 
      $commission_ratio = direct_package_commission_percentage();
     
     //finding the direct parent chain
      if($current_row_uid == $direct_parent_dna){
       
        $direct_commission =  DB::table("direct__commissions")
        ->select("id", "uid" ,"direct_commission")
        ->where("uid", "=", $current_row_uid )
        ->get();

        
        $direct_commission_count = count((array)$direct_commission); 
        
       
      switch ( $parent_user_level ) {
        case 0:    
                
             $new_direct_commission = $package_value * $commission_ratio[0]->first_time_direct;
             validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );               
            break;
        case 1:    
               
            $new_direct_commission = $package_value * $commission_ratio[0]->first_time_direct_01;
            validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );
             break;
        case 2:  
          
            $new_direct_commission = $package_value * $commission_ratio[0]->first_time_direct_02;
            validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );
            break;	
        case 3:     
                   
            $new_direct_commission = $package_value * $commission_ratio[0]->first_time_direct_03;
            validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );
            break;
      } 
      
      
      $parent_user_level++;
      
      // DNA User Update
      
      if($parent_id != NULL){
        $direct_parent_dna = $parent_id;
      }else{

      }
    }
    //end of if

      /* 		   						
        Assign Binary Commission to the parent user here
                  
        We know Parent ID;
        We know parent side;
        We know packageValue;
        
        /****************************************************/
        
        /* Query for UserBinary Commision table values	- SELECT */	
        

       // $current_user_package_commission = current_user_package_commission($virtual_parentid);
        
       
        
        $new_binary_commission = binary_commission_find($virtual_parentid,$package_value,$package_id,$package_cat_id);   
        if (function_exists('validate_user_commissions')) {
          validate_binary_commissions( $ref_s,$virtual_parentid,$current_row_uid,$new_binary_commission  );
          }
        
        
        
        
        
     
      //echo $virtual_parentid.'/';
      //echo $direct_parent_dna.'/';
      if($current_row_uid == 2 ){
      
        break;
      }
      
    }
    //end of while
    
    
  }
  
  //direct_commission_find
function direct_commission_find( $package_value,  $commission_ratio , $direct_commission_count){
    
  $new_direct_commission = 0;

  if($direct_commission_count > 0){        
       $new_direct_commission = $package_value * $commission_ratio;         
   }
  
   return $new_direct_commission;
}

// validate_user_commissions
function validate_user_commissions( $current_row_uid,$new_direct_commission,$direct_commission_count,$package_value ){
 
  $balance_commission = $new_direct_commission;
  
  $User_packages_details =  DB::table("user__packages")->select("id", "uid" ,"package_max_revenue","total","status")
    ->where("uid", "=", $current_row_uid ,'AND','current_status','=',1)
    ->orderBy('id','asc')
    ->get();
   
  if (isset($User_packages_details)) {  
   // var_dump($User_packages_details);
  foreach($User_packages_details as $package){
    
    $package_earning_capacity = $package->package_max_revenue - $package->total;
    
    if($balance_commission >= 0){
      
          if( $new_direct_commission <= $package_earning_capacity  ){
            
              // User Package Table Update with Total
          DB::table('user__packages')
          ->where('id', $User_packages_details[0]->id )
          ->update(array('total' => ( $User_packages_details[0]->total + $new_direct_commission),'package_level_commission_at'=> date("Y-m-d H:i:s")  ));
          
            direct_commission_update_queries($current_row_uid,$new_direct_commission,$direct_commission_count,$package_value);    
            $balance_commission = 0;  

          }else{          
               
            direct_commission_update_queries($current_row_uid,$new_direct_commission,$direct_commission_count,$package_value);
            $balance_commission = $new_direct_commission - $package_earning_capacity;
          }            
        }
    } 
  } 
    
}

//direct_commission_update_queries
function direct_commission_update_queries( $current_row_uid,$new_direct_commission,$direct_commission_count,$package_value ){
 
  $direct_commission =  DB::table("direct__commissions")
  ->select("id", "uid" ,"direct_commission")
  ->where("uid", "=", $current_row_uid )
  ->first();
  
  

if($direct_commission != NULL){
  //echo $current_row_uid.'update ';
  $direct_commision_id= $direct_commission->id;
  $direct_commission_total = $direct_commission->direct_commission + $new_direct_commission;
  DB::table('direct__commissions')
      ->where('id', $direct_commision_id)
      ->update(array('direct_commission' => $direct_commission_total ));

   wallet_update_direct($current_row_uid, $new_direct_commission );

  
  }else{
    
    $direct_commission = new Direct_Commission();
    $direct_commission->uid = $current_row_uid ;
    $direct_commission->direct_commission = $new_direct_commission;
    $direct_commission->save();

    DB::table('wallets')->insert([
      'uid' => $current_row_uid,
      'wallet_balance' => $new_direct_commission,
      'available_balance' => $new_direct_commission,
      'direct_balance' => $new_direct_commission,
  ]);
    
    

}


}

/****************************************** */

/*********************************************/
// find binary commission function
function binary_commission_find( $virtual_parentid,$package_value,$package_id,$package_cat_id){
 
  $new_binary_commission = 0;
  
  $virtual_user_data = DB::table('user__packages')
                      ->where('uid','=',$virtual_parentid, 'AND', 'package_id','=',$package_id,'AND','package_status','=','1')
                      ->orderBy('package_double_value', 'desc')
                      ->get();
                  
   $binary_commission_count = count((array)$virtual_user_data);                 
   
    if(isset($virtual_user_data[0] )){
      $package_cat_commission = DB::table('package__categories')
                            ->where('id',$virtual_user_data[0]->package_cat_id)
                            ->first();
      if($binary_commission_count > 0){        
        $new_binary_commission = $package_value * $package_cat_commission->cat_commission;         
         
         
         }
       }                         
  
   
   return $new_binary_commission;
}

// validate_binary_commissions
function validate_binary_commissions( $ref_s,$virtual_parentid,$current_row_uid,$new_binary_commission   ){
 
  $balance_commission = $new_binary_commission;
  
  $User_packages_details =  DB::table("user__packages")->select("id", "uid" ,"package_max_revenue","total","status")
    ->where("uid", "=", $virtual_parentid ,'AND','current_status','=',1)
    ->orderBy('id','asc')
    ->get();

   $User_binary_details =  DB::table("user_binary_commissions")
   ->select("id", "uid" ,"current_left_balance","current_right_balance",'total')
   ->where("uid", "=", $virtual_parentid)
   ->get();

   $User_binary_log =  DB::table("binary_log")
   ->select("id", "uid" ,"binary_left","binary_right")
   ->where("uid", "=", $virtual_parentid)
   ->get();

   $User_binary_log_count = count((array)$User_binary_log); 
   $current_left_balance=0;
   $current_right_balance=0;  
  if (isset($User_packages_details)) {  
    
  foreach($User_packages_details as $package){
    
    $package_earning_capacity = $package->package_max_revenue - $package->total;
    
    if($balance_commission >= 0){
      
      if( $new_binary_commission <= $package_earning_capacity  ){

      if( $ref_s == 0 ){
       
        if(isset($User_binary_details[0])){
          $current_left_balance = $User_binary_details[0]->current_left_balance;
          $current_right_balance = $User_binary_details[0]->current_right_balance;

          DB::table('binary_log')->where('id', $User_binary_log[0]->id )
            ->update(array('binary_left' => ( $User_binary_log[0]->binary_left + ($current_left_balance += $new_binary_commission))));
          
          $current_left_balance += $new_binary_commission;
          }else{
            DB::table('binary_log')->insert([
              'uid' => $virtual_parentid,
              'binary_left' => $new_binary_commission,
              
            ]);
           
          }
      
     

      }else{
        
        if(isset($User_binary_details[0])){
          $current_left_balance = $User_binary_details[0]->current_left_balance;
          $current_right_balance = $User_binary_details[0]->current_right_balance;

          DB::table('binary_log')->where('id', $User_binary_log[0]->id )
          ->update(array('binary_right' => ( $User_binary_log[0]->binary_right + ($current_right_balance += $new_binary_commission))));
        
          $current_right_balance += $new_binary_commission;
        }else{
          DB::table('binary_log')->insert([
            'uid' => $virtual_parentid,
            'binary_right' => $new_binary_commission,
            
          ]);
         
        }
      
      
      }


      if(	$current_left_balance == $current_right_balance ){
        // Update Wallet 

        DB::table('user__packages')
        ->where('id', $User_packages_details[0]->id )
        ->update(array('total' => ( $User_packages_details[0]->total + $current_right_balance),'package_binary_commsion_at'=> date("Y-m-d H:i:s")  ));
       } else if( $current_left_balance < $current_right_balance ){				
        // Update Wallet 
       
        
        $current_right_balance = $current_right_balance - $current_left_balance;
        $current_left_balance = 0;
        DB::table('user__packages')
        ->where('id', $User_packages_details[0]->id )
        ->update(array('total' => ( $User_packages_details[0]->total + $current_right_balance),'package_binary_commsion_at'=> date("Y-m-d H:i:s")  ));
        
      }else if($current_left_balance > $current_right_balance){
        $current_left_balance = $current_left_balance - $current_right_balance;
        $current_right_balance = 0;
        DB::table('user__packages')
        ->where('id', $User_packages_details[0]->id )
        ->update(array('total' => ( $User_packages_details[0]->total + $current_left_balance),'package_binary_commsion_at'=> date("Y-m-d H:i:s")  ));
        
        
     }
    
              // User Package Table Update with Total
         
          
            binary_commission_update_query($ref_s,$User_binary_details,$virtual_parentid,$current_row_uid,$new_binary_commission);    
            $balance_commission = 0;  

          }else{          
               
            binary_commission_update_query($ref_s,$User_binary_details,$virtual_parentid,$current_row_uid,$new_binary_commission);
            $balance_commission = $new_binary_commission - $package_earning_capacity;
          }            
        }
    } 
  } 
    
} 


// binary commission update fuction
function binary_commission_update_query($ref_s,$User_binary_details,$virtual_parentid,$current_row_uid,$new_binary_commission){
  
  if($virtual_parentid != 0){

      if($User_binary_details->isEmpty()){
      $user['uid'] = $virtual_parentid;
      if($ref_s == 0){
        $user['current_left_balance'] = $new_binary_commission;
        $user['current_right_balance'] = 0;
        $user['total'] = $new_binary_commission;

      }else{
        $user['current_right_balance'] = $new_binary_commission;
        $user['current_left_balance'] = 0;
        $user['total'] = $new_binary_commission;
        
      }
      DB::table('user_binary_commissions')->insert($user);
      $ptype='Direct Commission';
         
      

      }else{
      $id= $User_binary_details[0]->id;
      $user_id = $User_binary_details[0]->uid;			
      $current_left_balance = $User_binary_details[0]->current_left_balance;
      $current_right_balance = $User_binary_details[0]->current_right_balance;
      $total = $User_binary_details[0]->total;		

      if( $ref_s == 0 ){
      $current_left_balance += $new_binary_commission;
      }else{
      $current_right_balance += $new_binary_commission;
      }


      if(	$current_left_balance == $current_right_balance ){
        // Update Wallet 
        DB::table('user_binary_commissions')
        ->where('id', $id)
        ->update(array('current_left_balance' => 0, 'current_right_balance' => 0,'total'=>$total+($current_right_balance)));	
        
        wallet_update_binary($virtual_parentid,$current_left_balance); 

       } else if( $current_left_balance < $current_right_balance ){				
        // Update Wallet 
       
        
        $current_right_balance = $current_right_balance - $current_left_balance;
        wallet_update_binary($virtual_parentid,$current_left_balance);
        $current_left_balance = 0;
        
        //wallete update < right binary value
       
        DB::table('user_binary_commissions')
        ->where('id', $id)
        ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance,'total'=>($total+($current_right_balance))));
        
      }else if($current_left_balance > $current_right_balance){
        $current_left_balance = $current_left_balance - $current_right_balance;
      
        wallet_update_binary($virtual_parentid,$current_right_balance);
        $current_right_balance = 0;

        DB::table('user_binary_commissions')
        ->where('id', $id)
        ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance,'total'=>($total+($current_left_balance))));
     }    

    }
  }
}

/*********************************************/

//get perant child //
  function get_parent_details($chiild_user){
    $get_parent_details = DB::table("user__parents")
    ->select("id","uid","parent_id", "ref_s","virtual_parent" )
    ->where("uid", "=", $chiild_user )
    ->get();
    
    return $get_parent_details;
    
  }



  // buy package secound time function //

  function buy_package_secound_time($user_package_row_id,$package_value,$package_id,$package_cat,$current_user,$package_cat_id){
    
    
    
    $parent_id=-1;
    $virtual_parentid = 0;
    $parent_user_level = 0;
    $direct_parent_dna= -1;
    $current_row_uid = -1;
    
    while ( $virtual_parentid  != 1){// ID 2 is the top most user in the pyramid.*/ 
      
      if($parent_id == -1){
        $sub_level_parent = get_parent_details( $current_user );
      }else{
        $sub_level_parent = get_parent_details(  $virtual_parentid );
      }  

      
       
      if(!isset($sub_level_parent[0])){
          /*$top_level_user = new User_Parent();
          $top_level_user->uid = 2 ;
          $top_level_user->ref_s = -1 ;
          $top_level_user->parent_id = 0 ;
          $top_level_user->virtual_parent = 0 ;
          $top_level_user->save();*/
          break;
        }
      
      $current_row_uid = $sub_level_parent[0]->uid;
      $virtual_parentid =  $sub_level_parent[0]->virtual_parent;
      $parent_id  =  $sub_level_parent[0]->parent_id;
      
      $ref_s = $sub_level_parent[0]->ref_s; 

      // First Time Assign DNA Parent
      if($direct_parent_dna == -1){
        $direct_parent_dna = $parent_id; //3
      } 
      $commission_ratio = direct_package_commission_percentage();
     
     //finding the direct parent chain
      if($current_row_uid == $direct_parent_dna){
       
        $direct_commission =  DB::table("direct__commissions")
        ->select("id", "uid" ,"direct_commission")
        ->where("uid", "=", $current_row_uid )
        ->get();
        
        $direct_commission_count = count((array)$direct_commission); 

      
      switch ( $parent_user_level ) {
        case 0:    
                
             $new_direct_commission = $package_value * $commission_ratio[0]->secound_time_direct;
             validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );               
            break;
        case 1:    
               
            $new_direct_commission = $package_value  * $commission_ratio[0]->secound_time_direct_01;
            validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );
             break;
        case 2:  
          
            $new_direct_commission = $package_value * $commission_ratio[0]->secound_time_direct_02;
            validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );
            break;	
        case 3:     
                   
            $new_direct_commission = $package_value * $commission_ratio[0]->secound_time_direct_03;
            validate_user_commissions( $current_row_uid,$new_direct_commission , $direct_commission_count,$package_value );
            break;
      } 
      
      
      $parent_user_level++;
      
      // DNA User Update
      
      if($parent_id != NULL){
        $direct_parent_dna = $parent_id;
      }else{

      }
    }
    //end of if

      /* 		   						
        Assign Binary Commission to the parent user here
                  
        We know Parent ID;
        We know parent side;
        We know packageValue;
        
        /****************************************************/
        
        /* Query for UserBinary Commision table values	- SELECT */	
        $userbinarycommision =  DB::table("user_binary_commissions")
        ->select("id", "uid","total","current_left_balance", "current_right_balance")
        ->where("uid", "=", $virtual_parentid )
        ->get();

        
        
        $binary_commission_count = count((array)$userbinarycommision);

        $package_category = DB::table('package__categories')->where('id','=',$package_cat_id)->get();
        
        $package_cat_commission=0;
        
       // $current_user_package_commission = current_user_package_commission($virtual_parentid);
        
				if(!isset($package_category[0] )){
          
				}else{
          $package_cat_commission = $package_category[0]->cat_commission;
          
				}
        
        $new_binary_commission = binary_commission_find($current_row_uid, $package_value, $binary_commission_count,$package_cat_commission);   
        validate_binary_commissions( $ref_s,$userbinarycommision,$virtual_parentid,$current_row_uid,$new_binary_commission  );
        
        
        
        
     
      //echo $virtual_parentid.'/';
      //echo $direct_parent_dna.'/';
      if($current_row_uid == 2 ){
      
        break;
      }
      
    }
     
      
  }
/****************************************** */


//commission log function //
  function all_commission($uid,$puid,$pid,$ptype,$pcommission,$lcommission,$bleft,$bright){
    $all_commission = new Commission();
    $all_commission->uid = $uid;
    $all_commission->parent_uid = $puid;
    $all_commission->package_id = $pid;
    $all_commission->package_type = $ptype;
    $all_commission->package_commission  = $pcommission;
    $all_commission->level_commission   = $lcommission;
    $all_commission->binary_commission_left   = $bleft;
    $all_commission->binary_commission_right   = $bright;
    $all_commission->save();

  }
 


?>
