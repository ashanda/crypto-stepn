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
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Sponser Name</th>
                                    
                                    
                                    </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($data as $kyc)
                <tr>
                <td>{{ $kyc->system_id }}</td>
                <td>{{ $kyc->fname .' '. $kyc->lname}}</td>
                
                
                @php
                $get_parent = get_parent_name_email($kyc->parent_id);
                @endphp
                @if ($get_parent==null)
                <td>{{ 'No Parent name' }}</td>
                
                @else
                <td>{{ $get_parent->fname .' '.$get_parent->lname }}</td>
                
                @endif
                
                
                </tr>
                
                @endforeach
                                
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>    
        </div>
            

@endsection