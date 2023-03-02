@extends('layouts.base')
@section('title') Infos Pratiques @endsection
@section('content')
    <main>
        <section class="position-relative">
            <div class="container" data-sticky-container>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="mb-4">
                            <h1 class="display-4"> Infos Pratiques</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dots">
                                    <li class="breadcrumb-item"><a href="/"><i class="bi bi-house me-1"></i>Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Infos pratiques</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr/>
                    <div class="col-lg-9">
                        <div class="mb-3 mt-3">
                            <h6>COMMISSARIAT DE POLICE</h6>
                        </div>
                    </div>
                    <hr />
                    <div class="col-lg-9">
                        <div class="">
                            <h6>COMMISSARIAT CENTRAL DE LOME</h6>
                            <h6><a href="tel:+22822212871" class="text-reset"><u>+228 22 21 28 71</u></a></h6>
                            <h6>Av. de la Libération, Carrefour de la Fontaine Luminueuse</h6>
                            <h6>Lomé – Togo</h6>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </section>
    </main>

@endsection