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
                    @if($studio->user->id === auth()->user()->id)
                        <a href="/dashboard/studio" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2">Edit Studio</a>
                    @endif
                    <a href="" class="btn btn-primary btn-usual-color text-decoration-none ms-4">Add To Favourite</a>
                </div>
                <div class="d-flex justify-content-evenly align-items-center">
                    <button type="button" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#createOrderFormModal">
                        Create Booking
                    </button>
                    <a href="" class="btn btn-primary btn-usual-color btn-sm text-decoration-none ms-2">Chat Now</a>
                </div>
            </div>
       </div>

        <div class="row justify-content-center">

            {{-- <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}"> --}}

            @if ($studio->images->isNotEmpty())
                <div id="carouselExampleIndicators" class="carousel slide d-flex flex-column w-100 justify-content-center align-items-stretch bg-dark border" data-bs-ride="false">
                    <div class="carousel-indicators">
        
                    </div>
                    <div class="carousel-inner my-3 d-flex align-items-center h-100">

                        @if ($studio->images)
                            @foreach ($studio->images as $image)

                                @if ($loop->first)
                                <div class="carousel-item text-center active">
                                    <img src="{{ asset('storage/') .'/' . $studio->images[0]->path }}" class="d-inline mx-3" alt="{{ $studio->category->name }}" style="max-height: 300px; max-width:700px;">
                                @endif

                                @if ($loop->even)
                                    <img src="{{ asset('storage/') .'/' . $image->path }}" class="d-inline  mx-3" alt="{{ $studio->category->name }}" style="max-height: 300px; max-width:700px;">
                                </div>
                                @endif

                                @if ($loop->odd && !$loop->first)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/') .'/' . $image->path }}" class="d-inline  mx-3" alt="{{ $studio->category->name }}" style="max-height: 300px; max-width:700px;">
                                @endif


                            @endforeach
                            
                        @else

                            <div class="carousel-item active">
                                <img src="https://picsum.photos/1200/700?random=0" class="d-block  m-auto" alt="{{ $studio->category->name }}" style="max-height: 300px; max-width:700px;">
                            </div>
                            @for ($i = 1; $i <=2; $i++ )
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block  m-auto" alt="{{ $studio->category->name }}" style="max-height: 300px; max-width:700px;">
                                </div>
                            @endfor
                            
                        @endif
        
                    </div>

                    @if ($studio->images->count() > 2)
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
        
                </div>
            @else
                <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}">
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
                                            <h5 class="card-title">{{ $review->rating }} / 5 <i class="bi bi-star-fill" style="color: #ffc115;"></i></h5>
                                            <h6 class="card-subtitle mb-2 text-muted">From {{ $review->user->name }}</h6>
                                            <p class="card-text" style="max-height: 100px; overflow:auto;" >{{ $review->review_text }}</p>
                                            <a href="#" class="card-link">Card link</a>
                                            <a href="#" class="card-link">Another link</a>
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