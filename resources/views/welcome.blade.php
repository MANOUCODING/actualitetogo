@extends('layouts.base')
@section('title')  Togo Actualités @endsection
@section('content')
<main>
    <section class="py-2">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-12 bg-primary bg-opacity-10 p-2 rounded">
                    <div class="d-sm-flex align-items-center text-center text-sm-start">
                        <!-- Title -->
                        <div class="me-3">
                            <span class="badge bg-primary p-2 px-3">Annonces:</span>
                        </div>
                        <!-- Slider -->
                        <div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
                            <div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="0" data-arrow="true" data-dots="false" data-items="1">
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
		<br>
        <div class="container-fluid">
		<div class="row ">
			<div class="col-lg-7">
				<!-- Title -->
				<div class="">
					<h2 class=""><i class="bi bi-bookmark-star me-2"></i>A la une</h2>
					
				</div>
				<br>
				<div class="tiny-slider arrow-hover arrow-blur arrow-white arrow-round rounded-3 overflow-hidden">
					<div class="tiny-slider-inner"
						data-autoplay="true"
						data-hoverpause="true"
						data-gutter="1"
						data-arrow="true"
						data-dots="false"
						data-items="1">
						<!-- Slide 1 -->
						@foreach ($alaUne as $info )
						<div class="card card-overlay-bottom card-bg-scale h-400 h-lg-560" style="background-image:url(/storage/{{$info->ogImage}}); background-position: center left; background-size: cover;">
							<!-- Card Image overlay -->
							<div class="card-img-overlay d-flex align-items-center p-3 p-sm-5"> 
								<!-- Card overlay Top -->
								
								<!-- Card overlay Bottom  -->
								<div class="w-100 mt-auto">
									<div class="col">
										<!-- Card category -->
										<a href="/{{$info->categorySlug}}" class="badge text-bg-primary "><i class="fas fa-circle me-2 small fw-bold"></i>{{ $info->categoryName }}</a>
										<!-- Card title -->
										<h4 class="text-white "><a href="/{{ $info->slug }}" class="btn-link text-reset stretched-link fw-normal">{!! $info->title !!}</a></h4>
										<!-- Card info -->
										<ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
											<li class="nav-item">
												<div class="nav-link">
													<div class="d-flex align-items-center text-white position-relative">
														<i class="fa fa-2x fa-user-circle" ></i>
														<span class="ms-3"> &nbsp; par <a href="/auteurs/{{$info->authorSlug}}" class="stretched-link text-reset btn-link"> {{ $info->authorName }} </a></span>
													</div>
												</div>
											</li>
											<li class="nav-item">{{ date('d/m/Y', strtotime($info->date_publish)) }}</li>
											<li class="nav-item"> {{ $info->commentsCount}} commentaires </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
						
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<br>
				<!-- Title -->
				<div class="mb-0">
					<h2 class="m-0">TOGO POLITIQUE</h2>
					<div class="border-bottom border-primary border-2 opacity-1"></div>
				</div>
				<br>
				@foreach ($politique as $result )
					<div class="card mb-2 mb-md-4">
						<div class="row g-3">
							<div class="col-4">
								<img class="rounded-3" src="/storage/{{$result->ogImage}}" alt="">
							</div>
							<div class="col-8">
								<h6><a href="/{{ $result->slug }}" class="btn-link stretched-link text-reset fw-bold"> {!! $result->title !!} </a></h6>
								<!-- Card info -->
								<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
									<li class="nav-item">
										<div class="nav-link">
											<div class="d-flex align-items-center position-relative">
												<span class="ms-3">par <a href="/auteurs/{{$result->authorSlug}}" class="stretched-link text-reset btn-link">{{$result->authorName}}</a></span>
											</div>
										</div>
									</li>
									<li class="nav-item">{{ date('d/m/Y', strtotime($result->date_publish)) }}</li>
								</ul>
							</div>
						</div>
					</div>
				@endforeach		
			</div>
        </div>
    </section>
	<br>
	<section class="p-0">
		<div class="container">
			<div class="row">
				<div class="col">
					<a href="#" class="d-block card-img-flash">
						<img src="/assets/frontend/images/adv-3.png" alt="">
					</a>
					<small class="text-end d-block mt-1">Advertisement</small>
				</div>
			</div>
		</div>
	</section>
	<section class="position-relative">
		<div class="container" data-sticky-container>
			<div class="row">
				<!-- Main Post START -->
				<div class="col-lg-12">
					<!-- Top highlights START -->
					<div class="mb-4">
						<h2 class="m-0">International</h2>
						<p>Suivez nos actualités à l'international, sur le monde et sur l'afrique</p>
					</div>
					<div class="tiny-slider arrow-blur arrow-round rounded-3">
						<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="24" data-arrow="true" data-dots="false" data-items-sm="1" data-items-xs="1" data-items="3">
							@foreach ($international as $result )
								<!-- Card item START -->
								<div class="card">
									<!-- Card img -->
									<div class="position-relative">
										<img class="card-img" src="/storage/{{$result->ogImage}}" style="height: 350px; width: 350px ; object-fit: cover" alt="Card image">
										<div class="card-img-overlay d-flex align-items-start flex-column p-3">
											
											<!-- Card overlay bottom -->
											<div class="w-100 mt-auto">
												<!-- Card category -->
												<a href="/categories/{{$result->categorySlug}}" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{$result->categoryName}}</a>
											</div>
										</div>
									</div>
									<div class="card-body px-0 pt-3">
										<h6 class="card-title"><a href="/{{ $result->slug }}" class="btn-link text-reset fw-bold"> {!! $result->title !!} </a></h6>
										<!-- Card info -->
										<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
											<li class="nav-item">
												<div class="nav-link">
													<div class="d-flex align-items-center position-relative">
													<i class="fa fa-2x fa-user-circle" ></i>
														<span class="ms-3">par <a href="/auteurs/{{$result->authorSlug}}" class="stretched-link text-reset btn-link">{{$result->authorName}}</a></span>
													</div>
												</div>
											</li>
											<li class="nav-item">{{ date('d/m/Y', strtotime($info->date_publish)) }}</li>
										</ul>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</section>

	<section class="p-0">
		<div class="container">
			<div class="row">
				<div class="col">
					<a href="#" class="d-block card-img-flash">
						<img src="/assets/frontend/images/adv-3.png" alt="">
					</a>
					<small class="text-end d-block mt-1">Advertisement</small>
				</div>
			</div>
		</div>
	</section>

	<div id="acceuil">

	</div>

	<section class="p-0">
		<div class="container">
			<div class="row">
				<div class="col">
					<a href="#" class="d-block card-img-flash">
						<img src="/assets/frontend/images/adv-3.png" alt="">
					</a>
					<small class="text-end d-block mt-1">Advertisement</small>
				</div>
			</div>
		</div>
	</section>

	<section class="position-relative">
		<div class="container" data-sticky-container>
			<div class="row">
				<!-- Main Post START -->
				<div class="col-lg-12">
					<!-- Top highlights START -->
					<div class="mb-4">
						<h2 class="m-0">A ne pas manquer TOGO</h2>
						<p>Nos actualités togolaises a ne pas manquer</p>
					</div>
					<div id="aNePasManquer"></div>	
				</div>
					
			</div>
		</div>
	</section>

	<section class="p-0">
		<div class="container">
			<div class="row">
				<div class="col">
					<a href="#" class="d-block card-img-flash">
						<img src="/assets/frontend/images/adv-3.png" alt="">
					</a>
					<small class="text-end d-block mt-1">Advertisement</small>
				</div>
			</div>
		</div>
	</section>

	<div id="allActualite"></div>

<!-- =======================
Highlights END -->
</main>

@endsection