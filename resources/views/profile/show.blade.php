@extends('layouts.user.app')

@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<!-- Add Project -->
                
					<div class="tab-pane fade show active" id="Monero">
                        <form action="{{ route('user.update',$user_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
						<div class="row">
                            
							<div class="col-xl-3 col-xxl-4 mt-4">
								<div class="card profile_pic">
									<div class="card-header pb-0 d-block d-sm-flex flex-wrap border-0 align-items-center">
										<div class="mr-auto mb-3">
											<h4 class="fs-20 text-black">Profile Picture</h4>
											
										</div>
										<div class="container">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="profile_pic"/>
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    
                                                    
                                                    @if (Auth::user()->profile_pic == null)
                                                    <div id="imagePreview" style="background-image: url('{{ asset('images/profile/profile.jpg') }}');" >
                                                    @else
                                                    <div id="imagePreview" style="background-image: url('{{ url('profile/img/'.Auth::user()->profile_pic) }}');" >
                                                    @endif
                                                    
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<h4 class="fs-16 text-black">Browser Sessions</h4>
                                        <div class="mt-10 sm:mt-0">
                                            <ul>
                                                <li><span class="text-black">IP : </span>{{ $ip_address }}</li>
                                                
                                            </ul>
                                        </div>
									</div>
									
										
                                            
											
						
									
								</div>
							</div>
							<div class="col-xl-9 col-xxl-8 mt-4">
								<div class="card">
									<div class="card-header pb-0 d-block d-sm-flex flex-wrap border-0 align-items-center">
										<div class="mr-auto mb-3">
											<h4 class="fs-20 text-black">Profile Details</h4>
											
										</div>
										
										
										
									</div>
									<div class="card-body pb-0 pt-sm-3 pt-0" style="position: relative;">
										
										<div id="chartBarRunning2" class="bar-chart" style="min-height: 365px;">
                                            <div class="profile-details">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="text-black">First Name</label>
                                                        <input type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                                        <label class="text-black">Last Name</label>
                                                        <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-2">
                                                        <label class="text-black">Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-2">
                                                        <label class="text-black">Password</label>
                                                        <input type="Password" class="form-control" name="password" value="{{ Auth::user()->password }}">
                                                    </div>
                                                    <div class="col-sm-12 mt-2 mt-sm-2">
                                                    <button type="submit" style="width: 100%;margin-top:50px;" class="btn btn-primary">Update</button>
                                                    </div>   
                                                </div>
                                                
                                            </div>
									<div class="resize-triggers"><div class="expand-trigger"><div style="width: 603px; height: 484px;"></div></div><div class="contract-trigger"></div></div></div>
								</div>
							</div>
							
						</form>	
						</div>
					</div>
					
							</div>
						</div>
					</div>
				</div>
                
                    
                
                
                
                                
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>   
        
       

@stop
