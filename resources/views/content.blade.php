@extends('layouts.utama')
@section('content')

		<!-- Start .header-section -->
		<div class="header-section header-slider" id="header">
			<div class="single-hSlider hSlide-one" style="width: 100%;" data-vide-bg="poster: video/bg" data-vide-options="position: 50% 50%">
				<div class="overlay light">
					<div class="container">
						<div class="row">
							<div class="">
								<div class="header-texts">
									<h1 class="appear-from-left">News & Promo</h1>
									<h5 class="appear-from-right">Majesta Residence <br/>South Tangerang City, Banten, 15414 </h5>
								</div>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .overlay -->
			</div><!-- .header-section -->
		</div><!-- .header-section -->
	
			<!-- Start .gallery-section -->
				<div class="gallery-section" id="gallery">
					<div class="container">
						<div class="section-head">
							<div class="row text-center">
								<div class="col-md-12">
									<h2>News & <span>Promo</span></h2>
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .section-head -->
                        <div class="container" style="padding: px;">
                            <div class="row">
                                @foreach ($contents as $content)
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                            <a href="{{ route('content.show', ['id' => $content->id]) }}">
                                                @if ($content->image)
                                                    <img src="{{ asset('storage/' . $content->image) }}" class="card-img-top" alt="{{ $content->title }}">
                                                @endif
                                            </a>
                                            <div class="card-body">
                                                <a href="{{ route('content.show', ['id' => $content->id]) }}">
                                                    <h5 class="card-title">{{ $content->title }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                                    <!-- Kustomisasi Pagination -->
                                    <div class="pagination-container">
                                        <ul class="pagination">
                                            <li class="pagination-item {{ $contents->currentPage() == 1 ? 'disabled' : '' }}">
                                                <a href="{{ $contents->previousPageUrl() }}" class="pagination-link">Previous</a>
                                            </li>

                                            @for ($i = 1; $i <= $contents->lastPage(); $i++)
                                                <li class="pagination-item {{ $contents->currentPage() == $i ? 'active' : '' }}">
                                                    <a href="{{ $contents->url($i) }}" class="pagination-link">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <li class="pagination-item {{ $contents->currentPage() == $contents->lastPage() ? 'disabled' : '' }}">
                                                <a href="{{ $contents->nextPageUrl() }}" class="pagination-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
					</div><!-- .container -->
			</div><!-- .gallery-section -->
			


@endsection