@extends('layouts.user.app')

@section('content')

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
			<h2 class="font-w600 mb-2 mr-auto ">Dashboard</h2>
			
			
			
			<div class="col-xl-12 col-xxl-12">
				<div class="row">
					<div class="col-sm-6">
						<div class="card-bx stacked card">
							<img src="images/card/card1.jpg" alt="">
							<div class="card-info">

								<div class="d-flex justify-content-between">
									<h2 class="num-text text-white mb-2 font-w600">Left Chain</h2>
								</div>
								<h3 id="">Business Volume ${{ binary_commision_left()}}</h3>
								<div class="d-flex">
									<div class="text-white">
										<span><input type="text" readonly id="copyTarget1" class="form-control" value="{{ url('/') }}/register/?ref={{ $user_data[0]->system_id }}&ref_s={{ 0 }}"></span>
										<span id="copyButton1" onclick="clipboardClicked1()" class="btn btn-outline-success float-right" title="Click to copy"> Copy Referral 
											<i class="fa fa-clipboard" aria-hidden="true"></i>
										</span>
										<span class="alert alert-success" id="clickedMessage-1">Copied !</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card-bx stacked card">
							<img src="images/card/card2.jpg" alt="">
							<div class="card-info">

								<div class="d-flex justify-content-between">
									<h2 class="num-text text-white mb-2 font-w600">Right Chain</h2>
								</div>
								<h3 id="">Business Volume ${{ binary_commision_right() }}</h3>
								<div class="d-flex">

									<div class="text-white">

										<span><input type="text" readonly id="copyTarget2" class="form-control" value="{{ url('/') }}/register/?ref={{ $user_data[0]->system_id }}&ref_s={{ 1 }}"></span>
										<span id="copyButton2" onclick="clipboardClicked2()" class="btn btn-outline-success float-right" title="Click to copy"> Copy Referral
											<i class="fa fa-clipboard" aria-hidden="true"></i>
										</span>
										<span class="alert alert-success" id="clickedMessage-2">Copied !</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Above section repeated start-->
			<div class="col-xl-12 col-xxl-12">
				<div class="row">
					<div class="col-sm-6">
						<div class="card-bx stacked card t-earning">

							<div class="card-info">

								<div class="d-flex justify-content-between">
									<h2 class="num-text text-white mb-2 font-w600">Total Invesments</h2>
								</div>
								<h3 id="">${{ invest() }}</h3>

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card-bx stacked card t-invesments">

							<div class="card-info">

								<div class="d-flex justify-content-between">
									<h2 class="num-text text-white mb-2 font-w600">Total Earnings</h2>
								</div>
								<table width="100%">
									<tr>
										<td>Package Rewards</td>
										<td>$0</td>
									</tr>
									<tr>
										<td>Referrel Rewards</td>
										<td>${{ direct_commision() }}</td>
									</tr>
									<tr>
										<td>Business Volume Rewards</td>
										<td>${{ binary_commision() }}</td>
									</tr>
									<tr>
										<td>Total</td>
										<td>${{ binary_commision() + direct_commision() }}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Above section repeated end -->


		</div>
		<div id="sample">
			<div class="row">

				<div class="col-xl-3 col-sm-6 m-t35">
					<div class="card card-coin">
						<div class="card-body text-center">
							<svg class="mb-3 currency-icon" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="40" cy="40" r="40" fill="white"></circle>
								<path d="M40 0C17.9083 0 0 17.9083 0 40C0 62.0917 17.9083 80 40 80C62.0917 80 80 62.0917 80 40C80 17.9083 62.0917 0 40 0ZM40 72.5C22.0783 72.5 7.5 57.92 7.5 40C7.5 22.08 22.0783 7.5 40 7.5C57.9217 7.5 72.5 22.0783 72.5 40C72.5 57.9217 57.92 72.5 40 72.5Z" fill="#FFAB2D"></path>
								<path d="M42.065 41.2983H36.8133V49.1H42.065C43.125 49.1 44.1083 48.67 44.7983 47.9483C45.52 47.2566 45.95 46.275 45.95 45.1833C45.9517 43.0483 44.2 41.2983 42.065 41.2983Z" fill="#FFAB2D"></path>
								<path d="M40 10.8333C23.9167 10.8333 10.8333 23.9166 10.8333 40C10.8333 56.0833 23.9167 69.1666 40 69.1666C56.0833 69.1666 69.1667 56.0816 69.1667 40C69.1667 23.9183 56.0817 10.8333 40 10.8333ZM45.935 53.5066H42.495V58.9133H38.8867V53.5066H36.905V58.9133H33.28V53.5066H26.9067V50.1133H30.4233V29.7799H26.9067V26.3866H33.28V21.0883H36.905V26.3866H38.8867V21.0883H42.495V26.3866H45.6283C47.3783 26.3866 48.9917 27.1083 50.1433 28.26C51.295 29.4116 52.0167 31.025 52.0167 32.775C52.0167 36.2 49.3133 38.995 45.935 39.1483C49.8967 39.1483 53.0917 42.3733 53.0917 46.335C53.0917 50.2816 49.8983 53.5066 45.935 53.5066Z" fill="#FFAB2D"></path>
								<path d="M44.385 36.5066C45.015 35.8766 45.3983 35.0316 45.3983 34.08C45.3983 32.1916 43.8633 30.655 41.9733 30.655H36.8133V37.52H41.9733C42.91 37.52 43.77 37.12 44.385 36.5066Z" fill="#FFAB2D"></path>
							</svg>
							<h2 class="text-black mb-2 font-w600">
								${{ number_format(Cryptocap::getSingleAsset('bitcoin')->data->priceUsd,2) }}</h2>
							<p class="mb-0 fs-13">
								<svg width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g filter="url(#filter0_d2)">
										<path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"></path>
									</g>
									<defs>
										<filter id="filter0_d2" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
											<feOffset dy="1"></feOffset>
											<feGaussianBlur stdDeviation="2"></feGaussianBlur>
											<feColorMatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0">
											</feColorMatrix>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow">
											</feBlend>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
										</filter>
									</defs>
								</svg>
								<span class="text-success mr-1">45%</span>This week
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 m-t35">
					<div class="card card-coin">
						<div class="card-body text-center">
							<svg class="mb-3 currency-icon" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="40" cy="40" r="40" fill="white"></circle>
								<path d="M40.725 0.00669178C18.6241 -0.393325 0.406678 17.1907 0.00666126 39.275C-0.393355 61.3592 17.1907 79.5933 39.2749 79.9933C61.3592 80.3933 79.5933 62.8093 79.9933 40.7084C80.3933 18.6241 62.8092 0.390041 40.725 0.00669178ZM39.4083 72.493C21.4909 72.1597 7.17362 57.3257 7.50697 39.4083C7.82365 21.4909 22.6576 7.17365 40.575 7.49033C58.5091 7.82368 72.8096 22.6576 72.493 40.575C72.1763 58.4924 57.3257 72.8097 39.4083 72.493Z" fill="#00ADA3"></path>
								<path d="M40.5283 10.8305C24.4443 10.5471 11.1271 23.3976 10.8438 39.4816C10.5438 55.549 23.3943 68.8662 39.4783 69.1662C55.5623 69.4495 68.8795 56.599 69.1628 40.5317C69.4462 24.4477 56.6123 11.1305 40.5283 10.8305ZM40.0033 19.1441L49.272 35.6798L40.8133 30.973C40.3083 30.693 39.6966 30.693 39.1916 30.973L30.7329 35.6798L40.0033 19.1441ZM40.0033 60.8509L30.7329 44.3152L39.1916 49.022C39.4433 49.162 39.7233 49.232 40.0016 49.232C40.28 49.232 40.56 49.162 40.8117 49.022L49.2703 44.3152L40.0033 60.8509ZM40.0033 45.6569L29.8296 39.9967L40.0033 34.3364L50.1754 39.9967L40.0033 45.6569Z" fill="#00ADA3"></path>
							</svg>
							<h2 class="text-black mb-2 font-w600">
								${{ number_format(Cryptocap::getSingleAsset('ethereum')->data->priceUsd,2) }}</h2>
							<p class="mb-0 fs-14">
								<svg width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g filter="url(#filter0_d1)">
										<path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"></path>
									</g>
									<defs>
										<filter id="filter0_d1" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
											<feOffset dy="1"></feOffset>
											<feGaussianBlur stdDeviation="2"></feGaussianBlur>
											<feColorMatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0">
											</feColorMatrix>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow">
											</feBlend>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
										</filter>
									</defs>
								</svg>
								<span class="text-success mr-1">45%</span>This week
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 m-t35">
					<div class="card card-coin">
						<div class="card-body text-center">
							<svg class="mb-3 currency-icon" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="40" cy="40" r="40" fill="white"></circle>
								<path d="M40.725 0.00669178C18.6241 -0.393325 0.406678 17.1907 0.00666126 39.275C-0.393355 61.3592 17.1907 79.5933 39.2749 79.9933C61.3592 80.3933 79.5933 62.8093 79.9933 40.7084C80.3933 18.6241 62.8092 0.390041 40.725 0.00669178ZM39.4083 72.493C21.4909 72.1597 7.17362 57.3257 7.50697 39.4083C7.82365 21.4909 22.6576 7.17365 40.575 7.49033C58.5091 7.82368 72.8096 22.6576 72.493 40.575C72.1763 58.4924 57.3257 72.8097 39.4083 72.493Z" fill="#374C98"></path>
								<path d="M40.5283 10.8305C24.4443 10.5471 11.1271 23.3976 10.8438 39.4816C10.5438 55.549 23.3943 68.8662 39.4783 69.1662C55.5623 69.4495 68.8795 56.599 69.1628 40.5317C69.4462 24.4477 56.6123 11.1305 40.5283 10.8305ZM52.5455 56.9324H26.0111L29.2612 38.9483L25.4944 39.7317V36.6649L29.8279 35.7482L32.6447 20.2809H43.2284L40.8283 33.4481L44.5285 32.6647V35.7315L40.2616 36.6149L37.7949 50.2154H54.5122L52.5455 56.9324Z" fill="#374C98"></path>
							</svg>
							<h2 class="text-black mb-2 font-w600">
								${{ number_format(Cryptocap::getSingleAsset('solana')->data->priceUsd,2) }}</h2>
							<p class="mb-0 fs-14">
								<svg width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g filter="url(#filter0_d4)">
										<path d="M5 4C5.91797 5.08433 8.89728 8.27228 10.5 10L16.5 7L23.5 16" stroke="#FF2E2E" stroke-width="2" stroke-linecap="round"></path>
									</g>
									<defs>
										<filter id="filter0_d4" x="-3.05176e-05" y="0" width="28.5001" height="22.0001" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
											<feOffset dy="1"></feOffset>
											<feGaussianBlur stdDeviation="2"></feGaussianBlur>
											<feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.180392 0 0 0 0 0.180392 0 0 0 0.61 0">
											</feColorMatrix>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow">
											</feBlend>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
										</filter>
									</defs>
								</svg>
								<span class="text-danger mr-1">45%</span>This week
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 m-t35">
					<div class="card card-coin">
						<div class="card-body text-center">
							<svg class="mb-3 currency-icon" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="40" cy="40" r="40" fill="white"></circle>
								<path d="M40.725 0.00669178C18.6241 -0.393325 0.406708 17.1907 0.00669178 39.275C-0.393325 61.3592 17.1907 79.5933 39.275 79.9933C61.3592 80.3933 79.5933 62.8093 79.9933 40.7084C80.3933 18.6241 62.8093 0.390041 40.725 0.00669178ZM39.4083 72.493C21.4909 72.1597 7.17365 57.3257 7.507 39.4083C7.82368 21.4909 22.6576 7.17365 40.575 7.49033C58.5091 7.82368 72.8097 22.6576 72.493 40.575C72.1763 58.4924 57.3257 72.8097 39.4083 72.493Z" fill="#FF782C"></path>
								<path d="M40.525 10.8238C24.441 10.5405 11.1238 23.391 10.8405 39.475C10.7455 44.5352 11.9605 49.3204 14.1639 53.5139H23.3326V24.8027C23.3326 23.0476 25.7177 22.4893 26.4928 24.0643L40 51.4171L53.5072 24.066C54.2822 22.4893 56.6674 23.0476 56.6674 24.8027V53.5139H65.8077C67.8578 49.6171 69.0779 45.2169 69.1595 40.525C69.4429 24.441 56.609 11.1238 40.525 10.8238Z" fill="#FF782C"></path>
								<path d="M53.3339 55.1806V31.943L41.4934 55.919C40.9334 57.0574 39.065 57.0574 38.5049 55.919L26.6661 31.943V55.1806C26.6661 56.1007 25.9211 56.8474 24.9994 56.8474H16.2474C21.4326 64.1327 29.8629 68.9795 39.475 69.1595C49.4704 69.3362 58.3908 64.436 63.786 56.8474H55.0006C54.0789 56.8474 53.3339 56.1007 53.3339 55.1806Z" fill="#FF782C"></path>
							</svg>
							<h2 class="text-black mb-2 font-w600">
								${{ number_format(Cryptocap::getSingleAsset('cardano')->data->priceUsd,2) }}</h2>
							<p class="mb-0 fs-14">
								<svg width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g filter="url(#filter0_d5)">
										<path d="M5 16C5.91797 14.9157 8.89728 11.7277 10.5 10L16.5 13L23.5 4" stroke="#2BC155" stroke-width="2" stroke-linecap="round"></path>
									</g>
									<defs>
										<filter id="filter0_d5" x="-3.05176e-05" y="-6.10352e-05" width="28.5001" height="22.0001" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
											<feOffset dy="1"></feOffset>
											<feGaussianBlur stdDeviation="2"></feGaussianBlur>
											<feColorMatrix type="matrix" values="0 0 0 0 0.172549 0 0 0 0 0.72549 0 0 0 0 0.337255 0 0 0 0.61 0">
											</feColorMatrix>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow">
											</feBlend>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
										</filter>
									</defs>
								</svg>
								<span class="text-success mr-1">45%</span>This week
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				@php
				$events = Cryptocap::getAssets();
				$data = json_decode(json_encode($events),true);


				@endphp

				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Today's Cryptocurrency Prices by Market Cap</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<div id="example4_wrapper" class="dataTables_wrapper no-footer">


									<table id="example4" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example4_info">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 52.45px;" aria-sort="ascending" aria-label="Roll No: activate to sort column descending">#</th>
												<th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 102.3px;" aria-label="Student Name: activate to sort column ascending">Name
												</th>
												<th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 112.067px;" aria-label="Invoice number: activate to sort column ascending">Price
												</th>
												<th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 74.7px;" aria-label="Fees Type : activate to sort column ascending">24H %
												</th>
												<th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 66px;" aria-label="Status : activate to sort column ascending">Marketcap
												</th>
												<th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 74.7px;" aria-label="Fees Type : activate to sort column ascending">
													Volume(24h) </th>
												<th class="sorting" tabindex="0" aria-controls="example4" rowspan="1" colspan="1" style="width: 74.7px;" aria-label="Fees Type : activate to sort column ascending">
													Circulating Supply </th>
											</tr>
										</thead>
										<tbody>
											@foreach($events->data as $idx => $data)
											<tr>
												<td>{{ $data->rank }}</td>
												<td>{{ $data->symbol .'-'. $data->name }}</td>
												<td>{{ number_format($data->priceUsd,2) }}</td>
												<td>{{ $data->changePercent24Hr }}</td>
												<td>{{ number_format($data->marketCapUsd,0) }}</td>
												<td>{{ number_format($data->volumeUsd24Hr,0) }}</td>
												<td class='has-details'> <span class="details">Calcutale Supply -
														{{ number_format($data->supply,0) }}<br> Max Supply -
														{{ number_format($data->maxSupply,0) }}</span>{{ number_format($data->supply,0) }}<br><small>{{ number_format($data->maxSupply,0) }}</small>
												</td>
											</tr>
											@endforeach

										</tbody>
									</table>

								</div>
							</div>
						</div>
					</div>




				</div>
			</div>


		</div>
	</div>
	<!--**********************************
            Content body end
        ***********************************-->
	@endsection
	@section('chart')
		<script>
			$(function(){
			  //get the pie chart canvas
			  var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
			  var ctx = $("#pie-chart");
			 
			  //pie chart data
			  var data = {
				labels: cData.label,
				datasets: [
				{
				  label: "Users Count",
				  data: cData.data,
				  backgroundColor: [
				  "#DEB887",
				  "#A9A9A9",
				  "#DC143C",
				  "#F4A460",
				  "#2E8B57",
				  "#1D7A46",
				  "#CDA776",
				  ],
				  borderColor: [
				  "#CDA776",
				  "#989898",
				  "#CB252B",
				  "#E39371",
				  "#1D7A46",
				  "#F4A460",
				  "#CDA776",
				  ],
				  borderWidth: [1, 1, 1, 1, 1,1,1]
				}
				]
			  };
			 
			  //options
			  var options = {
				responsive: true,
				title: {
				display: true,
				position: "top",
				text: "Last Week Registered Users",
				fontSize: 18,
				fontColor: "#fff"
				},
				legend: {
				display: true,
				position: "bottom",
				labels: {
				  fontColor: "#fff",
				  fontSize: 16
				}
				}
			  };
			 
			  //create Pie Chart class object
			  var chart1 = new Chart(ctx, {
				type: "doughnut",
				data: data,
				options: options
			  });
			 
			});
			</script>  
		@endsection
	