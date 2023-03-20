@extends('layouts.frontoffice.base')

@section('title')  Accueil @endsection

@section('content')

<main>
	<!-- =======================Trending START -->
	<section class="py-2">
		<div class="container">
			<div class="row g-0">
				<div class="col-12 bg-primary bg-opacity-10 p-2 rounded">
					<div class="d-sm-flex align-items-center text-center text-sm-start">
						<!-- Title -->
						<div class="me-3">
							<span class="badge bg-primary p-2 px-3">Annonces</span>
						</div>
						<!-- Slider -->
						<div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
							<div class="tiny-slider-inner"
								data-autoplay="true"
								data-hoverpause="true"
								data-gutter="0"
								data-arrow="true"
								data-dots="false"
								data-items="1">
								<!-- Slider items -->
								<div> <a href="#" class="text-reset btn-link">The most common business debate isn't as black and white as you might think</a></div>
								<div> <a href="#" class="text-reset btn-link">How the 10 worst business fails of all time could have been prevented </a></div>
								<div> <a href="#" class="text-reset btn-link">The most common business debate isn't as black and white as you might think </a></div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- Row END -->
		</div>
	</section>
	<!-- =======================Trending END -->
	
	<!-- =======================Main hero START -->
	<br>
	<section class="py-0 card-grid">
		<div class="container">
			<div class="row">
				<!-- Slider START -->
				<div class="col-lg-9">
				<div class="mb-4">
						<h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>A LA UNE</h2>
						
					</div>
					<div class="tiny-slider arrow-hover arrow-blur arrow-round rounded-3">
						<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="1" data-arrow="true" data-dots="false" data-items="1">
							@foreach ($alaUne as $result )
								<!-- Slide 1 -->
								<div class="card card-overlay-bottom card-bg-scale h-400 h-lg-560 rounded-0" style="background-image:url(/storage/{{$result->ogImage}}); background-position: center left; background-size: cover;">
									<!-- Card Image overlay -->
									<div class="card-img-overlay d-flex flex-column p-3 p-sm-5"> 
										<!-- Card overlay Bottom  -->
										<div class="w-100 mt-auto">
											<div class="col">
												<!-- Card category -->
												<a href="/{{ $result->categorySlug }}" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $result->categoryName }}</a>
												<!-- Card title -->
												<h2 class="text-white "><a href="/{{ $result->slug }}" class="btn-link text-reset stretched-link fw-normal">{!! $result->title !!}</a></h2>
												
												
												<!-- Card info -->
												<ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
													<li class="nav-item">
														<div class="nav-link">
															<div class="d-flex align-items-center text-white position-relative">
																<span class="ms-3">par <a href="/{{ $result->authorName }}" class="stretched-link text-reset btn-link">{{ $result->authorName }}</a></span>
															</div>
														</div>
													</li>
													<li class="nav-item">{{ date('d/m/Y', strtotime($result->date_publish)) }}</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<!-- Slider END -->					
			</div> <!-- Row END -->
		</div>
	</section>
	<!-- =======================Main hero END -->

	
<!-- =======================Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
	
	<!-- =======================Main content START -->
	<section class="position-relative">
		<div class="container" data-sticky-container>
			<div class="row">
				<!-- Main Post START -->
				<div class="col-lg-9">
					<!-- Top highlights START -->
					<div class="mb-4">
						<h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>TOGO POLITIQUE</h2>
						<p>suivez nos actualités sur la politique togolaise</p>
					</div>
					<!-- Divider -->
					<div class="border-bottom border-primary border-2 opacity-1 my-4"></div>
					@for ($i=1; $i<= count($politique) - 1; $i++ )
						@if ($i == 13)
							<!-- Card video item START -->
							<div class="card mb-2 mb-sm-4">
								<div class="row g-3">
									<div class="col-md-6 order-sm-2">
										<div class="rounded-3 overflow-hidden">
											<div class="ratio ratio-16x9">
												<img  src="/storage/{{$politique[$i]['ogImage']}}" style="height: 310px; width: 560px ; object-fit: cover" alt="Card image">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="d-sm-flex justify-content-sm-between mb-2">
											<a href="/{{ $politique[$i]['categorySlug'] }}" class="badge text-bg-primary"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $politique[$i]['categoryName'] }}</a>
											
										</div>
										<h5><a href="/{{ $politique[$i]['slug'] }}" class="btn-link text-reset fw-bold">{!! $politique[$i]['title'] !!}</a></h5>
										<p>{!! \Illuminate\Support\Str::words( $politique[$i]['content'], 35, ' ...') !!}</p>
										<!-- Card info -->
										<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
											<li class="nav-item">
												<div class="nav-link">
													<div class="d-flex align-items-center position-relative">
														
														<span class="ms-3">par <a href="/{{ $politique[$i]['authorSlug'] }}" class="stretched-link text-reset btn-link">{{ $politique[$i]['authorName'] }}</a></span>
													</div>
												</div>
											</li>
											<li class="nav-item">{{ date('d/m/Y', strtotime($politique[$i]['date_publish'])) }}</li>
											<li class="nav-item"><a href="#" class="btn-link"><i class="far fa-comment-alt me-1"></i> {{ $politique[$i]['commentsCount'] }} </a></li>
										</ul>
									</div>
								</div>
							</div>
						@endif
					@endfor
					<!-- Divider -->
					<div class="border-bottom border-primary border-2 opacity-1 my-4"></div>
					<div class="tiny-slider arrow-blur arrow-round rounded-3">
						<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="24" data-arrow="true" data-dots="false" data-items-sm="1" data-items-xs="1" data-items="2">
							@for ($i=1; $i<= count($politique) - 1; $i++ )

								@if ($i <= 12)
									
								<div class="card">
								<!-- Card img -->
									<div class="position-relative">
										<img class="card-img" src="/storage/{{$politique[$i]['ogImage']}}" style="height: 350px; width: 450px ; object-fit: cover" alt="Card image">
										<div class="card-img-overlay d-flex align-items-start flex-column p-3">
											<!-- Card overlay Top -->
											
											<!-- Card overlay bottom -->
											<div class="w-100 mt-auto">
												<!-- Card category -->
												<a href="/{{ $politique[$i]['categorySlug'] }}" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $politique[$i]['categoryName'] }}</a>
											</div>
										</div>
									</div>
									<div class="card-body px-0 pt-3">
										<h5 class="card-title"><a href="/{{ $politique[$i]['slug'] }}" class="btn-link text-reset fw-bold">{!! $politique[$i]['title'] !!}</a></h5>
										<!-- Card info -->
										<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
											<li class="nav-item">
												<div class="nav-link">
													<div class="d-flex align-items-center position-relative">
														<span class="ms-3">par <a href="/{{ $politique[$i]['authorSlug'] }}" class="stretched-link text-reset btn-link">{{ $politique[$i]['authorName'] }}</a></span>
													</div>
												</div>
											</li>
											<li class="nav-item">{{ date('d/m/Y', strtotime($politique[$i]['date_publish'])) }}</li>
											<li class="nav-item"><a href="#" class="btn-link"><i class="far fa-comment-alt me-1"></i> {{ $politique[$i]['commentsCount'] }}</a></li>
										</ul>
									</div>
								</div>
									
								@endif

							@endfor
						</div>
					</div>
					
					
				</div>
				<div class="col-lg-3  mt-5 mt-lg-0">
				<!-- Sidebar START -->
			
					<div data-sticky data-margin-top="80" data-sticky-for="767">
					
						<!-- Social links -->
						<div class="row g-2">
							<h5>Suivez nous sur </h5>
							<a href="https://www.facebook.com/Togoactualite-148480121847124" target="_blank"class="d-flex justify-content-between align-items-center bg-facebook text-white-force rounded p-2 position-relative">
								<i class="fab fa-facebook-square fs-3"></i>
								<div class="d-flex">
									<h6 class="me-1 mb-0">1.5K</h6>
									<small class="small">abonnés</small>
								</div>
							</a>
							<a href="https://youtube.com" target="_blank" class="d-flex justify-content-between align-items-center bg-danger text-white-force rounded p-2 position-relative">
								<i class="fab fa-youtube-square fs-3"></i>
								<div class="d-flex">
									<h6 class="me-1 mb-0"> Youtube </h6>
									
								</div>
							</a>
							<a href="https://twitter.com/Togoactualite" target="_blank" class="d-flex justify-content-between align-items-center bg-twitter text-white-force rounded p-2 position-relative">
								<i class="fab fa-twitter-square fs-3"></i>
								<div class="d-flex">
									<h6 class="me-1 mb-0">1.8K</h6>
									<small class="small">Followers</small>
								</div>
							</a>
							<a href="https://wa.link/qf0v9s" target="_blank" class="d-flex justify-content-between align-items-center bg-success text-white-force rounded p-2 position-relative">
								<i class="fab fa-whatsapp  fs-3"></i>
								<div class="d-flex">
									<h6 class="me-1 mb-0"> Whatsapp  </h6>
									
								</div>
							</a>
							<a href="https://fr.linkedin.com/in/togoactualite-togo-actualit%C3%A9-3a076648" target="_blank" class="d-flex justify-content-between align-items-center bg-linkedin text-white-force rounded p-2 position-relative">
								<i class="fab fa-linkedin fa-fw me-2"></i>
								<div class="d-flex">
									<h6 class="me-1 mb-0">2k</h6>
									<small class="small">Membres</small>
								</div>
							</a>
							
						</div>
						<!-- Categories -->
						<div class="row g-2 mt-5">
							<h5>Voir nos Catégories</h5>

							@for ($i=1; $i<= count($categories) - 1; $i++ )
					
								@if ( $i == 10)

									<div class="d-flex justify-content-between align-items-center bg-success bg-opacity-15 rounded p-2 position-relative">
										<h6 class="m-0 text-light">{{$categories[$i]['name']}}</h6>
										<a href="/{{ $categories[$i]['slug'] }}" class="badge bg-success text-light stretched-link">{{$categories[$i]['count']}}</a>
									</div>
								
								@endif

								@if ( $i == 9)

									<div class="d-flex justify-content-between align-items-center bg-primary bg-opacity-15 rounded p-2 position-relative">
										<h6 class="m-0 text-primary">{{$categories[$i]['name']}}</h6>
										<a href="/{{ $categories[$i]['slug'] }}" class="badge bg-primary text-light stretched-link">{{$categories[$i]['count']}}</a>
									</div>
								
								@endif

								@if ( $i == 19)

									<div class="d-flex justify-content-between align-items-center bg-linkedin bg-opacity-15 rounded p-2 position-relative">
										<h6 class="m-0 text-light">{{$categories[$i]['name']}}</h6>
										<a href="/{{ $categories[$i]['slug'] }}" class="badge bg-linkedin text-light stretched-link">{{$categories[$i]['count']}}</a>
									</div>
								
								@endif

								@if ( $i == 20)

									<div class="d-flex justify-content-between align-items-center bg-danger bg-opacity-15 rounded p-2 position-relative">
										<h6 class="m-0 text-danger">{{$categories[$i]['name']}}</h6>
										<a href="/{{ $categories[$i]['slug'] }}" class="badge bg-danger text-light stretched-link">{{$categories[$i]['count']}}</a>
									</div>
								
								@endif

								@if ( $i == 23)

									<div class="d-flex justify-content-between align-items-center bg-twitter bg-opacity-15 rounded p-2 position-relative">
										<h6 class="m-0 text-light">{{$categories[$i]['name']}}</h6>
										<a href="/{{ $categories[$i]['slug'] }}" class="badge bg-twitter text-light stretched-link">{{$categories[$i]['count']}}</a>
									</div>
								
								@endif

								@if ( $i == 27)

									<div class="d-flex justify-content-between align-items-center bg-facebook bg-opacity-15 rounded p-2 position-relative">
										<h6 class="m-0 text-light">{{$categories[$i]['name']}}</h6>
										<a href="/{{ $categories[$i]['slug'] }}" class="badge bg-facebook text-light stretched-link">{{$categories[$i]['count']}}</a>
									</div>
								
								@endif
								
							@endfor
							
							
						</div>
						
					</div>
				<!-- Sidebar END -->
				</div>
			</div>
		</div>
	</section>

	
<!-- =======================
Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
	
	<div id="acceuil"></div>
	
<!-- =======================
Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
	<section class="position-relative">
		<div class="container" data-sticky-container>
			<div class="row">
				<!-- Main Post START -->
				<div class="col-lg-12">
					<!-- Top highlights START -->
					<div class="mb-4">
						<h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>INTERNATIONAL</h2>
						<p>suivez nos actualités sur l'international</p>
					</div>
					<!-- Divider -->
					<div class="border-bottom border-primary border-2 opacity-1 my-4"></div>
					<div class="tiny-slider arrow-blur arrow-round rounded-3">
						<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="24" data-arrow="true" data-dots="false" data-items-sm="1" data-items-xs="1" data-items="3">
							@for ($i=1; $i<= count($international) - 1; $i++ )

								
									
								<div class="card">
								<!-- Card img -->
									<div class="position-relative">
										<img class="card-img" src="/storage/{{$international[$i]['ogImage']}}" style="height: 350px; width: 450px ; object-fit: cover" alt="Card image">
										<div class="card-img-overlay d-flex align-items-start flex-column p-3">
											<!-- Card overlay Top -->
											
											<!-- Card overlay bottom -->
											<div class="w-100 mt-auto">
												<!-- Card category -->
												<a href="/{{ $international[$i]['categorySlug'] }}" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $international[$i]['categoryName'] }}</a>
											</div>
										</div>
									</div>
									<div class="card-body px-0 pt-3">
										<h5 class="card-title"><a href="/{{ $international[$i]['slug'] }}" class="btn-link text-reset fw-bold">{!! $international[$i]['title'] !!}</a></h5>
										<p>{!! \Illuminate\Support\Str::words($international[$i]['content'], 30, ' ...') !!}</p>
										<!-- Card info -->
										<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
											<li class="nav-item">
												<div class="nav-link">
													<div class="d-flex align-items-center position-relative">
														<span class="ms-3">par <a href="/{{ $international[$i]['authorSlug'] }}" class="stretched-link text-reset btn-link">{{ $international[$i]['authorName'] }}</a></span>
													</div>
												</div>
											</li>
											<li class="nav-item">{{ date('d/m/Y', strtotime($international[$i]['date_publish'])) }}</li>
											<li class="nav-item"><a href="#" class="btn-link"><i class="far fa-comment-alt me-1"></i> {{ $international[$i]['commentsCount'] }}</a></li>
										</ul>
									</div>
								</div>
									
								
							@endfor
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
<!-- =======================
Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
	<section class="py-0 card-grid">
		<div class="container">
			<div class="row">
				<!-- Slider START -->
				<div class="col-lg-12">
				<div class="mb-4">
						<h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>A ne pas manquer TOGO</h2>
						<p>Ne manquez pas à nos actualités togolaises</p>
					</div>
					<!-- Divider -->
					<div class="border-bottom border-primary border-2 opacity-1 my-4"></div>
					<div class="tiny-slider arrow-hover arrow-blur arrow-round rounded-3">
						<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="1" data-arrow="true" data-dots="false" data-items="1">
							@foreach ($aNePasManquer as $result )
								<!-- Slide 1 -->
								<div class="card card-overlay-bottom card-bg-scale h-400 h-lg-560 rounded-0" style="background-image:url(/storage/{{$result->ogImage}}); background-position: center left; background-size: cover;">
									<!-- Card Image overlay -->
									<div class="card-img-overlay d-flex flex-column p-3 p-sm-5"> 
										<!-- Card overlay Bottom  -->
										<div class="w-100 mt-auto">
											<div class="col">
												<!-- Card category -->
												<a href="/{{ $result->categorySlug }}" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $result->categoryName }}</a>
												<!-- Card title -->
												<h2 class="text-white "><a href="/{{ $result->slug }}" class="btn-link text-reset stretched-link fw-normal">{!! $result->title !!}</a></h2>
												<div class="text-white" style="color: #fff">
													{!! \Illuminate\Support\Str::words($result->content, 40, ' ...') !!}
												</div>

												<!-- Card info -->
												<ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
													<li class="nav-item">
														<div class="nav-link">
															<div class="d-flex align-items-center text-white position-relative">
																<span class="ms-3">par <a href="/{{ $result->authorName }}" class="stretched-link text-reset btn-link">{{ $result->authorName }}</a></span>
															</div>
														</div>
													</li>
													<li class="nav-item">{{ date('d/m/Y', strtotime($result->date_publish)) }}</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<!-- Slider END -->					
			</div> <!-- Row END -->
		</div>
	</section>
	
<!-- =======================
Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
	<div id="allActualite" ></div>

<!-- =======================
Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
<br>
</main>
@endsection