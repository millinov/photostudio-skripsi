@extends('layouts.main')

@section('container')

    <div class="container">
        <h2>
            {{ $studio->title }}
        </h2>

        <div class="d-flex align-items-center mt-1 mb-3">
            <p class="text-box align-middle my-0 fs-6">Owner: <a href="/katalog?owner={{ $studio->user->username }}" class="text-decoration-none">{{ $studio->user->name }}</a> in <a href="/katalog?category={{ $studio->category->slug }}" class="text-decoration-none">{{ $studio->category->name }}</a></p>

            @if($studio->user->id === auth()->user()->id)
                <a href="/dashboard/studio" class="btn btn-primary btn-sm text-decoration-none ms-2">Edit Studio</a>
            @endif

        </div>
        <div class="row justify-content-center">

            <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}">

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
    </div>

@endsection