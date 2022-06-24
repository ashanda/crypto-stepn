@extends('layouts.user.app')

@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
        
            <!-- Add Project -->
            
            
            <div class="row" style="margin-top: 85px;padding:20px;" >
                
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                    </div>
                    @endif
                </div>
                
                @foreach ( $data as $package)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            
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
                                    
                                    <input type="hidden" name="package_id" value="{{ $package->id  }}">
                                    <input type="hidden" name="package_value" value="{{ $package->package_value  }}">
                                    <input type="hidden" name="pref_id" value="{{ get_ref()->parent_id }}">
                                    <input type="hidden" name="pref_side" value="{{ get_ref()->ref_s }}">
                                    <div>
                                        @php
                                        $package_data = get_package_status($package->id);
                                        @endphp    
                                    @if ( $package_data == '0')
                                    
                                    <button type="submit" class="btn btn-primary" disabled>Package Disable</button>
                                        
                                    
                                    @else
                                    <a class="btn btn-primary ml-3" href="buy_package/{{ $package->id }}/progress" role="button">Buy Package</a>
                                    @endif    
                                    
                                    
                                      
                                        
                                    
                                    
                                    
                                     
                                      
                                   
                                                                             
                                      
                                    
                                    </div>
                                </div>
                                
                            </div>
                        
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
@endsection