@extends('layouts.admin.app')

@section('content')

   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
					<h2 class="font-w600 mb-2 mr-auto ">Admin</h2>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							{{ previous_package_check(1,10)}}
							
						</div>
					</div>
					
					
					
				</div>
				
				
				
				
				
				
			</div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection