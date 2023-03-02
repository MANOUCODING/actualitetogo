@extends('layouts.base')

@section('title') {{ $category->name }} @endsection

@section('content')
    <main>
        <section class="position-relative">
            <div class="container" data-sticky-container>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="mb-4">
                            <h1 class="display-4">{{ $category->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>

@endsection