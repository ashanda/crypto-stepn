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
  function master_data()
  {
    $master_data = Master_Data::first();

    return $master_data;
  }

  function get_ref(){
    $get_ref = User_Parent::where('uid',Auth::id())->first();
    return $get_ref;
  }

  function direct_commision(){
    $direct_commision = DB::table('direct__commissions')->where('child_uid',Auth::id())->sum('direct_commission');
    return $direct_commision;
  }
?>