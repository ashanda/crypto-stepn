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
                                    
                                    <ul class="star-rating">
                                        <h4>Withdrawal Request</h4>
                                    </ul>
                                    <div class="form-group">
                                        <label>Amount:</label>
                                        <input type="number" name="amount" min="0" max="{{ wallet_total() - 0.05 }}">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Currency Type (select one):</label>
                                        <div class="dropdown bootstrap-select form-control default-select dropup">
                                            <select class="form-control default-select" id="sel1" tabindex="-98" name="currency_type" required>
                                            <option>{{  $get_user_wallets[0]->currency_type}}</option>
                                            <option>{{ $get_user_wallets[1]->currency_type}}</option>
                                            <option>{{ $get_user_wallets[2]->currency_type}}</option>
                                            
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Network (select one):</label>
                                        <div class="dropdown bootstrap-select form-control default-select dropup">
                                            <select class="form-control default-select" id="sel1" tabindex="-98" name="network" required>
                                                <option>{{  $get_user_wallets[0]->network}}</option>
                                                <option>{{ $get_user_wallets[1]->netwok}}</option>
                                                <option>{{ $get_user_wallets[2]->netwok}}</option>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>  Your Wallet Address:</label>
                                        <select class="form-control default-select" id="sel1" tabindex="-98" name="wallet_address" required>
                                            <option>{{  $get_user_wallets[0]->wallet_address}}</option>
                                            <option>{{ $get_user_wallets[1]->wallet_address}}</option>
                                            <option>{{ $get_user_wallets[2]->wallet_address}}</option>
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