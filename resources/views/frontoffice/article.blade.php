@extends('layouts.frontoffice.base')
@section('title') {!! $article->title !!} @endsection
@section('content')
    
<main>
	

<!-- =======================
Main hero START -->
<section class="pt-0 mt-5 card-grid">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <div class="tiny-slider arrow-hover arrow-blur arrow-white arrow-round rounded-3 overflow-hidden">
					<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="0" data-arrow="true" data-dots="false" data-items="1">
                        @foreach ($files as $file )
                            <div class="card card-overlay-bottom card-bg-scale h-400 h-sm-500 h-md-600 rounded-0" style="background-image:url(/storage/{{$file->picture_link}}); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
			<div class="col-12">
                @foreach ($categoriesH as $category)
                    <a href="/{{ $category->slug }}" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i> {{ $category->name }} </a>
                @endforeach
				<h1> {!! $article->title !!} </h1>
			</div>
		</div>
    </div>
</section>

<!-- =======================Adv START -->

<!-- =======================
Adv END -->



<!-- =======================
Main START -->
<section class="pt-0">
	<div class="container position-relative" data-sticky-container>
		<div class="row">
			<!-- Left sidebar START -->
			<div class="col-lg-3">
				<div class="text-start text-lg-center mb-5" data-sticky data-margin-top="80" data-sticky-for="991">
					<!-- Author info -->
					<div class="position-relative">
						<div class="avatar avatar-xl">
                            <i class="fa fa-5x fa-user-circle"></i>
						</div>
						<a href="/auteurs/{{ $article->authorSlug }}" class="h5 stretched-link mt-2 mb-0 d-block"> {{$article->authorName}} </a>
					</div>
                    <hr class="d-none d-lg-block">
					<!-- Card info -->
					<ul class="list-inline list-unstyled">
						<li class="list-inline-item d-lg-block my-lg-2">{{ date('d/m/Y', strtotime($article->date_publish)) }}</li>
						
						<li class="list-inline-item d-lg-block my-lg-2"><a href="#" class="text-body"><i class="far fa-heart me-1"></i></a> {{ $article->likesCount }}</li>
						<li class="list-inline-item d-lg-block my-lg-2"><i class="far fa-eye me-1"></i> {{ $article->viewsCount}} </li>
					</ul>

                    <!-- Tags -->
					<ul class="list-inline text-primary-hover mt-0 mt-lg-3">
                        @if ($tagsCount !== 0)
                            @foreach ($tags as $tag )
                                <li class="list-inline-item">
                                    <a class="text-body" href="/tags/{{ $tag->slug }}">#{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        @endif
					</ul>

                    <h4>Partagez cet article</h4>
                    <ul class="nav text-white-force">
                        <li class="nav-item">
                            <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-facebook" href="#">
                                <i class="fab fa-facebook-square align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-twitter" href="#">
                                <i class="fab fa-twitter-square align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-linkedin" href="#">
                                <i class="fab fa-linkedin align-middle"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-md rounded-circle me-2 mb-2 p-0 fs-5 bg-success" href="#">
                                <i class="fab fa-whatsapp align-middle"></i>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mb-5">
				<!-- =======================Adv START -->

                <p> {!! $article->content !!} </p>
				
				<!-- =======================
				Adv END -->
                @if ($previous && $next)
                    <div class="row g-0">
                        <div class="col-sm-6 bg-primary bg-opacity-10 p-4 position-relative border-end border-1 rounded-start">
                            <span><i class="bi bi-arrow-left me-3 rtl-flip"></i>Article Précedent</span>
                            <h6 class="m-0"><a href="/{{ $previous->slug}}" class="stretched-link btn-link text-reset"> {!! $previous->title !!} </a></h6>
                        </div>
                        <div class="col-sm-6 bg-primary bg-opacity-10 p-4 position-relative text-sm-end rounded-end">
                            <span><i class="bi bi-arrow-right ms-3 rtl-flip"></i>Article Suivant</span>
                            <h6 class="m-0"><a href="/{{ $next->slug}}" class="stretched-link btn-link text-reset">{!! $next->title !!}</a></h6>
                        </div>
                    </div>
                    <!-- Related post START -->
                @endif
				<div class="mt-5">
					<h2 class="my-3"><i class="bi bi-symmetry-vertical me-2"></i>A lire aussi</h2>
					<div class="tiny-slider arrow-hover arrow-blur arrow-white arrow-round">
						<div class="tiny-slider-inner"
							data-autoplay="true"
							data-hoverpause="true"
							data-gutter="24"
							data-arrow="true"
							data-dots="false"
							data-items-xl="3" 
							data-items-xs="1">

                            @foreach ($similars as $similar )
                                <!-- Card item START -->
							<div class="card">
								<!-- Card img -->
								<div class="position-relative">
									<img class="card-img" src="/storage/{{$similar->ogImage}}" alt="Card image" style="height: 220px; object-fit: cover">
									<div class="card-img-overlay d-flex align-items-start flex-column p-3">
										
										<!-- Card overlay bottom -->
										<div class="w-100 mt-auto">
											<a href="/categories/{{ $similar->categorySlug }}" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $similar->categoryName }}</a>
										</div>
									</div>
								</div>
								<div class="card-body px-0 pt-3">
									<h6 class="card-title"><a href="/{{ $similar->slug }}" class="btn-link text-reset stretched-link fw-bold"> {!! $similar->title !!} </a></h6>
									<!-- Card info -->
									<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
										
										<li class="nav-item">{{ date('d/m/Y', strtotime($similar->date_publish)) }}</li>
									</ul>
								</div>
							</div>
							
                            @endforeach
							
						</div>
					</div> <!-- Slider END -->
				</div>
				<!-- Related post END -->
				
				<!-- =======================
				Adv END -->
				<!-- Divider -->
				<hr>
                <br>
                <div>
					<h3>Ajouter un commentaire</h3>
					
                    <form class="row g-3 mt-2">
					  <div class="col-md-6">
					    <label class="form-label">Nom & prénoms</label>
					    <input type="text" class="form-control" aria-label="First name">
					  </div>
					  <div class="col-md-6">
					    <label class="form-label">Email *</label>
					    <input type="email" class="form-control">
					  </div>
					  <!-- custom checkbox -->
						<div class="col-md-12">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							  <label class="form-check-label" for="flexCheckDefault">Enregister mon nom et prénoms dans le navigateur pour la prochaine fois </label>
							</div>
						</div>
					  <div class="col-12">
					    <label class="form-label">Votre commentaire *</label>
					  	<textarea class="form-control" rows="3"></textarea>
					  </div>
					  <div class="col-12">
					    <button type="submit" class="btn btn-primary">Envoyer votre commentaire</button>
					  </div>
					</form>
							
				</div>
                
            </div>
        </div>
    </div>
</section>


@endsection