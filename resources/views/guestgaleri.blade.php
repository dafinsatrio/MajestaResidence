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
									<h1 class="appear-from-left">Photo Gallery</h1>
									<h5 class="appear-from-right">Majesta Residence <br/>South Tangerang City, Banten, 15414 </h5>
								</div>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .overlay -->
			</div><!-- .header-section -->
		</div><!-- .header-section -->
	
			<!-- Start .gallery-section -->
				<div class="gallery-section alt-bg" id="gallery">
					<div class="container">
						<div class="section-head">
							<div class="row text-center">
								<div class="col-md-12">
									<h2>Photo <span>Gallery</span></h2>
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .section-head -->
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
								<li data-target="#myCarousel" data-slide-to="3"></li>
								<li data-target="#myCarousel" data-slide-to="4"></li>
								<li data-target="#myCarousel" data-slide-to="5"></li>
							  </ol>
						  
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" >
								<div class="item active">
									<a href="images/gallery/dummypic3.webp" data-effect="mfp-3d-unfold" class="large-view">
										<img src="images/gallery/dummypic3.webp" class="img-responsive" alt="Gallery"/>
									</a>
								</div>
						  
								<div class="item">
									<a href="images/gallery/dummypic5.webp" data-effect="mfp-3d-unfold" class="large-view">
										<img src="images/gallery/dummypic5.webp" class="img-responsive" alt="Gallery" />
									</a>
								</div>
							  
								<div class="item">
									<a href="images/gallery/dummypic4.webp" data-effect="mfp-3d-unfold" class="large-view">
										<img src="images/gallery/dummypic4.webp" class="img-responsive" alt="Gallery" />
									</a>
								</div>
		
								<div class="item">
									<a href="images/gallery/dummypic6.webp" data-effect="mfp-3d-unfold" class="large-view">
										<img src="images/gallery/dummypic6.webp" class="img-responsive" alt="Gallery" />
									</a>
								</div>
		
								<div class="item">
									<a href="images/gallery/dummypic1.webp" data-effect="mfp-3d-unfold" class="large-view">
										<img src="images/gallery/dummypic1.webp" class="img-responsive" alt="Gallery" />
									</a>
								</div>
								  
								<div class="item">
									<a href="images/gallery/dummypic2.webp" data-effect="mfp-3d-unfold" class="large-view">
										<img src="images/gallery/dummypic2.webp" class="img-responsive" alt="Gallery" />
									</a>
								</div>						  
							  </div>
						
							  <!-- Left and right controls -->
							  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#myCarousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							  </a>
							</div>
					</div><!-- .container -->
			</div><!-- .gallery-section -->

@endsection