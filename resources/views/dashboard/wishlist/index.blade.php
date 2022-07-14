@extends('dashboard.layouts.main')

@section('main')

<div class="col py-4 px-3 flex-column justify-content-start">

    @if (session()->has('success'))

    <div class="alert row alert-success alert-dismissible fade show w-50" role="alert">
        {{ session('success') }}
    </div>
        
    @endif
    
    <div class="row">
        <h3>Wishlist</h3>
        <hr>
    </div>
    <div class="border row rounded d-flex py-2 flex-grow-1 row-lg-8 justify-content-center" style="background-color: #F9CEA7; flex: 1 1 auto;">
        @if ($favorites->count())
            <div class="row row-cols-3 w-100 my-3">
                @foreach ($favorites as $favorite)

                <div class="col d-flex" style="max-height: 500px">
                    <div class="card">

                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.575); border-top-left-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                            <a href="/katalog?category={{ $favorite->studio->category->slug }}" class="text-decoration-none text-white">{{ $favorite->studio->category->name }}</a>
                        </div>
    
                        <div id="{{ $favorite->studio->slug . '-carousel' }}" class="carousel slide bg-dark border card-img-top" data-bs-ride="false" style="min-height: 150px; max-height: 200px; overflow: hidden;">
                
                            <div class="carousel-inner d-flex align-items-center h-100">
                
                                @if ($favorite->studio->images->isNotEmpty())
                
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/') .'/' . $favorite->studio->images[0]->path }}" class="d-block h-100" alt="{{ $favorite->studio->category->name }}" style="max-height: 200px;">
                                    </div>
                                    @foreach ($favorite->studio->images->skip(1) as $image)
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block h-100" alt="{{ $favorite->studio->category->name }}" style="max-height: 200px;">
                                        </div>
                                    @endforeach
                                    
                                @else
                
                                    <div class="carousel-item active h-100">
                                        <img src="https://picsum.photos/1200/700?random={{ $favorite->studio->id }}" class="d-block h-100" alt="{{ $favorite->studio->category->name }}" style="max-height: 200px;">
                                    </div>
                                    @for ($i = 1+$favorite->studio->id; $i <=2+$favorite->studio->id; $i++ )
                                        <div class="carousel-item h-100">
                                            <img src="https://picsum.photos/1200/700?random={{ $i+$favorite->studio->id }}" class="d-block h-100" alt="{{ $favorite->studio->category->name }}" style="max-height: 200px;">
                                        </div>
                                    @endfor
                                    
                                @endif
                
                            </div>
    
                            <button class="carousel-control-prev" type="button" data-bs-target="{{'#' . $favorite->studio->slug . '-carousel' }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="{{'#' . $favorite->studio->slug . '-carousel' }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                
                        </div>
            
                        <div class="card-body d-flex flex-column justify-content-between">
                          <div class="mb-2">
                            <h5 class="card-title"><a href="/katalog/{{ $favorite->studio->slug }}" class="text-decoration-none text-dark">{{ $favorite->studio->title }}</a></h5>
                            <p class="mb-2"><small>Owner: <a href="/katalog?owner={{ $favorite->studio->user->username }}" class="text-decoration-none">{{ $favorite->studio->user->name }}</a></small></p>
                            
                          </div>
    
                          <div>
                            <a href="/katalog/{{ $favorite->studio->slug }}" class="btn btn-primary mb-1">Read more..</a>
                            <p class="card-text"><small class="text-muted">{{ $favorite->studio->created_at->diffForHumans() }}</small></p>
                          </div>
    
                        </div>
            
                    </div>
                </div>
                    
                @endforeach
            </div>
        @else
            <h5 class="text-center mt-2">You have not wishlist any studio</h5>
        @endif
    </div>

    

</div>
@endsection