<?php
    
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    
    use App\Models\Master_Data;
    use App\Models\User_Package;
    use App\Models\User_Parent;
    use App\Models\Direct_Commission;
    use App\Models\User;
    use App\Models\Commission;


   /**
   * Write code on Method
   *
   * @return response()
   */
  
   

  function get_ref(){
    $get_ref = User_Parent::where('uid',Auth::id())->first();
    return $get_ref;
  }


  
  function direct_commision(){
    $direct_commision = DB::table('direct__commissions')->where('uid',Auth::id())->sum('direct_commission');
    return $direct_commision;
  }

  function binary_commision(){
    $binary_commision0 = DB::table('user_binary_commissions')->where('uid',Auth::id())->sum('current_left_balance');
    $binary_commision1 = DB::table('user_binary_commissions')->where('uid',Auth::id())->sum('current_right_balance');
    if($binary_commision0 < $binary_commision1){
      $binary_commision = $binary_commision1; 
    }else{
      $binary_commision = $binary_commision0; 
    }
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

  function invest(){
    $invest = DB::table('user__packages')->where('uid',Auth::id())->sum('package_value');
    return $invest;
  }

  function buy_package($package_value,$package_id){
    assign_user_commissions( $package_value,$package_id );
  }

  function assign_user_commissions($package_value,$package_id){
    $current_user = Auth::user()->uid;
    $parent_id=0;
    $parent_user_level = 0;

    do { 
      
      if($parent_id == 0)$parent_id = $current_user;
      

      $sub_level_parent = get_parent_details($parent_id );  
      $parent_id  =  $sub_level_parent[0]->parent_id;
      $ref_id = $sub_level_parent[0]->uid;  
      $ref_s = $sub_level_parent[0]->ref_s;   
      $direct_commission =  DB::table("direct__commissions")
        ->select("id", "uid" ,"direct_commission")
        ->where("uid", "=", $parent_id )
        ->count();
     
      
      switch ( $parent_user_level ) {
       case 0:
        // 1. Assign $package_value to the parent user , Assign 10% Direct Commmission here*/
          if($direct_commission > 0){
            $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
            $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.1);
            DB::table('direct__commissions')
                ->where('id', $dr_id)
                ->update(array('direct_commission' => $new_direct_commission));
                $ptype='Direct Commission';
                $lcommission = $package_value * 0.1;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);

          }else{
            $direct_commission = new Direct_Commission();
            $direct_commission->uid = $parent_id ;
            $direct_commission->direct_commission = $package_value * 0.1;
            $direct_commission->save();
            $ptype='Direct Commission';
                $lcommission = $package_value * 0.1;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
          }
          
         break;
         case 1:
         //1. Assign 3% Indirect Commmission here
         if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.03);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 1';
                $lcommission = $package_value * 0.03;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.03;
          $direct_commission->save();
          $ptype='Indirect Commmission 1';
                $lcommission = $package_value * 0.03;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;
         case 2:     
        // 1. Assign 2% Indirect Commmission here
        if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
          ->select("id", "uid" ,"direct_commission")
          ->where("uid", "=", $parent_id )
          ->first();
          $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.02);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 2';
                $lcommission = $package_value * 0.02;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.02;
          $direct_commission->save();
          $ptype='Indirect Commmission 2';
                $lcommission = $package_value * 0.02;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;	
         case 3:     
        // 1. Assign 1% Indirect Commmission here
        if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.01);
          
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 3';
                $lcommission = $package_value * 0.01;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.01;
          $direct_commission->save();
          $ptype='Indirect Commmission 3';
                $lcommission = $package_value * 0.01;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;	
        case 4:     
         //1. Assign 1% Indirect Commmission here
         if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.01);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 4';
                $lcommission = $package_value * 0.01;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.01;
          $direct_commission->save();
          $ptype='Indirect Commmission 4';
                $lcommission = $package_value * 0.01;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;
        
      } 
      /* 		   						
        Assign Binary Commission to the parent user here
                  
        We know Parent ID;
        We know parent side;
        We know packageValue;
        
        /****************************************************/
        
        /* Query for UserBinary Commision table values	- SELECT 	*/
        $userbinarycommision =  DB::table("user_binary_commissions")
        ->select("id", "uid", "current_left_balance", "current_right_balance")
        ->where("uid", "=", $parent_id )
        ->get();
        
            if($userbinarycommision->isEmpty()){
            $user['uid'] = $parent_id;
            $user['user_package_id'] = $package_id;

            if($ref_s == 0){
              $user['current_left_balance'] = $package_value*0.2;
              $user['current_right_balance'] = 0;
              $ptype='Binary Commision';
                $lcommission = '';
                $pcommission = '0';
                $bleft = $package_value*0.2;
                $bright= 0;
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
            }else{
              $user['current_right_balance'] = $package_value*0.2;
              $user['current_left_balance'] = 0;
              $ptype='Binary Commision';
                $lcommission = '';
                $pcommission = '0';
                $bleft = 0;
                $bright= $package_value*0.2;
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
            }
            DB::table('user_binary_commissions')->insert($user);
            $ptype='Direct Commission';
               
            

            }else{
            $id= $userbinarycommision[0]->id;
            $user_id = $userbinarycommision[0]->uid;			
            $current_left_balance = $userbinarycommision[0]->current_left_balance;
            $current_right_balance = $userbinarycommision[0]->current_right_balance;		

            if( $ref_s == 0 ){
            $current_left_balance += $package_value*0.2;
            }else{
            $current_right_balance += $package_value*0.2;
            }


            if(	$current_left_balance == $current_right_balance ){
              // Update Wallet 
              DB::table('user_binary_commissions')
              ->where('id', $id)
              ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance));	
              $ptype='Binary Commision';
                $lcommission = '';
                $pcommission = '0';
                $bleft = $current_left_balance;
                $bright= $current_right_balance;
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);		   
             } else if( $current_left_balance < $current_right_balance ){				
              // Update Wallet 
              $ptype='Binary Commision';
              $lcommission = '';
              $pcommission = '0';
              $bleft = $current_left_balance;
              $bright= $current_right_balance;
         all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);		   
         
              $current_right_balance = $current_right_balance - $current_left_balance;
              $current_left_balance = 0;
              DB::table('user_binary_commissions')
              ->where('id', $id)
              ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance));
              
            }else{
              $ptype='Binary Commision';
              $lcommission = '';
              $pcommission = '0';
              $bleft = $current_left_balance;
              $bright= $current_right_balance;
         all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);		   
              $current_left_balance = $current_left_balance - $current_right_balance;
              $current_right_balance = 0;
              DB::table('user_binary_commissions')
              ->where('id', $id)
              ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance));
           }    
          }
        $parent_user_level++;
        
      }
      while ( $parent_id  != 1);// ID 1 is the top most user in the pyramid.*/
     
      
  }
  
  function get_parent_details($chiild_user){
      
    
    return DB::table("user__parents")
    ->select("uid","parent_id", "ref_s")
    ->where("uid", "=", $chiild_user )
    ->get();
    
  }



  function buy_package_secound_time($package_value,$package_id){
    $current_user = Auth::user()->uid;
    $parent_id=0;
    $parent_user_level = 0;

    do { 
      
      if($parent_id == 0)$parent_id = $current_user;
      

      $sub_level_parent = get_parent_details($parent_id );  
      $parent_id  =  $sub_level_parent[0]->parent_id;
      $ref_id = $sub_level_parent[0]->uid;  
      $ref_s = $sub_level_parent[0]->ref_s;   
      $direct_commission =  DB::table("direct__commissions")
        ->select("id", "uid" ,"direct_commission")
        ->where("uid", "=", $parent_id )
        ->count();
     
      
      switch ( $parent_user_level ) {
       case 0:
        // 1. Assign $package_value to the parent user , Assign 10% Direct Commmission here*/
          if($direct_commission > 0){
            $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
            $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.05);
            DB::table('direct__commissions')
                ->where('id', $dr_id)
                ->update(array('direct_commission' => $new_direct_commission));
                $ptype='Direct Commmission 4';
                $lcommission = $package_value * 0.05;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);    
          }else{
            $direct_commission = new Direct_Commission();
            $direct_commission->uid = $parent_id ;
            $direct_commission->direct_commission = $package_value * 0.05;
            $direct_commission->save();
            $ptype='Direct Commmission 1';
                $lcommission = $package_value * 0.05;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
          }
          
         break;
         case 1:
         //1. Assign 3% Indirect Commmission here
         if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.015);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 1';
                $lcommission = $package_value * 0.015;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.015;
          $direct_commission->save();
          $ptype='Indirect Commmission 1';
                $lcommission = $package_value * 0.015;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;
         case 2:     
        // 1. Assign 2% Indirect Commmission here
        if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
          ->select("id", "uid" ,"direct_commission")
          ->where("uid", "=", $parent_id )
          ->first();
          $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.01);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 2';
                $lcommission = $package_value * 0.01;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.01;
          $direct_commission->save();
          $ptype='Indirect Commmission 2';
                $lcommission = $package_value * 0.01;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;	
         case 3:     
        // 1. Assign 1% Indirect Commmission here
        if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.005);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 3';
                $lcommission = $package_value * 0.005;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.005;
          $direct_commission->save();
          $ptype='Indirect Commmission 3';
                $lcommission = $package_value * 0.005;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;	
        case 4:     
         //1. Assign 1% Indirect Commmission here
         if($direct_commission > 0){
          $direct_commission =  DB::table("direct__commissions")
            ->select("id", "uid" ,"direct_commission")
            ->where("uid", "=", $parent_id )
            ->first();
            $dr_id= $direct_commission->id;
          $new_direct_commission = $direct_commission->direct_commission + ($package_value * 0.005);
          DB::table('direct__commissions')
              ->where('id', $dr_id)
              ->update(array('direct_commission' => $new_direct_commission));
              $ptype='Indirect Commmission 4';
                $lcommission = $package_value * 0.05;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }else{
          $direct_commission = new Direct_Commission();
          $direct_commission->uid = $parent_id ;
          $direct_commission->direct_commission = $package_value * 0.005;
          $direct_commission->save();
          $ptype='Indirect Commmission 4';
                $lcommission = $package_value * 0.05;
                $pcommission = '0';
                $bleft = '';
                $bright= '';
           all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);
        }
         break;
        
      } 
      /* 		   						
        Assign Binary Commission to the parent user here
                  
        We know Parent ID;
        We know parent side;
        We know packageValue;
        
        /****************************************************/
        
        /* Query for UserBinary Commision table values	- SELECT 	*/
       $userbinarycommision =  DB::table("user_binary_commissions")
                              ->select("id", "uid", "current_left_balance", "current_right_balance")
                              ->where("uid", "=", $parent_id )
                              ->get();
                              
        if($userbinarycommision->isEmpty()){
          $user['uid'] = $parent_id;
          $user['user_package_id'] = $package_id;
          $user['current_left_balance'] = $package_value*0.1;
          $user['current_right_balance'] = $package_value*0.1;
          DB::table('user_binary_commissions')->insert($user);
          
         if($ref_s == 0 ) {
          $current_left_balance = $user['current_left_balance'];
         }else{
          $current_right_balance = $user['current_right_balance'];
         }
        }else{
        $id= $userbinarycommision[0]->id;
        $user_id = $userbinarycommision[0]->uid;			
        $current_left_balance = $userbinarycommision[0]->current_left_balance;
        $current_right_balance = $userbinarycommision[0]->current_right_balance;		
        
        if( $ref_s == 0 ){
          $current_left_balance += $package_value*0.1;
        }else{
          $current_right_balance += $package_value*0.1;
        }
            
        
        if(	$current_left_balance == $current_right_balance ){
           // Update Wallet 
           DB::table('user_binary_commissions')
           ->where('id', $id)
           ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance));	
           $ptype='Binary Commision';
              $lcommission = '';
              $pcommission = '0';
              $bleft = $current_left_balance;
              $bright= $current_right_balance;
         all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);		   		   
          } else if( $current_left_balance < $current_right_balance ){				
            $ptype='Binary Commision';
            $lcommission = '';
            $pcommission = '0';
            $bleft = $current_left_balance;
            $bright= $current_right_balance;
       all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);		   
           $current_right_balance = $current_right_balance - $current_left_balance;
           $current_left_balance = 0;
           DB::table('user_binary_commissions')
           ->where('id', $id)
           ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance));
        }else{
          $ptype='Binary Commision';
              $lcommission = '';
              $pcommission = '0';
              $bleft = $current_left_balance;
              $bright= $current_right_balance;
         all_commission($parent_id,$package_id,$ref_id,$ptype,$pcommission,$lcommission,$bleft,$bright);		   
           $current_left_balance = $current_left_balance - $current_right_balance;
           $current_right_balance = 0;
           DB::table('user_binary_commissions')
           ->where('id', $id)
           ->update(array('current_left_balance' => $current_left_balance, 'current_right_balance' => $current_right_balance));
        }
        
        
      }
        /***********************************************************/      
        
        $parent_user_level++;
        
      }
      while ( $parent_id  != 1);// ID 1 is the top most user in the pyramid.*/
     
      
  }

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
