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
                                        <label>Tranfer Friend System ID:</label>
                                        <input type="text" name="p2p_id"  value="123456789">
                                    </div>    
                                    <div class="divTable">
                                        <div class="divTableBody">
                                        <div class="divTableRow">
                                        <div class="divTableCell">
                                        <h4>Withdraw Amount</h4>
                                        </div>
                                        <div class="divTableCell">
                                        <h4>Transaction Charge($)</h4>
                                        </div>
                                        </div>
                                        <div class="divTableRow">
                                        <div class="divTableCell">&nbsp;10$ - 49$</div>
                                        <div class="divTableCell">&nbsp;$1</div>
                                        </div>
                                        <div class="divTableRow">
                                        <div class="divTableCell">&nbsp;&nbsp;50$ - 99$</div>
                                        <div class="divTableCell">&nbsp;$3</div>
                                        </div>
                                        <div class="divTableRow">
                                        <div class="divTableCell">&nbsp;Above 99$</div>
                                        <div class="divTableCell">&nbsp;$5</div>
                                        </div>
                                        </div>
                                        </div>
                                        
                                        <style>
                                          .divTable{
                                            display: table;
                                            width: 100%;
                                        }
                                        .divTableRow {
                                            display: table-row;
                                        }
                                        .divTableHeading {
                                            background-color: #EEE;
                                            display: table-header-group;
                                        }
                                        .divTableCell, .divTableHead {
                                            border: 1px solid #999999;
                                            display: table-cell;
                                            padding: 3px 10px;
                                        }
                                        .divTableHeading {
                                            background-color: #EEE;
                                            display: table-header-group;
                                            font-weight: bold;
                                        }
                                        .divTableFoot {
                                            background-color: #EEE;
                                            display: table-footer-group;
                                            font-weight: bold;
                                        }
                                        .divTableBody {
                                            display: table-row-group;
                                        }
                                        </style>
                                        <!-- DivTable.com -->
                                   
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