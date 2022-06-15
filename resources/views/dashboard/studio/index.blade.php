@extends('dashboard.layouts.main')

@section('main')

<div class="row w-100 py-4">

    <div class="col-lg-6">

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

            <button type="button" class="btn btn-primary my-3">Edit Studio Profile</button>

        </form>

    </div>

    <div class="col d-flex justify-content-center">


        <div id="carouselExampleIndicators" class="carousel slide w-100 d-flex flex-column align-items-stretch bg-dark border" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner d-flex align-items-center h-100">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/1200/700?random=0" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1200/700?random=1" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1200/700?random=2" class="d-block w-100" alt="...">
                </div>
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

<div class="row w-100 pb-4">

</div>
    
@endsection