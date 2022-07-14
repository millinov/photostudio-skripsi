@extends('layouts.main')

@section('container')

    <div class="container">

        @if (session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
            {{ session('success') }}
        </div>
            
        @endif

       <div class="row">
            <h2 class="px-0">
                {{ $studio->title }}
            </h2>

            <div class="d-flex px-0 align-items-center my-1 justify-content-between">
                <div class="d-flex justify-content-evenly align-items-center">
                    <div>
                        <p class="text-box align-middle my-0 me-2 fs-6">Owner: <a href="/katalog?owner={{ $studio->user->username }}" class="text-decoration-none">{{ $studio->user->name }}</a> in <a href="/katalog?category={{ $studio->category->slug }}" class="text-decoration-none">{{ $studio->category->name }}</a></p>
                        <p class="my-0">Address: {{ $studio->address }}</p>
                        <p class="my-0">No Telp: {{ $studio->user->phone_number }}</p>
                    </div>
                    @auth
                        
                    @if($studio->user->id === auth()->user()->id)
                        <a href="/dashboard/studio" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2">Edit Studio</a>
                    @else

                    @endif

                    @php
                        $isFavorite = false;
                    @endphp

                    @if ($studio->user->id != auth()->user()->id)

                        @if (auth()->user()->favorites->count())
                            @foreach (auth()->user()->favorites as $favorite)
                                @if ($favorite->studio_id == $studio->id)
                                    <form action="/delete/{{ $favorite->id }}" method="post"> 
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="studio_id" id="studio_id" value="{{ $studio->id }}" />
                                        <button type="submit" class="btn btn-primary btn-usual-color text-decoration-none ms-4"><i class="bi bi-suit-heart-fill"></i> Add To Wishlist</button>
                                    </form>
                                    @php
                                        $isFavorite = true;
                                    @endphp
                                @endif
                            @endforeach
                        @endif=

                        @if ($isFavorite == false)
                            <form action="/favorite/create" method="post"> 
                                @csrf
                                <input type="hidden" name="studio_id" id="studio_id" value="{{ $studio->id }}" />
                                <button type="submit" class="btn btn-primary btn-usual-color text-decoration-none ms-4"><i class="bi bi-suit-heart"></i> Add To Wishlist</button>
                            </form>
                        @endif
                        
                    @endif
                </div>
                    @if ($studio->user->id != auth()->user()->id)
                        <div class="d-flex justify-content-evenly align-items-center">
                            <button type="button" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#createOrderFormModal">
                                Create Booking
                            </button>
                            <a href="/chatify/{{ $studio->user->id }}" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2">Chat Now</a>
                        </div>
                    @endif
                @endauth
            </div>
       </div>

        <div class="row justify-content-center">

            {{-- <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}"> --}}

            @if ($studio->images->isNotEmpty())
            <div id="carouselExampleIndicators" class="carousel slide w-100 d-flex flex-column justify-content-center align-items-stretch bg-dark border" data-bs-ride="false" style="min-height: 500px; max-height: 500px">
                <div class="carousel-indicators">
                    
                    @if ($studio->images->isNotEmpty())
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @for ($i = 1; $i < $studio->images->count(); $i++)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button> 
                        @endfor
                    @else
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @for ($i = 1; $i <=2; $i++ )
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                        @endfor
                        
                    @endif
    
                </div>
                <div class="carousel-inner d-flex align-items-center h-100">

                    @if ($studio->images->isNotEmpty())

                        <div class="carousel-item active">
                            <img src="{{ asset('storage/') .'/' . $studio->images[0]->path }}" class="d-block m-auto" alt="..." style="max-width: 80%;">
                        </div>
                        @foreach ($studio->images->skip(1) as $image)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/') .'/' . $image->path }}" class="d-block m-auto" alt="..."  style="max-width: 80%;">
                            </div>
                        @endforeach
                        
                    @else

                        <div class="carousel-item active">
                            <img src="https://picsum.photos/1200/700?random=0" class="d-block m-auto" alt="..." style="max-width: 80%;">
                        </div>
                        @for ($i = 1; $i <=2; $i++ )
                            <div class="carousel-item">
                                <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block m-auto" alt="..."  style="max-width: 80%;">
                            </div>
                        @endfor
                        
                    @endif
    
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
    
            </div>
            @else
                <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid " alt="{{ $studio->category->name }}" style="max-height: 300px; max-width:700px;">
            @endif

            

            <div class="row d-flex justify-content-between">
                <div class="col-lg-9 mt-3">

                    <h4>Studio's Description</h4>

                    <article class="fs-6 card border-0 p-3" style="background-color: #D9D9D9; min-height: 300px; max-height: 400px; overflow: auto">
                        {!! $studio->desc !!}
                    </article>
                    
                    <a href="/katalog" class="mt-2 btn btn-primary btn-usual-color text-decoration-none">Kembali ke katalog</a>
    
                </div>
    
                <div class="col-md-3 mt-3">

                    <h4>Studio's Review</h4>
                    <div class="border-0 rounded p-3 m-0 row row-cols-1 " style="background-color: #D9D9D9; min-height: 300px; max-height: 400px; overflow: auto">
                        @if ($studio->reviews->count())
                            @foreach ($studio->reviews as $review)
                                <div class="col p-0">
                                    <div class="card m-0" style="max-height: ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 px-0 d-flex justify-content-center">
                                                    <div class="img-thumbnail rounded-circle my-3 p-0" style="max-width: 50px; max-height: 50px; overflow: hidden;">
                                                        <img src="@if($review->user->profile_pic != null) {{ asset('storage/') .'/' . auth()->user()->profile_pic }} @else {{ asset('img/image-about.jpg') }} @endif" alt="{{ $review->user->username }}"style="height: 50px;" class="d-block m-auto">
                                                    </div>
                                                </div>
                                                <div class="col-8 px-0 d-flex flex-column justify-content-center">
                                                    <h5 class="card-title">{{ $review->rating }} / 5 <i class="bi bi-star-fill" style="color: #ffc115;"></i></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">From {{ $review->user->name }}</h6>
                                                </div>
                                            </div>
                                            <p class="card-text" style="max-height: 100px; overflow:auto;" >{{ $review->review_text }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            No Review Available
                        @endif
                    </div>
                </div>
            </div>
            
        </div>

        @include('order.bookingForm')
    </div>

@endsection