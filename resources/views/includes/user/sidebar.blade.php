<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					@if (Auth::user()->profile_pic == null)
					<img src="{{ asset('/images/user.png')}}" alt="">
                    
                    @else
					<img src="{{ url('profile/img/'.Auth::user()->profile_pic) }}" alt="">
                    
                    @endif
					<a href="/"><i class="fa fa-cog" aria-hidden="true"></i></a>
					<h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{ Auth::user()->fname.' '.Auth::user()->lname }}</h5>
					<p class="mb-0 fs-14 font-w400">info@lemaconet.com</p>
				</div>
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="/dashboard" aria-expanded="false">
							<i class="flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        

                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-061-puzzle"></i>
						<span class="nav-text">Markets</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="https://www.livecoinwatch.com" target="_blank">livecoinwatch.com</a></li>
						<li><a href="https://coinmarketcap.com" target="_blank">coinmarketcap.com</a></li>
						<li><a href="https://www.coingecko.com" target="_blank">coingecko.com</a></li>
					</ul>
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
							<li><a href="/active_packages">My Active Packages</a></li>
							<li><a href="/buy_package">Buy package</a></li>
						</ul>
                        
                    </li>
                    
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-053-heart"></i>
							<span class="nav-text">Genealogy</span>
						</a>
                        
                    </li>
                    <li><a href="wallet" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Wallets</span>
						</a>
					</li>
                    
                    
                    
                </ul>
				<div class="copyright">
					<p><strong> Crypto Admin Dashboard</strong> © 2021 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->