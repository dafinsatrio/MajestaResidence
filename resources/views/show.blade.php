@extends('layouts.utama')
@section('content')
	
			<!-- Start .gallery-section -->
				<div class="gallery-section" id="gallery">
					<div class="container">
						<div class="section-head">
							<div class="row text-center">
								<div class="col-md-12">
									<h2><span>{{ $content->title }}</span></h2>
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .section-head -->
                        <div class="row">
                        <div class="col-md-4 offset-md-2">
							@if ($content->image)
								<img src="{{ asset('storage/' . $content->image) }}" alt="Content Image">
							@endif
						</div>
						<div class="captionn">
							<p>{{ $content->description }}</p>
						</div>
                    </div>
					</div><!-- .container -->
			</div><!-- .gallery-section -->
			
@endsection