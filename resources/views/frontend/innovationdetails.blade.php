@extends('frontend.main')
@section('content')
<!-- Content Wrapper Start -->
<div class="content-wrapper">

	<!-- Breadcrumb Start -->
	<div class="breadcrumb-wrap" style="background-color: darkgreen;">
		<div class="container">
			<div class="breadcrumb-title">
				<h2>Innovation</h2>
				<ul class="breadcrumb-menu list-style">
					<li><a href="{{url('/')}}">Home </a></li>
					<li><a href="{{url('innovations')}}">Innovation</a></li>

				</ul>
			</div>
		</div>
	</div>
	<!-- Breadcrumb End -->
	<br>

	<a class="btn btn-success" href="{{url('innovations')}}" role="button" style="float: right;">Back</a> &nbsp;

	<!-- Event Details section Start -->
	<section class="event-details-wrap ptb-100">
		<div class="container">
			<div class="row gx-5">
				<div class="col-xl-12">

					<div class="event-desc">



						<h2>{{$model->inno_name}}</h2>

						<table class="table">
							<thead>
								<tr>
									<td>

									</td>
									<td>

									</td>
								</tr>

							</thead>
							<tbody>
								<tr>
									<td>
										<b>Innovation Type:</b> 
									</td>
									<td>
										{{$model->innovation_type}}
									</td>
								</tr>
								<tr>
									<td>
										<b>Value Chain:</b> 
									</td>
									<td>
										{{($model->valuechain)?$model->valuechain->value_name:null}}
									</td>
								</tr>
								<tr>
									<td>
										<b>Node:</b> 
									</td>
									<td>
										{{($model->node)?$model->node->node_name:'Not Set'}}
									</td>
								</tr>
								<tr>
									<td>
										<b>VCO Name:</b> 
									</td>
									<td>
										{{$model->vco_name}}
									</td>
								</tr>
								<tr>
									<td>
										<b>County:</b>
									</td>
									<td>
										{{$model->county->county_name}}
									</td>
								</tr>
								<tr>
									<td>
										<b>Innovation Status:</b> 
									</td>
									<td>
										{{$model->innovation_status}}
									</td>
								</tr>
								<tr>
									<td>
										<b>Summary of the <a href="#"  title="This is the description of the VCO">VCO:</a></b>
									</td>
									<td>
										{!!$model->inno_description!!}.</p>

									</td>
								</tr>
								<tr>
									<td>
										<b>Contact Person:</b>
									</td>
									<td>
										{{$model->inno_contactname}}
									</td>
								</tr>

								<tr>
									<td>
										<b>location:</b>
									</td>
									<td>
										{{$model->inno_subcounty}}>
										{{$model->inno_ward}}
									</td>
								</tr>
								<tr>
									<td>
										<b>Number of direct beneficiaries:</b>
									</td>
									<td>
										<ul>
											<li>Total - {{$model->inno_male_adultvca+$model->inno_female_adultvca+$model->inno_youth_malevca+$model->inno_youth_femalevca}}</li>
											<li>Adults Male - {{$model->inno_male_adultvca}}</li>
											<li>Adult Female - {{$model->inno_female_adultvca}}</li>
											<li>Youth Male - {{$model->inno_youth_malevca}}</li>
											<li>Youth Female - {{$model->inno_youth_femalevca}}</li>

										</ul>
									</td>
								</tr>








								<tr>
									<td>
										<b>Picture of the Innovation:</b>
									</td>
									<td>
										<div class="row">
											<div class="col-md-12">
												<div class="w3-content" style="max-width:565px">
													<img class="mySlides" src="{{asset('uploads/'.$model->inno_cover_image)}}" style="border-radius: 15px;" >
													<img class="{{asset('uploads/'.$model->inno_cover_image)}}" style="border-radius: 15px;">
													<img class="{{asset('uploads/'.$model->inno_cover_image)}}" style="border-radius: 15px;">
												</div>

												<div class="w3-center">
													<div class="w3-section">
														<button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
														<button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
													</div>
													<button class="w3-button demo" onclick="currentDiv(1)">1</button> 
													<button class="w3-button demo" onclick="currentDiv(2)">2</button> 
													<button class="w3-button demo" onclick="currentDiv(3)">3</button> 
												</div>

												<script>
													var slideIndex = 1;
													showDivs(slideIndex);

													function plusDivs(n) {
														showDivs(slideIndex += n);
													}

													function currentDiv(n) {
														showDivs(slideIndex = n);
													}

													function showDivs(n) {
														var i;
														var x = document.getElementsByClassName("mySlides");
														var dots = document.getElementsByClassName("demo");
														if (n > x.length) {slideIndex = 1}    
															if (n < 1) {slideIndex = x.length}
																for (i = 0; i < x.length; i++) {
																	x[i].style.display = "none";  
																}
																for (i = 0; i < dots.length; i++) {
																	dots[i].className = dots[i].className.replace(" w3-red", "");
																}
																x[slideIndex-1].style.display = "block";  
																dots[slideIndex-1].className += " w3-red";
															}
														</script>

													</div>

												</div>
											</td>
										</tr>
										




										<tr>
											<td>
												<b>Results and Impacts:</b>
											</td>
											<td>
												{!!$model->inno_lesson_challenges!!}
											</td>
										</tr>
										<tr>
											<td>
												<b>Source:</b>
											</td>
											<td>
												<p>{{$model->inno_sources}}</p>
											</td>
										</tr>


									</tbody>
									<tfoot>


									</tfoot>


								</table>


							</div>
							<div class="post-meta-option mt-30 mb-0">
								<div class="row gx-0 align-items-center">
									<div class="col-md-5 col-12">
										<div class="post-share w-100">
											<span>Share:</span>
											<ul class="social-profile list-style style3">
												<li>
													<a href="https://facebook.com">
														<i class="ri-facebook-fill"></i>
													</a>
												</li>
												<li>
													<a href="https://twitter.com">
														<i class="ri-twitter-fill"></i>
													</a>
												</li>
												<li>
													<a href="https://linkedin.com">
														<i class="ri-linkedin-fill"></i>
													</a>
												</li>
												<li>
													<a href="https://pinterest.com">
														<i class="ri-pinterest-line"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-md-7 col-12 text-md-end">
										<div class="post-tag">
											<span>Tags:</span>
											<ul class="tag-list list-style">
												<li><a href="posts-by-tag.html">Climate Smart Agriculture</a></li>
												<li><a href="posts-by-tag.html">Going Green</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- Event Details section End -->

		</div>


		@stop