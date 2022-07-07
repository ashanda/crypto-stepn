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
                                <h4>Pay Your Package</h4>
                            </ul>
                            <div class="form-group">
                                <label> Currency Type (select one):</label>
                                <div class="dropdown bootstrap-select form-control default-select dropup">
                                    <select class="form-control default-select" id="sel1" tabindex="-98" name="currency_type" required>
                                        <option value="USDT">USDT</option>
                                        <option value="USDC">USDC</option>
                                        <option value="BUSD">BUSD</option>
                                        <option value="DAI">DAI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Network (select one):</label>
                                <div class="dropdown bootstrap-select form-control default-select dropup">
                                    <select class="form-control default-select" id="sel2" tabindex="-98" name="network" required onchange="ChangeAddress()">
                                        <option value="Tron-(TRC20)">Tron (TRC20)</option>
                                        <option value="BNB-Smart-Chain-(BEP20)">BNB Smart Chain (BEP20)</option>
                                        <option value="Ethereum-(ERC20)">Ethereum (ERC20)</option>
                                        <option value="Polygon">Polygon</option>
                                        <option value="Solana">Solana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Deposit Address:</label>
                                <input type="text" name="deposit_add" id="deposit_add" readonly value="123456789">
                            </div>
                            <div class="form-group">
                                <strong>Profe Screen Shot:</strong>
                                <input type="file" name="deposite_ss" class="form-control" placeholder="Profe Screen Shot" required>
                                @error('deposite_ss')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="package_cat_id" value="{{ $buy_package[0]->package_cat_id }}">
                            <input type="hidden" name="pref_id" value="{{ get_ref()->parent_id }}">
                            <input type="hidden" name="package_id" value="{{ $buy_package[0]->id  }}">
                            <input type="hidden" name="package_value" value="{{ $buy_package[0]->package_value  }}">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                    <label class="custom-control-label" for="basic_checkbox_1"><a target="_blank" href="/disclaimer_notice">Disclaimer Notice</a></label>
                                </div>
                            </div>
                            @if (user_package_count() == 0)
                            <span class="price">${{ $buy_package[0]->package_value+10  }}</span>
                            <span class="userMsg">{{ '(One time service fee $10 included)'  }}</span>
                            @else
                            <span class="price">${{ $buy_package[0]->package_value  }}</span>
                            @endif
                            
                            <div>
                                @php
                                if(!empty($buy_package[0]->status)){
                                $package_data = $buy_package[0]->status;
                                }else{
                                $package_data = 'null';
                                }
                                @endphp
                                @if ( $package_data == '1')

                                <button type="submit" class="btn btn-primary" disabled>Already Bought</button>

                                @elseif($package_data == '2')
                                <button type="submit" class="btn btn-primary" disabled>Wait For Admin Approve</button>
                                @else
                                <button type="submit" class="btn btn-primary ml-3">Buy Package</button>
                                @endif



                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>






</div>


<script>
    // change adderss by option

    function ChangeAddress() {
        var x = document.getElementById("sel1").value;
        var y = document.getElementById("sel2").value;
        var z;
        if (x == 1 && y == 1) {
            z = "TJftK2SA5X13znBu3crSDgPdcjzrG8jiV8";
        }
        if (x == 1 && y == 2) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 1 && y == 3) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 1 && y == 4) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 1 && y == 5) {
            z = "DdJWtY4AngbHFS2zEmjvJwzrcqXEybavbxEWyYssdW4D";
        }
        if (x == 2 && y == 1) {
            z = "TJftK2SA5X13znBu3crSDgPdcjzrG8jiV8";
        }
        if (x == 2 && y == 2) {
            z = "No address yet";
        }
        if (x == 2 && y == 3) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 2 && y == 4) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 2 && y == 5) {
            z = "DdJWtY4AngbHFS2zEmjvJwzrcqXEybavbxEWyYssdW4D";
        }
        if (x == 3 && y == 1) {
            z = "No address yet";
        }
        if (x == 3 && y == 2) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 3 && y == 3) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 3 && y == 4) {
            z = "No address yet";
        }
        if (x == 3 && y == 5) {
            z = "No address yet";
        }
        if (x == 4 && y == 1) {
            z = "No address yet";
        }
        if (x == 4 && y == 2) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 4 && y == 3) {
            z = "0x024406145cee6a4c209e28cfec7faea8e1bed67f";
        }
        if (x == 4 && y == 4) {
            z = "No address yet";
        }
        if (x == 4 && y == 5) {
            z = "No address yet";
        }
        document.getElementById("deposit_add").value = z;
    }
</script>



<!--**********************************
            Content body end
        ***********************************-->
@endsection