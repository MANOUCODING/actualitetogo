@extends('layouts.frontoffice.base')
@section('title') Qui sommes-nous ? @endsection
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
  <!-- =======================
Inner intro START -->
<section>
    <div class="container">
        <div class="row">
        <div class="col-md-9 mx-auto text-center">
        <h1 class="display-4">Qui sommes-nous ?</h1>
        <!-- breadcrumb -->
        <nav class="d-flex justify-content-center" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dots mb-0">
            <li class="breadcrumb-item"><a href="/"><i class="bi bi-house me-1"></i> Accueil</a></li>
            <li class="breadcrumb-item active">Qui sommes-nous?</li>
            </ol>
        </nav>
        </div>
    </div>
    </div>
</section>
<!-- =======================
Inner intro END -->
<!-- =======================Adv START -->
<section class="py-3 my-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<a href="#" class="d-block card-img-flash  rounded-3 overflow-hidden">
					<img src="/assets/images/adv-3.png" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Adv END -->
<!-- =======================
About START -->
<section class="pt-4 pb-0">
	<div class="container">
		<div class="row">
      <div class="col-xl-9 mx-auto">
        <h2>Nous sommes Togo Actualité, l’information en temps réel sur le Togo et l’Afrique.</h2>

        <h3 class="mt-4">Les raisons de la création du site togoactualite sont plusieurs :</h3> <br>
        <ul>
          <li>Fournir les informations fiables sans déformation via notre site internet.</li>
          <li>Permettre à la diaspora togolaise d’être informée de ce qui se passe dans notre cher pays.</li>
          <li>Nouer des partenariats avec d’autres sites d’information.</li>
          <li>Faire mieux connaître notre Togo à travers des débats, vidéos, nos cultures, etc…</li>
          <li>Permettre à nos abonnés de nous suivre et d’animer des débats dans le respect.</li>
        </ul>
        <!-- Team START -->
        <h3 class="mb-3 mt-5">Notre Groupe</h3>
        <div class="row g-4">
          <!-- Team item-->
          <div class="col-sm-12 col-lg-6">
            <div class="text-center">
            	<!-- Avatar img -->
              <div class="avatar avatar-xxl mb-2">
                <i class="fa fa-5x fa-user-circle" ></i>
              </div>
             
              <h5 style="margin-top: -30px;">Alexandre. D.</h5>
              <p class="m-0">Super Administrateur</p>
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="far fa-envelope"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Team item-->
          <div class="col-sm-12 col-lg-6">
            <div class="text-center">
            	<!-- Avatar img -->
              <div class="avatar avatar-xxl mb-2">
                <i class="fa fa-5x fa-user-circle"></i>
              </div>
              <h5 style="margin-top: -30px;">Joël. D.</h5>
              <p class="m-0">Publicateur d'articles</p>
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link px-2 fs-5" href="#"><i class="far fa-envelope"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Team item-->
         
          <!-- Team item-->
        </div> <br> <br>
        <!-- Service END -->
      </div>  <!-- Col END -->
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
<!-- =======================
About END -->
    </main>

@endsection