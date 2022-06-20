@extends('dashboard.layouts.main')

@section('main')

<div class="container">


    @if ($studio === null)

    <div class="row w-100 py-4 px-3 d-flex justify-content-center">

        <h5 class="text-center">No Studio exist yet.</h5>

    </div>
        
    @else

    {{-- detail studio --}}
    <div class="row w-100 py-4 px-3">

        <div class="col-lg-6 px-3 d-flex flex-column justify-content-center">
    
            <form action="">
                @csrf
    
                <div class="mt-3">
                    <label for="title">Studio Name</label>
                    <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="{{ $studio->title }}">
                </div>
        
                <div class="mt-3">
                    <label for="title">Owner's Phone Number</label>
                    <input type="text" readonly class="form-control-plaintext" id="title" name="title" placeholder="Title" value="{{ auth()->user()->phone_number }}">
                </div>
        
                <div class="mt-3">
                    <label for="title">Studio's Address</label>
                    <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="{{ $studio->address }}">
                </div>
        
                <div class="mt-3">
                    <label for="title">Price Range</label>
                    <input type="text" readonly class="form-control" id="title" name="title" placeholder="Title" value="--">
                </div>
    
                <button type="button" class="btn text-white border-0 my-3" style="background-color: #7388E4">Edit Studio Profile</button>
    
            </form>
    
            <a href="/katalog/{{ $studio->slug }}" class="text-decoration-none">Look at Studio Page</a>
    
        </div>
    
        <div class="col d-flex justify-content-center">
    
    
            <div id="carouselExampleIndicators" class="carousel slide w-100 d-flex flex-column align-items-stretch bg-dark border" data-bs-ride="false">
                <div class="carousel-indicators">
    
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @for ($i = 1; $i <=2; $i++ )
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                    @endfor
    
                </div>
                <div class="carousel-inner d-flex align-items-center h-100">
    
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/1200/700?random=0" class="d-block w-100" alt="...">
                    </div>
                    @for ($i = 1; $i <=2; $i++ )
                        <div class="carousel-item">
                            <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block w-100" alt="...">
                        </div>
                    @endfor
    
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
    
        </div>
    </div>
    
    {{-- list booking --}}
    <div class="row w-100 py-4 px-3">
    
        <h3>Active Booking</h3>
    
        <div class="border w-100 d-flex justify-content-center">
            <div class="row row-cols-4 my-3 w-100">
    
                <div class="col d-flex w-100">
    
                    @for($i=1; $i<=4; $i++)
    
                    <div class="card mx-2 my-2">
    
                        <div class="position-relative mx-1 mt-1">
    
                            <img src="https://picsum.photos/300/300?random={{ $i-1 }}" alt="..." class=" img-thumbnail card-img-top">
                            <div class="position-absolute px-3 py-2 bottom-0 start-0 text-white" style="background-color: rgba(0, 0, 0, 0.575); border-top-right-radius: 0.375rem; margin-bottom: 0.3rem; margin-left: 0.35rem;">
                                <small>Name</small>
                            </div>
    
                        </div>
    
                        <div class="card-body">
                            <p class="fs-9">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, nulla?</p>
                            <a href="">Click for more...</a>
                        </div>
    
                    </div>
    
                    @endfor
    
                </div>
    
            </div>
        </div>
    
    </div>
        
    @endif

    

</div>
    
@endsection