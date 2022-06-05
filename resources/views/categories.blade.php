@extends('layouts.main')

@section('container')

    <h1 class="mb-4">List Kategori</h1>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($categories as $categories)
            
            <div class="col-md-4 mb-4 card-group">
                <a href="/katalog?category={{ $categories->slug }}">
                    <div class="card bg-dark text-white">
                
                        <img src="https://picsum.photos/500/400?random={{ $categories->id }}" class="card-img" alt="{{ $categories->name }}">
                
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0,0,0,0.7)">{{ $categories->name }}</h5>
                        </div>
                
                    </div>
                </a>
            </div>
                
            @endforeach
        </div>
    </div>
@endsection
