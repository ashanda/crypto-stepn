@extends('layouts.user.app')

@section('content')
<!--**********************************
            Content body start
        ***********************************-->

<!-- Add Project -->


<div class="row" style="margin-top: 85px;padding:20px;">

    <div class="col-xl-3 col-lg-3 col-sm-3">
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="col-xl-9 col-lg-9 col-sm-9">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('buy_package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="new-arrival-product">

                        <div class="new-arrival-content text-center mt-3">

                            <ul class="star-rating">
                                <h4>Pay Package in your Wallet</h4>
                            </ul>
                            
                            
                            
                            


                            <input type="hidden" name="pref_id" value="{{ get_ref()->parent_id }}">
                            <input type="hidden" name="package_id" value="{{ $buy_package[0]->id  }}">
                            <input type="hidden" name="package_value" value="{{ $buy_package[0]->package_value  }}">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                    <label class="custom-control-label" for="basic_checkbox_1"><a target="_blank" href="/disclaimer_notice">Disclaimer Notice</a></label>
                                </div>
                            </div>
                            <span class="price">${{ $buy_package[0]->package_value  }}</span>
                            <div>
                                @php
                                $package_value = $buy_package[0]->package_value;
                                $available_balance = wallet_available_balance_sum();
                                $package_value_convert = (float)$package_value;
                                
                                @endphp
                                @if ( $package_value_convert < $available_balance)
                                <button type="submit" class="btn btn-primary ml-3">Buy Package</button>
                                
                                @else
                                <button type="submit" class="btn btn-primary" disabled>Wallet Balance is Insufficient</button>
                                
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