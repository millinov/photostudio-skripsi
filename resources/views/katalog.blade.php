@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center fs-1">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/katalog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('owner'))
                    <input type="hidden" name="owner" value="{{ request('owner') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Search Studio.." name="search" value="{{ 
                        request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($studios->count())

    <div class="card mb-3">

        {{-- <img src="https://picsum.photos/1200/400?random=0" class="card-img-top" alt="{{ $studio->category->name }}"> --}}

        <div id="{{ $studios[0]->slug . '-carousel' }}" class="carousel slide w-100 bg-dark border card-img-top" data-bs-ride="carousel" style="min-height: 500px; max-height: 500px; overflow: hidden;">

            <div class="carousel-indicators">
                    
                @if ($studios[0]->images->isNotEmpty())
                    <button type="button" data-bs-target="{{'#' . $studios[0]->slug . '-carousel' }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @for ($i = 1; $i < $studios[0]->images->count(); $i++)
                        <button type="button" data-bs-target="{{'#' . $studios[0]->slug . '-carousel' }}" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button> 
                    @endfor
                @else
                    <button type="button" data-bs-target="{{'#' . $studios[0]->slug . '-carousel' }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @for ($i = 1; $i <=2; $i++ )
                        <button type="button" data-bs-target="{{'#' . $studios[0]->slug . '-carousel' }}" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                    @endfor
                    
                @endif

            </div>

            <div class="carousel-inner d-flex align-items-center h-100">

                @if ($studios[0]->images->isNotEmpty())

                    <div class="carousel-item active">
                        <img src="{{ asset('storage/') .'/' . $studios[0]->images[0]->path }}" class="d-block h-100 card-img-top" alt="{{ $studios[0]->category->name }}">
                    </div>
                    @foreach ($studios[0]->images->skip(1) as $image)
                        <div class="carousel-item">
                            <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block h-100 card-img-top" alt="{{ $studios[0]->category->name }}">
                        </div>
                    @endforeach
                    
                @else

                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/700?random={{ $studios[0]->id }}" class="d-block h-100 card-img-top" alt="{{ $studios[0]->category->name }}">
                    </div>
                    @for ($i = 1+$studios[0]->id; $i <=2+$studios[0]->id; $i++ )
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1200/700?random={{ $i+$studios[0]->id }}" class="d-block h-100 card-img-top" alt="{{ $studios[0]->category->name }}">
                        </div>
                    @endfor
                    
                @endif

            </div>

        </div>
        
        <div class="card-body text-center">

            <h3 class="card-title"><a href="/katalog/{{ $studios[0]->slug }}" class="text-decoration-none text-dark">{{ $studios[0]->title }}</a></h3>

            <p class="mb-2"><small>Owner: <a href="/katalog?owner={{ $studios[0]->user->username }}" class="text-decoration-none">{{ $studios[0]->user->name }}</a> in <a href="/katalog?category={{ $studios[0]->category->slug }}" class="text-decoration-none">{{ $studios[0]->category->name }}</a></small></p>

            <p class="card-text">{!! $studios[0]->excerpt !!}</p>

            <a href="/katalog/{{ $studios[0]->slug }}" class="text-decoration-none btn btn-primary mb-2">Read more</a>

            <p class="card-text"><small class="text-muted">{{ $studios[0]->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
    

    <div class="container">
        <div class="row row-cols-3 justify-content-center">
            @foreach ($studios->skip(1) as $studio)
            <div class="col mb-4 card-group">
                <div class="card">

                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.575); border-top-left-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                        <a href="/katalog?category={{ $studio->category->slug }}" class="text-decoration-none text-white">{{ $studio->category->name }}</a>
                    </div>

                    <div id="{{ $studio->slug . '-carousel' }}" class="carousel slide bg-dark border card-img-top" data-bs-ride="false" style="min-height: 300px; max-height: 300px; overflow: hidden;">
            
                        <div class="carousel-inner d-flex align-items-center h-100">
            
                            @if ($studio->images->isNotEmpty())
            
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/') .'/' . $studio->images[0]->path }}" class="d-block h-100" alt="{{ $studio->category->name }}">
                                </div>
                                @foreach ($studio->images->skip(1) as $image)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block h-100" alt="{{ $studio->category->name }}">
                                    </div>
                                @endforeach
                                
                            @else
            
                                <div class="carousel-item active h-100">
                                    <img src="https://picsum.photos/1200/700?random={{ $studio->id }}" class="d-block h-100" alt="{{ $studio->category->name }}">
                                </div>
                                @for ($i = 1+$studio->id; $i <=2+$studio->id; $i++ )
                                    <div class="carousel-item h-100">
                                        <img src="https://picsum.photos/1200/700?random={{ $i+$studio->id }}" class="d-block h-100" alt="{{ $studio->category->name }}">
                                    </div>
                                @endfor
                                
                            @endif
            
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="{{'#' . $studio->slug . '-carousel' }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="{{'#' . $studio->slug . '-carousel' }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
            
                    </div>
        
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="mb-2">
                        <h5 class="card-title"><a href="/katalog/{{ $studio->slug }}" class="text-decoration-none text-dark">{{ $studio->title }}</a></h5>
                        <p class="mb-2"><small>Owner: <a href="/katalog?owner={{ $studio->user->username }}" class="text-decoration-none">{{ $studio->user->name }}</a></small></p>
                        <p class="card-text">{!! $studio->excerpt !!}</p>
                      </div>

                      <div>
                        <a href="/katalog/{{ $studio->slug }}" class="btn btn-primary mb-1">Read more..</a>
                        <p class="card-text"><small class="text-muted">{{ $studio->created_at->diffForHumans() }}</small></p>
                      </div>

                    </div>
        
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $studios->links() }}
        </div>

    </div>


    {{-- @if ($title != "All Studio")

    <a href="/katalog" class="p-5">Kembali ke katalog</a>
        
    @endif --}}

    @else

    <p class="text-center fs-4">No Studio found.</p>

    @endif

    

@endsection
