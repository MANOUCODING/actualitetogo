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
        <div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div>
					<br>
					<h3 class="m-0"><i class="bi bi-newspaper me-2"></i>Actualités à la Une</h3>
				</div>
				<div class="border-bottom border-primary border-2 opacity-1"></div>
				<br/>
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
						<div class="card card-overlay-bottom card-bg-scale h-400 h-lg-560 rounded-0" style="background-image:url(/storage/{{$info->ogImage}}); background-position: center left; background-size: cover;">
							<!-- Card Image overlay -->
							<div class="card-img-overlay d-flex flex-column p-3 p-sm-5"> 
								<!-- Card overlay Top -->
								
								<!-- Card overlay Bottom  -->
								<div class="w-100 mt-auto">
									<div class="col">
										<!-- Card category -->
										<!-- <a href="#" class="badge text-bg-primary mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $info->categoryName }}</a> -->
										<!-- Card title -->
										<h4 class="text-white "><a href="/{{ $info->slug }}" class="btn-link text-reset stretched-link fw-normal">{!! $info->title !!}</a></h4>
										<!-- Card info -->
										<ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
											<li class="nav-item">
												<div class="nav-link">
													<div class="d-flex align-items-center text-white position-relative">
														
														<span class="ms-3">par <a href="/auteurs/{{$info->authorSlug}}" class="stretched-link text-reset btn-link"> {{ $info->authorName }} </a></span>
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
			<div class="col-lg-4">
				<div>
					<br>
					<h3 class="m-0"> <img src="/assets/frontend/images/togoactu.png" alt="" srcset=""> TOGO POLITIQUE</h3>
				</div>
				<div class="border-bottom border-primary border-2 opacity-1"></div>
				<br/>
			</div>
        </div>
    </section>

</main>

@endsection