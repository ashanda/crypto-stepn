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
            <table class="table table-bordered">
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
                <a class="btn btn-primary" href="{{ route('user_buy_package.edit',$package->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            
            
            
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
            </table>
        </div>
            </div>
        </div>

 @endsection