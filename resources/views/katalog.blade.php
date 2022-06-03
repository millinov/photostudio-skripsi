@extends('layouts.main')

@section('container')

    <h1 class="mb-3">{{ $title }}</h1>

    @if ($catalogue->count())

    <div class="card mb-3">
        <img src="https://picsum.photos/1200/400?random=0" class="card-img-top" alt="{{ $catalogue[0]->category->name }}">
        <div class="card-body text-center">

            <h3 class="card-title"><a href="/katalog/{{ $catalogue[0]->slug }}" class="text-decoration-none text-dark">{{ $catalogue[0]->title }}</a></h3>

            <p class="mb-2"><small>Owner: <a href="/owners/{{ $catalogue[0]->user->username }}" class="text-decoration-none">{{ $catalogue[0]->user->name }}</a> in <a href="/categories/{{ $catalogue[0]->category->slug }}" class="text-decoration-none">{{ $catalogue[0]->category->name }}</a></small></p>

            <p class="card-text">{{ $catalogue[0]->excerpt }}</p>

            <a href="/katalog/{{ $catalogue[0]->slug }}" class="text-decoration-none btn btn-primary mb-2">Read more</a>

            <p class="card-text"><small class="text-muted">{{ $catalogue[0]->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
    
    @else

    <p class="text-center fs-4">No post found.</p>

    @endif

    <div class="container">
        <div class="row row-cols-3">
            @foreach ($catalogue->skip(1) as $catalogue)
            <div class="col mb-4 card-group">
                <div class="card">

                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.575); border-top-left-radius: 0.375rem">
                        <a href="/categories/{{ $catalogue->category->slug }}" class="text-decoration-none text-white">{{ $catalogue->category->name }}</a>
                    </div>
        
                    <img src="https://picsum.photos/500/400?random={{ $catalogue->id }}" class="card-img-top" alt="{{ $catalogue->category->name }}">
        
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="mb-2">
                        <h5 class="card-title"><a href="/katalog/{{ $catalogue->slug }}" class="text-decoration-none">{{ $catalogue->title }}</a></h5>
                        <p class="mb-2"><small>Owner: <a href="/owners/{{ $catalogue->user->username }}" class="text-decoration-none">{{ $catalogue->user->name }}</a></small></p>
                        <p class="card-text">{{ $catalogue->excerpt }}</p>
                      </div>

                      <div>
                        <a href="/katalog/{{ $catalogue->slug }}" class="btn btn-primary mb-1">Read more..</a>
                        <p class="card-text"><small class="text-muted">{{ $catalogue->created_at->diffForHumans() }}</small></p>
                      </div>

                    </div>
        
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if ($title != "All Studio")

    <a href="/katalog" class="p-5">Kembali ke katalog</a>
        
    @endif

@endsection
