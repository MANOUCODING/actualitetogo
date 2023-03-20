@extends('layouts.frontoffice.base')

@section('title') Nous Contactez  @endsection

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
        <section>
            <div class="container">
                <div class="row">
                <div class="col-md-9 mx-auto text-center">
                <h1 class="display-4">Nous Contactez</h1>
                <!-- breadcrumb -->
                <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-dots mb-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bi bi-house me-1"></i> Accueil</a></li>
                    <li class="breadcrumb-item active">Nous Ecrire</li>
                    </ol>
                </nav>
                </div>
            </div>
            </div>
        </section>
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
        <section class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                    <!-- <iframe class="w-100 h-300 grayscale" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>	 -->
                        <div class="row mt-5">
                            <div class="col-sm-12 mb-5 mb-sm-0">
                            <h3>TOGO ACTUALITÉ</h3>
                            <p>Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.</p>
                            <address>Lorem Ipsum, 40C, Lorem Ipsum dummy, Lorem Ipsum, Ch 98054</address>
                            <p>Téléphone: <a href="tel:+330614305786" class="text-reset"><u>+33 06 14 30 57 86</u></a> , <a href="tel:+22899565788" class="text-reset"><u>+228 99 56 57 88</u></a></p>
                            <p>Email: <a href="mailto:contact@togoactualite.com" class="text-reset"><u>contact@togoactualite.com</u></a></p>
                            <p>Heures de services:
                                Lundi à Vendredi de  9:30am à 6:30 pm
                                <br>
                            </p>
                            </div>
                        </div>
                        
                        <hr class="my-5">

                        <div id="contact"></div>
                    </div>
                </div>
               
            </div>
        </section>
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
    </main>

@endsection