@extends('layouts.admin.app')
@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <div class="container-fluid">
              <div class="container mt-2">
                  <div class="row">
                  <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                  
                  </div>
                  
                  </div>
                  </div>
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                  <p>{{ $message }}</p>
                  </div>
                  @endif
                  <div class="table-responsive">
                      <table id="example2" class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Name</th>
                                  <th>Package value</th>
                                  
                            
                                  
                                  
                                  </tr>
                          </thead>
                          <tbody>
                              @php
                              $i=1;
                              $sum=0;
                              @endphp
                              @foreach (package_earn_satisfy() as $current_earn)
              <tr>
              <td>{{ $i }}</td>
              <td>{{ $current_earn->fname .' '. $current_earn->lname}}</td>
              <td>{{ $current_earn->package_double_value/2}}</td>
              @php
                $sum+= $current_earn->package_double_value/2;
              @endphp

              
              
              
              
              </tr>
              @php
              $i++;
              @endphp
              @endforeach
              
                       
                       
                          
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Total</th>
                                <th></th>
                                <th>@php
                                  echo $sum;
                                @endphp</th>
                            </tr>
                        </tfoot>
                      </table>
                  </div>
              </div>
          </div>    
      </div>

<div class="content-body">
	<div class="container-fluid">
         <div class="container mt-2">
            <div class="container mt-4">
                
                <!--
                  <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('package_earn_tranfer')}}">
                    @csrf
                     
                     <button type="submit" class="btn btn-primary">Tranfer Package Commission</button>
                   </form>
                  -->
                    

        </div>
    </div>
</div>
</div>
</div>
@endsection




