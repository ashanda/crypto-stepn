@extends('layouts.admin.app')
@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<div class="container-fluid">
         <div class="container mt-2">
            <div class="container mt-4">
                

                  <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('package_earn_tranfer')}}">
                    @csrf
                     
                     <button type="submit" class="btn btn-primary">Tranfer Package Commission</button>
                   </form>


        </div>
    </div>
</div>
</div>
</div>
@endsection




