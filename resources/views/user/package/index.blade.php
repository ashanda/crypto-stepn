@extends('layouts.user.app')

@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
        
            <!-- Add Project -->
            
            
            <div class="row" style="margin-top: 85px;padding:20px;" >
                <div class="col-xl-3 col-lg-6 col-sm-6">

                </div>
                @foreach ( $data as $package)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('buy_package.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('packages/img/'.$package->package_image) }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4><a href="ecom-product-detail.html">{{ $package->package_name  }}</a></h4>
                                    <ul class="star-rating">
                                        <h4>Info</h4>
                                    </ul>
                                    <span class="price">${{ $package->package_value  }}</span>
                                    <div>
                                    
                                        <button type="submit" class="btn btn-primary ml-3">Buy Package</button>                                     
                                      
                                    
                                    </div>
                                </div>
                                
                            </div>
                        </form> 
                        </div>
                    </div>
                </div>
                @endforeach
                

                

                
            </div>
                
                
                
                
            </div>
        </div>
        
        <!--**********************************
            Content body end
        ***********************************-->
@stop