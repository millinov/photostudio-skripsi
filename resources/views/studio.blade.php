@extends('layouts.main')

@section('container')

    <div class="container">
        <h2>
            {{ $studio->title }}
        </h2>

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
                    @if($studio->user->id === auth()->user()->id)
                        <a href="/dashboard/studio" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2">Edit Studio</a>
                    @endif

                    @php
                        $isFavorite = false;
                    @endphp

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
                    @endif

                    @if ($isFavorite == false)
                        <form action="/favorite/create" method="post"> 
                            @csrf
                            <input type="hidden" name="studio_id" id="studio_id" value="{{ $studio->id }}" />
                            <button type="submit" class="btn btn-primary btn-usual-color text-decoration-none ms-4"><i class="bi bi-suit-heart"></i> Add To Wishlist</button>
                        </form>
                    @endif
                </div>
                <div class="d-flex justify-content-evenly align-items-center">
                    <button type="button" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#createOrderFormModal">
                        Create Booking
                    </button>
                    <a href="" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2">Chat Now</a>
                </div>
            </div>
            <div class="d-flex justify-content-evenly align-items-center">
                <button type="button" class="btn btn-primary btn-sm text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#createOrderFormModal">
                    Create Booking
                </button>
                <a href="/chatify/{{ $studio->user->id }}" class="btn btn-primary btn-sm text-decoration-none ms-2">Chat Now</a>
            </div>
        </div>

        <div class="row justify-content-center">

            {{-- <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}"> --}}

            @if ($studio->images->isNotEmpty())
                <div id="carouselExampleIndicators" class="carousel slide w-100 d-flex flex-column justify-content-center align-items-stretch bg-dark border" data-bs-ride="false" style="min-height: 500px;">
                    <div class="carousel-indicators">
                        
                        @if ($studio->images)
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

                        @if ($studio->images)

                            <div class="carousel-item active">
                                <img src="{{ asset('storage/') .'/' . $studio->images[0]->path }}" class="d-block w-100" alt="{{ $studio->category->name }}">
                            </div>
                            @foreach ($studio->images->skip(1) as $image)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block w-100" alt="{{ $studio->category->name }}">
                                </div>
                            @endforeach
                            
                        @else

                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1200/700?random=0" class="d-block w-100" alt="{{ $studio->category->name }}">
                            </div>
                            @for ($i = 1; $i <=2; $i++ )
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block w-100" alt="{{ $studio->category->name }}">
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
                <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}">
            @endif

            

            <div class="d-flex justify-content-between">
                <div class="col-lg-9 mt-3">

                    <article class=" fs-5">
                        {!! $studio->desc !!}
                    </article>
    
                </div>
    
                <div class="col-md-2 fs-6">
                    <div class="mt-3">
                        <label for="title">Studio Name:</label>
                        {{-- <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="{{ $studio->title }}"> --}}
                        <p>{{ $studio->title }}</p>
                    </div>
            
                    <div class="mt-3">
                        <label for="title">Owner's Phone Number:</label>
                        {{-- <input type="text" readonly class="form-control-plaintext" id="title" name="title" placeholder="Title" value="{{ auth()->user()->phone_number }}"> --}}
                        <p>{{ $studio->user->phone_number }}</p>
                    </div>
            
                    <div class="mt-3">
                        <label for="title">Studio's Address:</label>
                        {{-- <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="{{ $studio->address }}"> --}}
                        <p>{{ $studio->address }}</p>
                    </div>
            
                    <div class="mt-3">
                        <label for="title">Price Range:</label>
                        {{-- <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="--"> --}}
                        <p>--</p>
                    </div>
                </div>
            </div>
                    
            <a href="/katalog" class="mt-3">Kembali ke katalog</a>
            
        </div>

        @include('order.bookingForm')
    </div>

@endsection