<?php
    
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\Models\Master_Data;
    use App\Models\User_Package;
    use App\Models\User_Parent;
    use App\Models\Direct_Commission;
    use App\Models\User;


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
    $direct_commision = DB::table('direct__commissions')->where('child_uid',Auth::id())->sum('direct_commission');
    return $direct_commision;
  }

  function buy_package($package_value){
    assign_user_commissions( $package_value );
  }

  function assign_user_commissions($package_value){
    $current_user = Auth::user()->uid;
    $parent_id=0;
    $parent_user_level = 0;

    do { 
      
      if($parent_id == 0)$parent_id = $current_user;
      

      $sub_level_parent = get_parent_details($parent_id );  
      $parent_id  =  $sub_level_parent[0]->parent_id;
      $ref_id = $sub_level_parent[0]->uid;  
      $ref_s = $sub_level_parent[0]->ref_s;   
      
      switch ( $parent_user_level ) {
       case 0:
        // 1. Assign $package_value to the parent user , Assign 10% Direct Commmission here*/
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id ;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.1;
         $direct_commission->save();
         
         break;
         case 1:
         //1. Assign 3% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.03;
         $direct_commission->save();
         break;
         case 2:     
        // 1. Assign 2% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.02;
         $direct_commission->save();
         break;	
         case 3:     
        // 1. Assign 1% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.01;
         $direct_commission->save();
         break;	
        case 4:     
         //1. Assign 1% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.01;
         $direct_commission->save();
         break;
        
      } 
      /* 		   						
        Assign Binary Commission to the parent user here
                  
        We know Parent ID;
        We know parent side;
        We know packageValue;
        
        /****************************************************/
        
        /* Query for UserBinary Commision table values	- SELECT 	
       $userbinarycommision =  DB::table("user_binary_commissions")
                              ->select("id", "uid", "current_left_balance", "current_right_balance")
                              ->where("uid", "=", $parent_id )
                              ->get();

        $id= $userbinarycommision[0]->id;
        $user_id = $userbinarycommision[0]->uid;			
        $current_left_balance = $userbinarycommision[0]->current_left_balance;
        $current_right_balance = $userbinarycommision[0]->current_right_balance;		
        
        if( $ref_s == 0 ){
          $current_left_balance += $package_value;
        }else{
          $current_right_balance += $package_value;
        }
            
        
        if(	$current_left_balance == $current_right_balance ){
           // Update Wallet 
                 // Update User_binart_commission as left ballance = 0, right balance = 0			   
        } else if( $current_left_balance < $current_right_balance ){				
           // Update Wallet 
                 // Update User_binart_commission_total as left balance = 0, right balance = ( $current_right_balance -  current_left_balance )	
        }else{
          
        }
        
        /* Now Update UserBinary Commision table 
        $effected = DB::table('user_binary_commissions')
        ->where('id', $userEmail)
        ->update(array('current_left_balance' => $plan, 'current_right_balance' => $plan));
        /***********************************************************/      
        
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



  function buy_package_secound_time($package_value){
    $current_user = Auth::user()->uid;
    $parent_id=0;
    $parent_user_level = 0;

    do { 
      
      if($parent_id == 0)$parent_id = $current_user;
      

      $sub_level_parent = get_parent_details($parent_id );  
      $parent_id  =  $sub_level_parent[0]->parent_id;
      $ref_id = $sub_level_parent[0]->uid;  
      $ref_s = $sub_level_parent[0]->ref_s;   
      
      switch ( $parent_user_level ) {
       case 0:
        // 1. Assign $package_value to the parent user , Assign 10% Direct Commmission here*/
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id ;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.050;
         $direct_commission->save();
         
         break;
         case 1:
         //1. Assign 3% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.015;
         $direct_commission->save();
         break;
         case 2:     
        // 1. Assign 2% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.010;
         $direct_commission->save();
         break;	
         case 3:     
        // 1. Assign 1% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.005;
         $direct_commission->save();
         break;	
        case 4:     
         //1. Assign 1% Indirect Commmission here
         $direct_commission = new Direct_Commission();
         $direct_commission->uid = $parent_id;
         $direct_commission->child_uid = $ref_id;
         $direct_commission->direct_commission = $package_value * 0.005;
         $direct_commission->save();
         break;
        
      } 
      /* 		   						
        Assign Binary Commission to the parent user here
                  
        We know Parent ID;
        We know parent side;
        We know packageValue;
        
        /****************************************************/
        
        /* Query for UserBinary Commision table values	- SELECT 	
       $userbinarycommision =  DB::table("user_binary_commissions")
                              ->select("id", "uid", "current_left_balance", "current_right_balance")
                              ->where("uid", "=", $parent_id )
                              ->get();

        $id= $userbinarycommision[0]->id;
        $user_id = $userbinarycommision[0]->uid;			
        $current_left_balance = $userbinarycommision[0]->current_left_balance;
        $current_right_balance = $userbinarycommision[0]->current_right_balance;		
        
        if( $ref_s == 0 ){
          $current_left_balance += $package_value;
        }else{
          $current_right_balance += $package_value;
        }
            
        
        if(	$current_left_balance == $current_right_balance ){
           // Update Wallet 
                 // Update User_binart_commission as left ballance = 0, right balance = 0			   
        } else if( $current_left_balance < $current_right_balance ){				
           // Update Wallet 
                 // Update User_binart_commission_total as left balance = 0, right balance = ( $current_right_balance -  current_left_balance )	
        }else{
          
        }
        
        /* Now Update UserBinary Commision table 
        $effected = DB::table('user_binary_commissions')
        ->where('id', $userEmail)
        ->update(array('current_left_balance' => $plan, 'current_right_balance' => $plan));
        /***********************************************************/      
        
        $parent_user_level++;
        
      }
      while ( $parent_id  != 1);// ID 1 is the top most user in the pyramid.*/
     
      
  }

function test(){
  $previous_package = User_Package::where('package_id', '=', '1','AND', 'uid', '=',Auth::user()->uid)->count();
  var_dump($previous_package);
}
 


?>