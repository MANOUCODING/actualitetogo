@extends('layouts.frontoffice.base')
@section('title') {{ $category->nomComplet }} @endsection
@section('content')
<main>
   
   
        <section class="position-relative">
            <div class="container" data-sticky-container>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="mb-4">
                            <h1 class="display-4">{{ $category->nomComplet }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative pt-0">
            <div class="container" data-sticky-container>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row gy-4">
                            @foreach ($articles as $result)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card">
                                        <!-- Card img -->
                                        <div class="position-relative">
                                            <img class="card-img" src="/storage/{{$result->ogImage}}" style="height: 350px; width: 350px ; object-fit: cover" alt="Card image">
                                            <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                            
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="/{{$result->categorySlug}}" class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $result->categoryName }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pt-3">
                                            <h4 class="card-title"><a href="/{{$result->slug}}" class="btn-link text-reset fw-bold"> {!! $result->title !!} </a></h4>                                        <!-- Card info -->
                                            <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                <li class="nav-item">
                                                    <div class="nav-link">
                                                        <div class="d-flex align-items-center position-relative">
                                                            <div class="avatar avatar-xs">
                                                                <i class="fa fa-2x fa-user-circle"></i>
                                                            </div>
                                                            <span class="ms-3">par  <a href="/auteurs/{{$result->authorSlug}}" class="stretched-link text-reset btn-link">{{ $result->authorName }}</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">{{ date('d/m/Y', strtotime($result->date_publish)) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $articles->links() }}
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- =======================Adv START -->

<!-- =======================
Adv END -->
    </main>

@endsection