@extends('layouts.guestt')
@section('content')

<!-- Start .header-section -->
<div class="header-section header-slider" id="header">
			<div class="single-hSlider hSlide-one" style="width: 100%;" data-vide-bg="poster: video/bg" data-vide-options="position: 50% 50%">
				<div class="overlay light">
					<div class="container">
						<div class="row">
							<div class="">
								<div class="header-texts">
									<h1 class="appear-from-left">Majesta Residence</h1>
									<h5 class="appear-from-right">South Tangerang City, Banten, 15414 </h5>
								</div>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .overlay -->
			</div><!-- .header-section -->
		</div><!-- .header-section -->
		
				<!-- Start .about-section -->
		<div class="about-section alt-bg" id="about" >
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="about-text">
							<h2>About</h2>
							<br/>
							<h3><span>Majesta Residence</span</h3>
							<br/>
							<Ul>
							<h5 style="color: black; "><i class="icofont icofont-hand-drawn-right"></i>
								Lokasi rumah yang strategis menyumbang pola hidup yang efisien.
							</h5>
							<h5 style="color: black; "><i class="icofont icofont-hand-drawn-right"></i>
								Lokasi rumah yang strategis memberikan kenyamanan dan kemudahan dalam aktifitas keseharian.
							</h5>
							</Ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="video-border">
							<iframe  src="https://www.youtube.com/embed/ejRCwqY8B_Q">
							</iframe>
							<h6>Play Now</h6>
						</div>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .about-section -->
					
		<!-- Start .places-section -->
		<div class="places-section" id="location">
			<div class="container">
				<div class="section-head">
					<div class="row text-center">
						<div class="col-md-12">
							<h2>Nearby <span>Places</span></h2>
						</div><!-- .col -->	
					</div><!-- .row -->
				</div><!-- .section-head -->
				<div class="row text-center">
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-building-alt"></i>
							<h6>Places</h6>
							<p>Dekat Kawasan Bintaro  Serpong</p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-train-line"></i>
							<h6>Train Station</h6>
							<p>350m Ke Stasiun Sudimara</p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-bus-alt-1"></i>
							<h6>Public Transport</h6>
							<p>Angkutan Umum Selama 24 Jam </p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-social-shopify"></i>
							<h6>Shopping Center</h6>
							<p>8 Menit Ke Bintaro Trade Centre</p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-cart"></i>
							<h6>Shopping Mall</h6>
							<p>10 Menit Ke Mall Bintaro Xchange </p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-fruits"></i>
							<h6>Traditional Market</h6>
							<p>Dekat Dengan Pasar Tradisional</p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-road"></i>
							<h6>Highway</h6>
							<p>10 Menit Ke Pintu Toll Pd Aren</p>
						</div>
					</div><!-- .col -->
					<div class="col-md-3 col-sm-6">
						<div class="single-place">
							<i class="icofont icofont-car"></i>
							<h6>Gas Station</h6>
							<p>Dekat Dengan Pom Bensin</p>
						</div>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .places-section -->

@endsection