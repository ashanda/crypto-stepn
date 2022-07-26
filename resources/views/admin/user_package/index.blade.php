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
                            <th>S.No</th>
                            <th>User Name</th>
                            <th>Package Name</th>
                            
                            <th>Package status</th>
                            <th width="280px">Action</th>
                            </tr>
                            @php
                                $i = 1;
                            @endphp
                    </thead>
                    <tbody>
                        @foreach ($data as $package)
            <tr>
            <td>{{ $i }}</td>
            <td>{{ $package->fname ." ".$package->lname}}</td>
            <td>{{ $package->package_name}}</td>
            @if ($package->status==2)
            <td>{{ 'Pending' }}</td>
            @elseif($package->status==1)
            <td>{{ 'Activate' }}</td>
            @else
            <td>{{ 'Rejected' }}</td>
            @endif
            <td>
                <form action="{{ route('user_buy_package.destroy',$package->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('user_buy_package.edit',$package->id) }}">View</a>
                @csrf
                
                </form>
            </td>
            
            
            
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
                        
                    </tbody>
                   
                </table>
            </div>
            
        </div>
            </div>
        </div>

 @endsection