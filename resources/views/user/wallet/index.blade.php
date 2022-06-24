@extends('layouts.user.app')

@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="min-height: 796px;">
			<div class="container-fluid">
				<div class="form-head mb-sm-5 mb-3 d-flex align-items-center flex-wrap">
					<h2 class="font-w600 mb-0 mr-auto mb-2 text-black">My Wallet</h2>
					<a href="javascript:void(0);" class="btn btn-secondary mb-2">+ Withdraw</a>
				</div>
				<div class="row">
					<div class="col-xl-3 col-xxl-4">
						<div class="swiper-box">
							<div class="swiper-container card-swiper swiper-container-initialized swiper-container-vertical swiper-container-pointer-events swiper-container-free-mode">
								<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);" id="swiper-wrapper-0a7812a3110a99a5d" aria-live="polite">
									<div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 8">
										<div class="card-bx stacked card">
											<img src="images/card/card1.jpg" alt="">
											<div class="card-info">
												<p class="mb-1 text-white fs-14">Package Earn</p>
												<div class="d-flex justify-content-between">
													<h2 class="num-text text-white mb-5 font-w600"></h2>
													<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M19.2744 18.8013H16.0334V23.616H19.2744C19.9286 23.616 20.5354 23.3506 20.9613 22.9053C21.4066 22.4784 21.672 21.8726 21.672 21.1989C21.673 19.8813 20.592 18.8013 19.2744 18.8013Z" fill="white"></path>
														<path d="M18 0C8.07429 0 0 8.07429 0 18C0 27.9257 8.07429 36 18 36C27.9257 36 36 27.9247 36 18C36 8.07531 27.9247 0 18 0ZM21.6627 26.3355H19.5398V29.6722H17.3129V26.3355H16.0899V29.6722H13.8528V26.3355H9.91954V24.2414H12.0898V11.6928H9.91954V9.59863H13.8528V6.3288H16.0899V9.59863H17.3129V6.3288H19.5398V9.59863H21.4735C22.5535 9.59863 23.5491 10.044 24.2599 10.7547C24.9706 11.4655 25.416 12.4611 25.416 13.5411C25.416 15.6549 23.7477 17.3798 21.6627 17.4744C24.1077 17.4744 26.0794 19.4647 26.0794 21.9096C26.0794 24.3453 24.1087 26.3355 21.6627 26.3355Z" fill="white"></path>
														<path d="M20.7062 15.8441C21.095 15.4553 21.3316 14.9338 21.3316 14.3465C21.3316 13.1812 20.3842 12.2328 19.2178 12.2328H16.0334V16.4695H19.2178C19.7959 16.4695 20.3266 16.2226 20.7062 15.8441Z" fill="white"></path>
													</svg>
												</div>
												
											</div>
										</div>
									</div>
									
									<div class="swiper-slide" role="group" aria-label="3 / 8">
										<div class="card-bx stacked card">
											<img src="images/card/card3.jpg" alt="">
											<div class="card-info">
												<p class="mb-1 text-white fs-14">Uni level Commission</p>
												<div class="d-flex justify-content-between">
													<h2 class="num-text text-white mb-5 font-w600">${{ direct_commision()}}</h2>
													<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
														<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
													</svg>
												</div>
												
											</div>
										</div>
									</div>
									<div class="swiper-slide" role="group" aria-label="4 / 8">
										<div class="card-bx stacked card">
											<img src="images/card/card4.jpg" alt="">
											<div class="card-info">
												<p class="mb-1 text-white fs-14">Binary Commission</p>
												<div class="d-flex justify-content-between">
													<h2 class="num-text text-white mb-5 font-w600">${{ binary_commision() }}</h2>
													<svg width="55" height="34" viewBox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
														<circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
													</svg>
												</div>
												
											</div>
										</div>
									</div>
									
									
									
									
								</div>
							<!-- Add Scroll Bar -->
								
							<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
								
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="row align-items-end">
											<div class="col-xl-6 col-lg-12 col-xxl-12">
												<div class="card">
													<div class="card-header">
														<h4 class="card-title">Datatable</h4>
													</div>
													<div class="card-body">
														<div class="table-responsive">
															<table id="example2" class="display" style="width:100%">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Position</th>
																		<th>Office</th>
																		<th>Age</th>
																		<th>Start date</th>
																		<th>Salary</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Tiger Nixon</td>
																		<td>System Architect</td>
																		<td>Edinburgh</td>
																		<td>61</td>
																		<td>2011/04/25</td>
																		<td>$320,800</td>
																	</tr>
																	<tr>
																		<td>Garrett Winters</td>
																		<td>Accountant</td>
																		<td>Tokyo</td>
																		<td>63</td>
																		<td>2011/07/25</td>
																		<td>$170,750</td>
																	</tr>
																	<tr>
																		<td>Ashton Cox</td>
																		<td>Junior Technical Author</td>
																		<td>San Francisco</td>
																		<td>66</td>
																		<td>2009/01/12</td>
																		<td>$86,000</td>
																	</tr>
																	<tr>
																		<td>Cedric Kelly</td>
																		<td>Senior Javascript Developer</td>
																		<td>Edinburgh</td>
																		<td>22</td>
																		<td>2012/03/29</td>
																		<td>$433,060</td>
																	</tr>
																	<tr>
																		<td>Airi Satou</td>
																		<td>Accountant</td>
																		<td>Tokyo</td>
																		<td>33</td>
																		<td>2008/11/28</td>
																		<td>$162,700</td>
																	</tr>
																	<tr>
																		<td>Brielle Williamson</td>
																		<td>Integration Specialist</td>
																		<td>New York</td>
																		<td>61</td>
																		<td>2012/12/02</td>
																		<td>$372,000</td>
																	</tr>
																	<tr>
																		<td>Herrod Chandler</td>
																		<td>Sales Assistant</td>
																		<td>San Francisco</td>
																		<td>59</td>
																		<td>2012/08/06</td>
																		<td>$137,500</td>
																	</tr>
																	<tr>
																		<td>Rhona Davidson</td>
																		<td>Integration Specialist</td>
																		<td>Tokyo</td>
																		<td>55</td>
																		<td>2010/10/14</td>
																		<td>$327,900</td>
																	</tr>
																	<tr>
																		<td>Colleen Hurst</td>
																		<td>Javascript Developer</td>
																		<td>San Francisco</td>
																		<td>39</td>
																		<td>2009/09/15</td>
																		<td>$205,500</td>
																	</tr>
																	<tr>
																		<td>Sonya Frost</td>
																		<td>Software Engineer</td>
																		<td>Edinburgh</td>
																		<td>23</td>
																		<td>2008/12/13</td>
																		<td>$103,600</td>
																	</tr>
																	<tr>
																		<td>Jena Gaines</td>
																		<td>Office Manager</td>
																		<td>London</td>
																		<td>30</td>
																		<td>2008/12/19</td>
																		<td>$90,560</td>
																	</tr>
																	<tr>
																		<td>Quinn Flynn</td>
																		<td>Support Lead</td>
																		<td>Edinburgh</td>
																		<td>22</td>
																		<td>2013/03/03</td>
																		<td>$342,000</td>
																	</tr>
																	<tr>
																		<td>Charde Marshall</td>
																		<td>Regional Director</td>
																		<td>San Francisco</td>
																		<td>36</td>
																		<td>2008/10/16</td>
																		<td>$470,600</td>
																	</tr>
																	<tr>
																		<td>Haley Kennedy</td>
																		<td>Senior Marketing Designer</td>
																		<td>London</td>
																		<td>43</td>
																		<td>2012/12/18</td>
																		<td>$313,500</td>
																	</tr>
																	<tr>
																		<td>Tatyana Fitzpatrick</td>
																		<td>Regional Director</td>
																		<td>London</td>
																		<td>19</td>
																		<td>2010/03/17</td>
																		<td>$385,750</td>
																	</tr>
																	<tr>
																		<td>Michael Silva</td>
																		<td>Marketing Designer</td>
																		<td>London</td>
																		<td>66</td>
																		<td>2012/11/27</td>
																		<td>$198,500</td>
																	</tr>
																	<tr>
																		<td>Paul Byrd</td>
																		<td>Chief Financial Officer (CFO)</td>
																		<td>New York</td>
																		<td>64</td>
																		<td>2010/06/09</td>
																		<td>$725,000</td>
																	</tr>
																	<tr>
																		<td>Gloria Little</td>
																		<td>Systems Administrator</td>
																		<td>New York</td>
																		<td>59</td>
																		<td>2009/04/10</td>
																		<td>$237,500</td>
																	</tr>
																	<tr>
																		<td>Bradley Greer</td>
																		<td>Software Engineer</td>
																		<td>London</td>
																		<td>41</td>
																		<td>2012/10/13</td>
																		<td>$132,000</td>
																	</tr>
																	<tr>
																		<td>Dai Rios</td>
																		<td>Personnel Lead</td>
																		<td>Edinburgh</td>
																		<td>35</td>
																		<td>2012/09/26</td>
																		<td>$217,500</td>
																	</tr>
																	<tr>
																		<td>Jenette Caldwell</td>
																		<td>Development Lead</td>
																		<td>New York</td>
																		<td>30</td>
																		<td>2011/09/03</td>
																		<td>$345,000</td>
																	</tr>
																	<tr>
																		<td>Yuri Berry</td>
																		<td>Chief Marketing Officer (CMO)</td>
																		<td>New York</td>
																		<td>40</td>
																		<td>2009/06/25</td>
																		<td>$675,000</td>
																	</tr>
																	<tr>
																		<td>Caesar Vance</td>
																		<td>Pre-Sales Support</td>
																		<td>New York</td>
																		<td>21</td>
																		<td>2011/12/12</td>
																		<td>$106,450</td>
																	</tr>
																	<tr>
																		<td>Doris Wilder</td>
																		<td>Sales Assistant</td>
																		<td>Sidney</td>
																		<td>23</td>
																		<td>2010/09/20</td>
																		<td>$85,600</td>
																	</tr>
																	<tr>
																		<td>Angelica Ramos</td>
																		<td>Chief Executive Officer (CEO)</td>
																		<td>London</td>
																		<td>47</td>
																		<td>2009/10/09</td>
																		<td>$1,200,000</td>
																	</tr>
																	<tr>
																		<td>Gavin Joyce</td>
																		<td>Developer</td>
																		<td>Edinburgh</td>
																		<td>42</td>
																		<td>2010/12/22</td>
																		<td>$92,575</td>
																	</tr>
																	<tr>
																		<td>Jennifer Chang</td>
																		<td>Regional Director</td>
																		<td>Singapore</td>
																		<td>28</td>
																		<td>2010/11/14</td>
																		<td>$357,650</td>
																	</tr>
																	<tr>
																		<td>Brenden Wagner</td>
																		<td>Software Engineer</td>
																		<td>San Francisco</td>
																		<td>28</td>
																		<td>2011/06/07</td>
																		<td>$206,850</td>
																	</tr>
																	<tr>
																		<td>Fiona Green</td>
																		<td>Chief Operating Officer (COO)</td>
																		<td>San Francisco</td>
																		<td>48</td>
																		<td>2010/03/11</td>
																		<td>$850,000</td>
																	</tr>
																	<tr>
																		<td>Shou Itou</td>
																		<td>Regional Marketing</td>
																		<td>Tokyo</td>
																		<td>20</td>
																		<td>2011/08/14</td>
																		<td>$163,000</td>
																	</tr>
																	<tr>
																		<td>Michelle House</td>
																		<td>Integration Specialist</td>
																		<td>Sidney</td>
																		<td>37</td>
																		<td>2011/06/02</td>
																		<td>$95,400</td>
																	</tr>
																	<tr>
																		<td>Suki Burks</td>
																		<td>Developer</td>
																		<td>London</td>
																		<td>53</td>
																		<td>2009/10/22</td>
																		<td>$114,500</td>
																	</tr>
																	<tr>
																		<td>Prescott Bartlett</td>
																		<td>Technical Author</td>
																		<td>London</td>
																		<td>27</td>
																		<td>2011/05/07</td>
																		<td>$145,000</td>
																	</tr>
																	<tr>
																		<td>Gavin Cortez</td>
																		<td>Team Leader</td>
																		<td>San Francisco</td>
																		<td>22</td>
																		<td>2008/10/26</td>
																		<td>$235,500</td>
																	</tr>
																	<tr>
																		<td>Martena Mccray</td>
																		<td>Post-Sales support</td>
																		<td>Edinburgh</td>
																		<td>46</td>
																		<td>2011/03/09</td>
																		<td>$324,050</td>
																	</tr>
																	<tr>
																		<td>Unity Butler</td>
																		<td>Marketing Designer</td>
																		<td>San Francisco</td>
																		<td>47</td>
																		<td>2009/12/09</td>
																		<td>$85,675</td>
																	</tr>
																	<tr>
																		<td>Howard Hatfield</td>
																		<td>Office Manager</td>
																		<td>San Francisco</td>
																		<td>51</td>
																		<td>2008/12/16</td>
																		<td>$164,500</td>
																	</tr>
																	<tr>
																		<td>Hope Fuentes</td>
																		<td>Secretary</td>
																		<td>San Francisco</td>
																		<td>41</td>
																		<td>2010/02/12</td>
																		<td>$109,850</td>
																	</tr>
																	<tr>
																		<td>Vivian Harrell</td>
																		<td>Financial Controller</td>
																		<td>San Francisco</td>
																		<td>62</td>
																		<td>2009/02/14</td>
																		<td>$452,500</td>
																	</tr>
																	<tr>
																		<td>Timothy Mooney</td>
																		<td>Office Manager</td>
																		<td>London</td>
																		<td>37</td>
																		<td>2008/12/11</td>
																		<td>$136,200</td>
																	</tr>
																	<tr>
																		<td>Jackson Bradshaw</td>
																		<td>Director</td>
																		<td>New York</td>
																		<td>65</td>
																		<td>2008/09/26</td>
																		<td>$645,750</td>
																	</tr>
																	<tr>
																		<td>Olivia Liang</td>
																		<td>Support Engineer</td>
																		<td>Singapore</td>
																		<td>64</td>
																		<td>2011/02/03</td>
																		<td>$234,500</td>
																	</tr>
																	<tr>
																		<td>Bruno Nash</td>
																		<td>Software Engineer</td>
																		<td>London</td>
																		<td>38</td>
																		<td>2011/05/03</td>
																		<td>$163,500</td>
																	</tr>
																	<tr>
																		<td>Sakura Yamamoto</td>
																		<td>Support Engineer</td>
																		<td>Tokyo</td>
																		<td>37</td>
																		<td>2009/08/19</td>
																		<td>$139,575</td>
																	</tr>
																	<tr>
																		<td>Thor Walton</td>
																		<td>Developer</td>
																		<td>New York</td>
																		<td>61</td>
																		<td>2013/08/11</td>
																		<td>$98,540</td>
																	</tr>
																	<tr>
																		<td>Finn Camacho</td>
																		<td>Support Engineer</td>
																		<td>San Francisco</td>
																		<td>47</td>
																		<td>2009/07/07</td>
																		<td>$87,500</td>
																	</tr>
																	<tr>
																		<td>Serge Baldwin</td>
																		<td>Data Coordinator</td>
																		<td>Singapore</td>
																		<td>64</td>
																		<td>2012/04/09</td>
																		<td>$138,575</td>
																	</tr>
																	<tr>
																		<td>Zenaida Frank</td>
																		<td>Software Engineer</td>
																		<td>New York</td>
																		<td>63</td>
																		<td>2010/01/04</td>
																		<td>$125,250</td>
																	</tr>
																	<tr>
																		<td>Zorita Serrano</td>
																		<td>Software Engineer</td>
																		<td>San Francisco</td>
																		<td>56</td>
																		<td>2012/06/01</td>
																		<td>$115,000</td>
																	</tr>
																	<tr>
																		<td>Jennifer Acosta</td>
																		<td>Junior Javascript Developer</td>
																		<td>Edinburgh</td>
																		<td>43</td>
																		<td>2013/02/01</td>
																		<td>$75,650</td>
																	</tr>
																	<tr>
																		<td>Cara Stevens</td>
																		<td>Sales Assistant</td>
																		<td>New York</td>
																		<td>46</td>
																		<td>2011/12/06</td>
																		<td>$145,600</td>
																	</tr>
																	<tr>
																		<td>Hermione Butler</td>
																		<td>Regional Director</td>
																		<td>London</td>
																		<td>47</td>
																		<td>2011/03/21</td>
																		<td>$356,250</td>
																	</tr>
																	<tr>
																		<td>Lael Greer</td>
																		<td>Systems Administrator</td>
																		<td>London</td>
																		<td>21</td>
																		<td>2009/02/27</td>
																		<td>$103,500</td>
																	</tr>
																	<tr>
																		<td>Jonas Alexander</td>
																		<td>Developer</td>
																		<td>San Francisco</td>
																		<td>30</td>
																		<td>2010/07/14</td>
																		<td>$86,500</td>
																	</tr>
																	<tr>
																		<td>Shad Decker</td>
																		<td>Regional Director</td>
																		<td>Edinburgh</td>
																		<td>51</td>
																		<td>2008/11/13</td>
																		<td>$183,000</td>
																	</tr>
																	<tr>
																		<td>Michael Bruce</td>
																		<td>Javascript Developer</td>
																		<td>Singapore</td>
																		<td>29</td>
																		<td>2011/06/27</td>
																		<td>$183,000</td>
																	</tr>
																	<tr>
																		<td>Donna Snider</td>
																		<td>Customer Support</td>
																		<td>New York</td>
																		<td>27</td>
																		<td>2011/01/25</td>
																		<td>$112,000</td>
																	</tr>
																</tbody>
																<tfoot>
																	<tr>
																		<th>Name</th>
																		<th>Position</th>
																		<th>Office</th>
																		<th>Age</th>
																		<th>Start date</th>
																		<th>Salary</th>
																	</tr>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header d-block d-sm-flex border-0 pb-sm-0 pb-0 align-items-center">
										<div class="mr-auto mb-sm-0 mb-3">
											<h4 class="fs-20 text-black">Coin Chart</h4>
											<p class="mb-0 fs-12">Lorem ipsum dolor sit amet, consectetur</p>
										</div>
										<div class="dropdown bootstrap-select form-control style-1 default-select"><select class="form-control style-1 default-select" tabindex="-98">
											<option>Monthly (2021)</option>
											<option>Daily (2021)</option>
											<option>Weekly (2021)</option>
										</select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Monthly (2021)"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Monthly (2021)</div></div> </div></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
									</div>
									<div class="card-body pt-3" style="position: relative;">
										<div class="flex-wrap mb-sm-4 mb-2 align-items-center">
											<div class="d-flex align-items-center">
												<span class="fs-32 text-black font-w600 pr-3">$557,235.31</span>
												<span class="fs-22 text-success">7% <i class="fa fa-caret-up scale5 ml-2 text-success" aria-hidden="true"></i></span>
											</div>
											<p class="mb-0 text-black mr-auto">Last Week <span class="text-success">$563,443</span></p>
										</div>
										<div id="chartTimeline" class="timeline-chart" style="min-height: 315px;"><div id="apexchartsj4wqw0mk" class="apexcharts-canvas apexchartsj4wqw0mk apexcharts-theme-light" style="width: 542px; height: 300px;"><svg id="SvgjsSvg1144" width="542" height="300" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(-10, 0)" style="background: transparent none repeat scroll 0% 0%;"><g id="SvgjsG1146" class="apexcharts-inner apexcharts-graphical" transform="translate(70, 30)"><defs id="SvgjsDefs1145"><clipPath id="gridRectMaskj4wqw0mk"><rect id="SvgjsRect1150" width="466" height="230.73000000000002" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskj4wqw0mk"><rect id="SvgjsRect1151" width="466" height="234.73000000000002" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1197" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1198" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1200" font-family="poppins" x="17.76923076923077" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1201">06</tspan><title>06</title></text><text id="SvgjsText1203" font-family="poppins" x="53.30769230769231" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1204">07</tspan><title>07</title></text><text id="SvgjsText1206" font-family="poppins" x="88.84615384615384" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1207">08</tspan><title>08</title></text><text id="SvgjsText1209" font-family="poppins" x="124.38461538461539" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1210">09</tspan><title>09</title></text><text id="SvgjsText1212" font-family="poppins" x="159.92307692307693" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1213">10</tspan><title>10</title></text><text id="SvgjsText1215" font-family="poppins" x="195.46153846153848" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1216">11</tspan><title>11</title></text><text id="SvgjsText1218" font-family="poppins" x="231.00000000000003" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1219">12</tspan><title>12</title></text><text id="SvgjsText1221" font-family="poppins" x="266.53846153846155" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1222">13</tspan><title>13</title></text><text id="SvgjsText1224" font-family="poppins" x="302.0769230769231" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1225">14</tspan><title>14</title></text><text id="SvgjsText1227" font-family="poppins" x="337.61538461538464" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1228">15</tspan><title>15</title></text><text id="SvgjsText1230" font-family="poppins" x="373.1538461538462" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1231">16</tspan><title>16</title></text><text id="SvgjsText1233" font-family="poppins" x="408.69230769230774" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1234">17</tspan><title>17</title></text><text id="SvgjsText1236" font-family="poppins" x="444.2307692307693" y="259.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-xaxis-label apexcharts-xaxis-label" style="font-family: poppins;"><tspan id="SvgjsTspan1237">18</tspan><title>18</title></text></g></g><g id="SvgjsG1252" class="apexcharts-grid"><g id="SvgjsG1253" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1269" x1="0" y1="0" x2="462" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1270" x1="0" y1="46.146" x2="462" y2="46.146" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1271" x1="0" y1="92.292" x2="462" y2="92.292" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1272" x1="0" y1="138.438" x2="462" y2="138.438" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1273" x1="0" y1="184.584" x2="462" y2="184.584" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1274" x1="0" y1="230.73000000000002" x2="462" y2="230.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1254" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1255" x1="0" y1="231.73000000000002" x2="0" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1256" x1="35.53846153846154" y1="231.73000000000002" x2="35.53846153846154" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1257" x1="71.07692307692308" y1="231.73000000000002" x2="71.07692307692308" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1258" x1="106.61538461538461" y1="231.73000000000002" x2="106.61538461538461" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1259" x1="142.15384615384616" y1="231.73000000000002" x2="142.15384615384616" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1260" x1="177.6923076923077" y1="231.73000000000002" x2="177.6923076923077" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1261" x1="213.23076923076925" y1="231.73000000000002" x2="213.23076923076925" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1262" x1="248.7692307692308" y1="231.73000000000002" x2="248.7692307692308" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1263" x1="284.3076923076923" y1="231.73000000000002" x2="284.3076923076923" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1264" x1="319.84615384615387" y1="231.73000000000002" x2="319.84615384615387" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1265" x1="355.3846153846154" y1="231.73000000000002" x2="355.3846153846154" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1266" x1="390.92307692307696" y1="231.73000000000002" x2="390.92307692307696" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1267" x1="426.4615384615385" y1="231.73000000000002" x2="426.4615384615385" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1268" x1="462.00000000000006" y1="231.73000000000002" x2="462.00000000000006" y2="237.73000000000002" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1276" x1="0" y1="230.73000000000002" x2="462" y2="230.73000000000002" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1275" x1="0" y1="1" x2="0" y2="230.73000000000002" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1152" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1153" class="apexcharts-series" seriesName="NewxClients" rel="1" data:realIndex="0"><rect id="SvgjsRect1155" width="6.16" height="230.73000000000002" x="7.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1156" d="M 7.92 229.19000000000003L 7.92 163.05100000000002Q 11 159.971 14.08 163.05100000000002L 14.08 163.05100000000002L 14.08 229.19000000000003Q 11 232.27000000000004 7.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 7.92 229.19000000000003L 7.92 163.05100000000002Q 11 159.971 14.08 163.05100000000002L 14.08 163.05100000000002L 14.08 229.19000000000003Q 11 232.27000000000004 7.92 229.19000000000003z" pathFrom="M 7.92 229.19000000000003L 7.92 230.73000000000002L 14.08 230.73000000000002L 14.08 230.73000000000002L 14.08 230.73000000000002L 7.92 230.73000000000002" cy="161.51100000000002" cx="29.92" j="0" val="300" barHeight="69.21900000000001" barWidth="6.16"></path><rect id="SvgjsRect1157" width="6.16" height="230.73000000000002" x="29.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1158" d="M 29.92 229.19000000000003L 29.92 128.4415Q 33 125.36149999999999 36.08 128.4415L 36.08 128.4415L 36.08 229.19000000000003Q 33 232.27000000000004 29.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 29.92 229.19000000000003L 29.92 128.4415Q 33 125.36149999999999 36.08 128.4415L 36.08 128.4415L 36.08 229.19000000000003Q 33 232.27000000000004 29.92 229.19000000000003z" pathFrom="M 29.92 229.19000000000003L 29.92 230.73000000000002L 36.08 230.73000000000002L 36.08 230.73000000000002L 36.08 230.73000000000002L 29.92 230.73000000000002" cy="126.9015" cx="51.92" j="1" val="450" barHeight="103.82850000000002" barWidth="6.16"></path><rect id="SvgjsRect1159" width="6.16" height="230.73000000000002" x="51.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1160" d="M 51.92 229.19000000000003L 51.92 93.83200000000001Q 55 90.75200000000001 58.08 93.83200000000001L 58.08 93.83200000000001L 58.08 229.19000000000003Q 55 232.27000000000004 51.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 51.92 229.19000000000003L 51.92 93.83200000000001Q 55 90.75200000000001 58.08 93.83200000000001L 58.08 93.83200000000001L 58.08 229.19000000000003Q 55 232.27000000000004 51.92 229.19000000000003z" pathFrom="M 51.92 229.19000000000003L 51.92 230.73000000000002L 58.08 230.73000000000002L 58.08 230.73000000000002L 58.08 230.73000000000002L 51.92 230.73000000000002" cy="92.292" cx="73.92" j="2" val="600" barHeight="138.43800000000002" barWidth="6.16"></path><rect id="SvgjsRect1161" width="6.16" height="230.73000000000002" x="73.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1162" d="M 73.92 229.19000000000003L 73.92 93.83200000000001Q 77 90.75200000000001 80.08 93.83200000000001L 80.08 93.83200000000001L 80.08 229.19000000000003Q 77 232.27000000000004 73.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 73.92 229.19000000000003L 73.92 93.83200000000001Q 77 90.75200000000001 80.08 93.83200000000001L 80.08 93.83200000000001L 80.08 229.19000000000003Q 77 232.27000000000004 73.92 229.19000000000003z" pathFrom="M 73.92 229.19000000000003L 73.92 230.73000000000002L 80.08 230.73000000000002L 80.08 230.73000000000002L 80.08 230.73000000000002L 73.92 230.73000000000002" cy="92.292" cx="95.92" j="3" val="600" barHeight="138.43800000000002" barWidth="6.16"></path><rect id="SvgjsRect1163" width="6.16" height="230.73000000000002" x="95.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1164" d="M 95.92 229.19000000000003L 95.92 139.97799999999998Q 99 136.89799999999997 102.08 139.97799999999998L 102.08 139.97799999999998L 102.08 229.19000000000003Q 99 232.27000000000004 95.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 95.92 229.19000000000003L 95.92 139.97799999999998Q 99 136.89799999999997 102.08 139.97799999999998L 102.08 139.97799999999998L 102.08 229.19000000000003Q 99 232.27000000000004 95.92 229.19000000000003z" pathFrom="M 95.92 229.19000000000003L 95.92 230.73000000000002L 102.08 230.73000000000002L 102.08 230.73000000000002L 102.08 230.73000000000002L 95.92 230.73000000000002" cy="138.438" cx="117.92" j="4" val="400" barHeight="92.29200000000002" barWidth="6.16"></path><rect id="SvgjsRect1165" width="6.16" height="230.73000000000002" x="117.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1166" d="M 117.92 229.19000000000003L 117.92 128.4415Q 121 125.36149999999999 124.08 128.4415L 124.08 128.4415L 124.08 229.19000000000003Q 121 232.27000000000004 117.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 117.92 229.19000000000003L 117.92 128.4415Q 121 125.36149999999999 124.08 128.4415L 124.08 128.4415L 124.08 229.19000000000003Q 121 232.27000000000004 117.92 229.19000000000003z" pathFrom="M 117.92 229.19000000000003L 117.92 230.73000000000002L 124.08 230.73000000000002L 124.08 230.73000000000002L 124.08 230.73000000000002L 117.92 230.73000000000002" cy="126.9015" cx="139.92000000000002" j="5" val="450" barHeight="103.82850000000002" barWidth="6.16"></path><rect id="SvgjsRect1167" width="6.16" height="230.73000000000002" x="139.92000000000002" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1168" d="M 139.92000000000002 229.19000000000003L 139.92000000000002 137.67069999999998Q 143.00000000000003 134.59069999999997 146.08 137.67069999999998L 146.08 137.67069999999998L 146.08 229.19000000000003Q 143.00000000000003 232.27000000000004 139.92000000000002 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 139.92000000000002 229.19000000000003L 139.92000000000002 137.67069999999998Q 143.00000000000003 134.59069999999997 146.08 137.67069999999998L 146.08 137.67069999999998L 146.08 229.19000000000003Q 143.00000000000003 232.27000000000004 139.92000000000002 229.19000000000003z" pathFrom="M 139.92000000000002 229.19000000000003L 139.92000000000002 230.73000000000002L 146.08 230.73000000000002L 146.08 230.73000000000002L 146.08 230.73000000000002L 139.92000000000002 230.73000000000002" cy="136.1307" cx="161.92000000000002" j="6" val="410" barHeight="94.59930000000001" barWidth="6.16"></path><rect id="SvgjsRect1169" width="6.16" height="230.73000000000002" x="161.92000000000002" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1170" d="M 161.92000000000002 229.19000000000003L 161.92000000000002 123.82690000000001Q 165.00000000000003 120.74690000000001 168.08 123.82690000000001L 168.08 123.82690000000001L 168.08 229.19000000000003Q 165.00000000000003 232.27000000000004 161.92000000000002 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 161.92000000000002 229.19000000000003L 161.92000000000002 123.82690000000001Q 165.00000000000003 120.74690000000001 168.08 123.82690000000001L 168.08 123.82690000000001L 168.08 229.19000000000003Q 165.00000000000003 232.27000000000004 161.92000000000002 229.19000000000003z" pathFrom="M 161.92000000000002 229.19000000000003L 161.92000000000002 230.73000000000002L 168.08 230.73000000000002L 168.08 230.73000000000002L 168.08 230.73000000000002L 161.92000000000002 230.73000000000002" cy="122.2869" cx="183.92000000000002" j="7" val="470" barHeight="108.44310000000002" barWidth="6.16"></path><rect id="SvgjsRect1171" width="6.16" height="230.73000000000002" x="183.92000000000002" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1172" d="M 183.92000000000002 229.19000000000003L 183.92000000000002 121.51960000000001Q 187.00000000000003 118.43960000000001 190.08 121.51960000000001L 190.08 121.51960000000001L 190.08 229.19000000000003Q 187.00000000000003 232.27000000000004 183.92000000000002 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 183.92000000000002 229.19000000000003L 183.92000000000002 121.51960000000001Q 187.00000000000003 118.43960000000001 190.08 121.51960000000001L 190.08 121.51960000000001L 190.08 229.19000000000003Q 187.00000000000003 232.27000000000004 183.92000000000002 229.19000000000003z" pathFrom="M 183.92000000000002 229.19000000000003L 183.92000000000002 230.73000000000002L 190.08 230.73000000000002L 190.08 230.73000000000002L 190.08 230.73000000000002L 183.92000000000002 230.73000000000002" cy="119.9796" cx="205.92000000000002" j="8" val="480" barHeight="110.75040000000001" barWidth="6.16"></path><rect id="SvgjsRect1173" width="6.16" height="230.73000000000002" x="205.92000000000002" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1174" d="M 205.92000000000002 229.19000000000003L 205.92000000000002 70.759Q 209.00000000000003 67.679 212.08 70.759L 212.08 70.759L 212.08 229.19000000000003Q 209.00000000000003 232.27000000000004 205.92000000000002 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 205.92000000000002 229.19000000000003L 205.92000000000002 70.759Q 209.00000000000003 67.679 212.08 70.759L 212.08 70.759L 212.08 229.19000000000003Q 209.00000000000003 232.27000000000004 205.92000000000002 229.19000000000003z" pathFrom="M 205.92000000000002 229.19000000000003L 205.92000000000002 230.73000000000002L 212.08 230.73000000000002L 212.08 230.73000000000002L 212.08 230.73000000000002L 205.92000000000002 230.73000000000002" cy="69.219" cx="227.92000000000002" j="9" val="700" barHeight="161.51100000000002" barWidth="6.16"></path><rect id="SvgjsRect1175" width="6.16" height="230.73000000000002" x="227.92000000000002" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1176" d="M 227.92000000000002 229.19000000000003L 227.92000000000002 93.83200000000001Q 231.00000000000003 90.75200000000001 234.08 93.83200000000001L 234.08 93.83200000000001L 234.08 229.19000000000003Q 231.00000000000003 232.27000000000004 227.92000000000002 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 227.92000000000002 229.19000000000003L 227.92000000000002 93.83200000000001Q 231.00000000000003 90.75200000000001 234.08 93.83200000000001L 234.08 93.83200000000001L 234.08 229.19000000000003Q 231.00000000000003 232.27000000000004 227.92000000000002 229.19000000000003z" pathFrom="M 227.92000000000002 229.19000000000003L 227.92000000000002 230.73000000000002L 234.08 230.73000000000002L 234.08 230.73000000000002L 234.08 230.73000000000002L 227.92000000000002 230.73000000000002" cy="92.292" cx="249.92000000000002" j="10" val="600" barHeight="138.43800000000002" barWidth="6.16"></path><rect id="SvgjsRect1177" width="6.16" height="230.73000000000002" x="249.92000000000002" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1178" d="M 249.92000000000002 229.19000000000003L 249.92000000000002 47.685999999999986Q 253.00000000000003 44.60599999999999 256.08000000000004 47.685999999999986L 256.08000000000004 47.685999999999986L 256.08000000000004 229.19000000000003Q 253.00000000000003 232.27000000000004 249.92000000000002 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 249.92000000000002 229.19000000000003L 249.92000000000002 47.685999999999986Q 253.00000000000003 44.60599999999999 256.08000000000004 47.685999999999986L 256.08000000000004 47.685999999999986L 256.08000000000004 229.19000000000003Q 253.00000000000003 232.27000000000004 249.92000000000002 229.19000000000003z" pathFrom="M 249.92000000000002 229.19000000000003L 249.92000000000002 230.73000000000002L 256.08000000000004 230.73000000000002L 256.08000000000004 230.73000000000002L 256.08000000000004 230.73000000000002L 249.92000000000002 230.73000000000002" cy="46.14599999999999" cx="271.92" j="11" val="800" barHeight="184.58400000000003" barWidth="6.16"></path><rect id="SvgjsRect1179" width="6.16" height="230.73000000000002" x="271.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1180" d="M 271.92 229.19000000000003L 271.92 139.97799999999998Q 275 136.89799999999997 278.08000000000004 139.97799999999998L 278.08000000000004 139.97799999999998L 278.08000000000004 229.19000000000003Q 275 232.27000000000004 271.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 271.92 229.19000000000003L 271.92 139.97799999999998Q 275 136.89799999999997 278.08000000000004 139.97799999999998L 278.08000000000004 139.97799999999998L 278.08000000000004 229.19000000000003Q 275 232.27000000000004 271.92 229.19000000000003z" pathFrom="M 271.92 229.19000000000003L 271.92 230.73000000000002L 278.08000000000004 230.73000000000002L 278.08000000000004 230.73000000000002L 278.08000000000004 230.73000000000002L 271.92 230.73000000000002" cy="138.438" cx="293.92" j="12" val="400" barHeight="92.29200000000002" barWidth="6.16"></path><rect id="SvgjsRect1181" width="6.16" height="230.73000000000002" x="293.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1182" d="M 293.92 229.19000000000003L 293.92 93.83200000000001Q 297 90.75200000000001 300.08000000000004 93.83200000000001L 300.08000000000004 93.83200000000001L 300.08000000000004 229.19000000000003Q 297 232.27000000000004 293.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 293.92 229.19000000000003L 293.92 93.83200000000001Q 297 90.75200000000001 300.08000000000004 93.83200000000001L 300.08000000000004 93.83200000000001L 300.08000000000004 229.19000000000003Q 297 232.27000000000004 293.92 229.19000000000003z" pathFrom="M 293.92 229.19000000000003L 293.92 230.73000000000002L 300.08000000000004 230.73000000000002L 300.08000000000004 230.73000000000002L 300.08000000000004 230.73000000000002L 293.92 230.73000000000002" cy="92.292" cx="315.92" j="13" val="600" barHeight="138.43800000000002" barWidth="6.16"></path><rect id="SvgjsRect1183" width="6.16" height="230.73000000000002" x="315.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1184" d="M 315.92 229.19000000000003L 315.92 151.5145Q 319 148.43449999999999 322.08000000000004 151.5145L 322.08000000000004 151.5145L 322.08000000000004 229.19000000000003Q 319 232.27000000000004 315.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 315.92 229.19000000000003L 315.92 151.5145Q 319 148.43449999999999 322.08000000000004 151.5145L 322.08000000000004 151.5145L 322.08000000000004 229.19000000000003Q 319 232.27000000000004 315.92 229.19000000000003z" pathFrom="M 315.92 229.19000000000003L 315.92 230.73000000000002L 322.08000000000004 230.73000000000002L 322.08000000000004 230.73000000000002L 322.08000000000004 230.73000000000002L 315.92 230.73000000000002" cy="149.9745" cx="337.92" j="14" val="350" barHeight="80.75550000000001" barWidth="6.16"></path><rect id="SvgjsRect1185" width="6.16" height="230.73000000000002" x="337.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1186" d="M 337.92 229.19000000000003L 337.92 174.5875Q 341 171.5075 344.08000000000004 174.5875L 344.08000000000004 174.5875L 344.08000000000004 229.19000000000003Q 341 232.27000000000004 337.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 337.92 229.19000000000003L 337.92 174.5875Q 341 171.5075 344.08000000000004 174.5875L 344.08000000000004 174.5875L 344.08000000000004 229.19000000000003Q 341 232.27000000000004 337.92 229.19000000000003z" pathFrom="M 337.92 229.19000000000003L 337.92 230.73000000000002L 344.08000000000004 230.73000000000002L 344.08000000000004 230.73000000000002L 344.08000000000004 230.73000000000002L 337.92 230.73000000000002" cy="173.0475" cx="359.92" j="15" val="250" barHeight="57.68250000000001" barWidth="6.16"></path><rect id="SvgjsRect1187" width="6.16" height="230.73000000000002" x="359.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1188" d="M 359.92 229.19000000000003L 359.92 116.905Q 363 113.825 366.08000000000004 116.905L 366.08000000000004 116.905L 366.08000000000004 229.19000000000003Q 363 232.27000000000004 359.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 359.92 229.19000000000003L 359.92 116.905Q 363 113.825 366.08000000000004 116.905L 366.08000000000004 116.905L 366.08000000000004 229.19000000000003Q 363 232.27000000000004 359.92 229.19000000000003z" pathFrom="M 359.92 229.19000000000003L 359.92 230.73000000000002L 366.08000000000004 230.73000000000002L 366.08000000000004 230.73000000000002L 366.08000000000004 230.73000000000002L 359.92 230.73000000000002" cy="115.365" cx="381.92" j="16" val="500" barHeight="115.36500000000002" barWidth="6.16"></path><rect id="SvgjsRect1189" width="6.16" height="230.73000000000002" x="381.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1190" d="M 381.92 229.19000000000003L 381.92 105.3685Q 385 102.2885 388.08000000000004 105.3685L 388.08000000000004 105.3685L 388.08000000000004 229.19000000000003Q 385 232.27000000000004 381.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 381.92 229.19000000000003L 381.92 105.3685Q 385 102.2885 388.08000000000004 105.3685L 388.08000000000004 105.3685L 388.08000000000004 229.19000000000003Q 385 232.27000000000004 381.92 229.19000000000003z" pathFrom="M 381.92 229.19000000000003L 381.92 230.73000000000002L 388.08000000000004 230.73000000000002L 388.08000000000004 230.73000000000002L 388.08000000000004 230.73000000000002L 381.92 230.73000000000002" cy="103.82849999999999" cx="403.92" j="17" val="550" barHeight="126.90150000000003" barWidth="6.16"></path><rect id="SvgjsRect1191" width="6.16" height="230.73000000000002" x="403.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1192" d="M 403.92 229.19000000000003L 403.92 163.05100000000002Q 407 159.971 410.08000000000004 163.05100000000002L 410.08000000000004 163.05100000000002L 410.08000000000004 229.19000000000003Q 407 232.27000000000004 403.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 403.92 229.19000000000003L 403.92 163.05100000000002Q 407 159.971 410.08000000000004 163.05100000000002L 410.08000000000004 163.05100000000002L 410.08000000000004 229.19000000000003Q 407 232.27000000000004 403.92 229.19000000000003z" pathFrom="M 403.92 229.19000000000003L 403.92 230.73000000000002L 410.08000000000004 230.73000000000002L 410.08000000000004 230.73000000000002L 410.08000000000004 230.73000000000002L 403.92 230.73000000000002" cy="161.51100000000002" cx="425.92" j="18" val="300" barHeight="69.21900000000001" barWidth="6.16"></path><rect id="SvgjsRect1193" width="6.16" height="230.73000000000002" x="425.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1194" d="M 425.92 229.19000000000003L 425.92 139.97799999999998Q 429 136.89799999999997 432.08000000000004 139.97799999999998L 432.08000000000004 139.97799999999998L 432.08000000000004 229.19000000000003Q 429 232.27000000000004 425.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 425.92 229.19000000000003L 425.92 139.97799999999998Q 429 136.89799999999997 432.08000000000004 139.97799999999998L 432.08000000000004 139.97799999999998L 432.08000000000004 229.19000000000003Q 429 232.27000000000004 425.92 229.19000000000003z" pathFrom="M 425.92 229.19000000000003L 425.92 230.73000000000002L 432.08000000000004 230.73000000000002L 432.08000000000004 230.73000000000002L 432.08000000000004 230.73000000000002L 425.92 230.73000000000002" cy="138.438" cx="447.92" j="19" val="400" barHeight="92.29200000000002" barWidth="6.16"></path><rect id="SvgjsRect1195" width="6.16" height="230.73000000000002" x="447.92" y="0" rx="5" ry="5" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#E9E9E9" class="apexcharts-backgroundBar"></rect><path id="SvgjsPath1196" d="M 447.92 229.19000000000003L 447.92 186.124Q 451 183.04399999999998 454.08000000000004 186.124L 454.08000000000004 186.124L 454.08000000000004 229.19000000000003Q 451 232.27000000000004 447.92 229.19000000000003z" fill="rgba(184,126,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="square" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskj4wqw0mk)" pathTo="M 447.92 229.19000000000003L 447.92 186.124Q 451 183.04399999999998 454.08000000000004 186.124L 454.08000000000004 186.124L 454.08000000000004 229.19000000000003Q 451 232.27000000000004 447.92 229.19000000000003z" pathFrom="M 447.92 229.19000000000003L 447.92 230.73000000000002L 454.08000000000004 230.73000000000002L 454.08000000000004 230.73000000000002L 454.08000000000004 230.73000000000002L 447.92 230.73000000000002" cy="184.584" cx="469.92" j="20" val="200" barHeight="46.14600000000001" barWidth="6.16"></path></g><g id="SvgjsG1154" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1277" x1="0" y1="0" x2="462" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1278" x1="0" y1="0" x2="462" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1279" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1280" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1281" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1238" class="apexcharts-yaxis" rel="0" transform="translate(40, 0)"><g id="SvgjsG1239" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1240" font-family="Poppins" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Poppins;"><tspan id="SvgjsTspan1241">1000k</tspan></text><text id="SvgjsText1242" font-family="Poppins" x="20" y="77.646" text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Poppins;"><tspan id="SvgjsTspan1243">800k</tspan></text><text id="SvgjsText1244" font-family="Poppins" x="20" y="123.792" text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Poppins;"><tspan id="SvgjsTspan1245">600k</tspan></text><text id="SvgjsText1246" font-family="Poppins" x="20" y="169.938" text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Poppins;"><tspan id="SvgjsTspan1247">400k</tspan></text><text id="SvgjsText1248" font-family="Poppins" x="20" y="216.084" text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Poppins;"><tspan id="SvgjsTspan1249">200k</tspan></text><text id="SvgjsText1250" font-family="Poppins" x="20" y="262.23" text-anchor="end" dominant-baseline="auto" font-size="14px" font-weight="100" fill="#808080" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Poppins;"><tspan id="SvgjsTspan1251">0k</tspan></text></g></g><g id="SvgjsG1147" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(184, 126, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
									<div class="resize-triggers"><div class="expand-trigger"><div style="width: 603px; height: 455px;"></div></div><div class="contract-trigger"></div></div></div>
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