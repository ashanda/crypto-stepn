@extends('layouts.user.app')

@section('content')
   <!--**********************************
            Content body start
        ***********************************-->


        <div class="content-body" style="min-height: 796px;">
			<div class="container-fluid">
			    <div class="col-xl-9 col-lg-9 col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('trans.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="new-arrival-product">
                                  @php
                                     $get_user_wallets = get_user_wallets_data();
                                     
                                  @endphp
                               
                                <div class="new-arrival-content text-center mt-3">
                                    @php
                                        $fee;
                                    @endphp
                                    <ul class="star-rating">
                                        <h4>Withdrawal Request</h4>
                                    </ul>
                                    <div class="form-group">
                                        <label>Amount:</label>
                                        
                                        <input type="number" name="amount" min="0" max="{{ wallet_total() - 0.05 }}">
                                            
                                        </div>
                                    </div>
                                   
                                    
                                    
                                    <div class="form-group">
                                        <label>  Your Wallet Address:</label>
                                        <select class="form-control default-select" id="sel1" tabindex="-98" name="wallet_address" required>
                                            <option value="{{  $get_user_wallets[0]->id}}">{{  $get_user_wallets[0]->wallet_address}}</option>
                                            <option value="{{  $get_user_wallets[1]->id}}">{{ $get_user_wallets[1]->wallet_address}}</option>
                                            <option value="{{  $get_user_wallets[2]->id}}">{{ $get_user_wallets[2]->wallet_address}}</option>
                                    </select>
                                        
                                    </div>    
                                    
                                   
                                    <div>
                                    @php
                                        if(!empty($buy_package[0]->status)){
                                            $package_data =  $buy_package[0]->status;
                                        }else{
                                            $package_data = 'null';
                                        }
                                    @endphp    
                                    @if ( $package_data == '1')
                                    
                                      <button type="submit" class="btn btn-primary" disabled>Insufficient</button>
                                        
                                    @elseif($package_data == '2')
                                    <button type="submit" class="btn btn-primary" disabled>Wait For Admin Approve</button>
                                    @else
                                      <button type="submit" class="btn btn-primary ml-3">Withdraw request send</button>
                                    @endif
                                                                             
                                      
                                    
                                    </div>
                                </div>
                                
                            </div>
                        </form> 
		    </div>
		</div>
    </div>
</div>
</div>
    <!--**********************************
                Content body end
            ***********************************-->
@endsection         