@extends('layouts.admin.app')
@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<div class="container-fluid">
         <div class="container mt-2">
            <div class="container mt-4">
                @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
                
                @endif
                
                  <form name="add-blog-post-form" id="add-blog-post-form" enctype="multipart/form-data" method="POST" action="{{url('package_earn_tranfer')}}">
                    @csrf
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                        @php
                           $sum=0; 
                        @endphp
                        @foreach (package_earn_satisfy() as $current_earn)
                         @php
                            $sum+= $current_earn->package_double_value/2;
                         @endphp
                        @endforeach
                        <strong>Enter Profit:</strong>
                        <input type="number" min="1" id="profit" name="profit" class="form-control" placeholder="Enter Profit">
                        <input type="hidden"  id="total_invest" name="total_invest" class="form-control" value="{{ $sum }}">
                        @error('profit')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        
                        
                        </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tranfer Package Commission</button>
                            </div>
                        </div>

                     
                   </form>
                  
                    

        </div>
    </div>
</div>
</div>
</div>
@endsection