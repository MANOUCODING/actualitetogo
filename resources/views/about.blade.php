@extends('layouts.base')
@section('title') Qui sommes-nous ? @endsection
@section('content')
    <main>
    <main>
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
<!-- =======================
About END -->
    </main>

@endsection