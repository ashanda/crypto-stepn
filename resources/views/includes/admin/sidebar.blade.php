<!--**********************************
            Sidebar start
        ***********************************-->
        <div id="deznav" class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">

					
					<img src="{{ url('profile/img/'.Auth::user()->profile_pic) }}" alt="">
                    
					
					<a href="/dashboard"><i class="fa fa-cog" aria-hidden="true"></i></a>
					<h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{ Auth::user()->fname.' '.Auth::user()->lname }}</h5>
					<p class="mb-0 fs-14 font-w400">info@lemaconet.com</p>
				</div>
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="/dashboard" aria-expanded="false">
							<i class="flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        

                    </li>
                    <li><a class="has-arrow ai-icon" href="/kyc" aria-expanded="false">
						<i class="flaticon-077-menu-1"></i>
							<span class="nav-text">KYC</span>
						</a>
                        
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-061-puzzle"></i>
						<span class="nav-text">Packages</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="/package">Create Package</a></li>
						<li><a href="/user_buy_package">Activate Packages</a></li>
					</ul>
					</li>
                    
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-053-heart"></i>
							<span class="nav-text">Genealogy</span>
						</a>
                        
                    </li>
					<li><a href="/package_earn" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-settings-2"></i>
						<span class="nav-text">Package Earning Tranfer</span>
					</a>
				</li>
                    <li><a href="/wallet" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Wallets</span>
						</a>
					</li>
                    
                    
                    
                </ul>
				
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->