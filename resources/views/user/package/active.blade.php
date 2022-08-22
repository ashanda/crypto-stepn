@extends('layouts.user.app')

@section('content')
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
    <th>Index</th>
    
    <th>Package Name</th>
    
    <th>Package status</th>
    <th width="280px">Valid till</th>
    </tr>
    @php
        $i = 1;
    @endphp
    
    @foreach ($data as $package)
    <tr>
    <td>{{ $i }}</td>
    
    <td>{{ $package->package_name}}</td>
    @if ($package->status==2)
    <td>{{ 'Pending' }}</td>
    @elseif($package->status==1)
    <td>{{ 'Activate' }}</td>
    @else
    <td>{{ 'Rejected' }}</td>
    @endif
    <td>
        @php
        $datetime_string = $package->created_at;
        $days_to_add = $package->package_duration;
        $new_timestamp = strtotime($datetime_string) + ($days_to_add * 60 * 60 * 24);
        $new_date = date('Y-m-d H:i:s', $new_timestamp);
            
        echo $new_date; 
        @endphp
        
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