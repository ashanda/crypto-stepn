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
                                        
                                        <h4 class="fs-16 text-black">{{ __('Two Factor Authentication') }}</h4>
                            
                                            
                                                @if (session('status') == "two-factor-authentication-disabled")
                                                    <div class="alert alert-success" role="alert">
                                                        Two factor Authentication has been disabled.
                                                    </div>
                                                @endif
                            
                                                @if (session('status') == "two-factor-authentication-enabled")
                                                    <div class="alert alert-success" role="alert">
                                                        Two factor Authentication has been enabled.
                                                    </div>
                                                @endif
                            
                            
                                                <form method="POST" action="/user/two-factor-authentication">
                                                    @csrf
                            
                                                    @if (auth()->user()->two_factor_secret)
                                                        @method('DElETE')
                            
                                                        <div class="pb-5">
                                                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                                        </div>
                            
                                                        <div>
                                                            <h3>Recovery Codes:</h3>
                            
                                                            <ul>
                                                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                                                    <li>{{ $code }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                            
                                                        <button class="btn btn-danger">Disable</button>
                                                    @else
                                                        <button class="btn btn-primary">Enable</button>
                                                    @endif
                                                </form>
                                           
                                       
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
                                            <x-jet-form-section submit="updatePassword">
                                                <x-slot name="title">
                                                    {{ __('Update Password') }}
                                                </x-slot>
                                            
                                                <x-slot name="description">
                                                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                                </x-slot>
                                            
                                                <x-slot name="form">
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                                                        <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                                                        <x-jet-input-error for="current_password" class="mt-2" />
                                                    </div>
                                            
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <x-jet-label for="password" value="{{ __('New Password') }}" />
                                                        <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                                                        <x-jet-input-error for="password" class="mt-2" />
                                                    </div>
                                            
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                                        <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                                                        <x-jet-input-error for="password_confirmation" class="mt-2" />
                                                    </div>
                                                </x-slot>
                                            
                                                <x-slot name="actions">
                                                    <x-jet-action-message class="mr-3" on="saved">
                                                        {{ __('Saved.') }}
                                                    </x-jet-action-message>
                                            
                                                    <x-jet-button>
                                                        {{ __('Save') }}
                                                    </x-jet-button>
                                                </x-slot>
                                            </x-jet-form-section>
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
        
       

@stop
