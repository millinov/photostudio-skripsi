@extends('layouts.main')

@section('container')

    <h1 class="mb-4">List Kategori</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @foreach ($categories as $categories)
                    <div class="card bg-dark text-white">
            
                        <img src="..." class="card-img" alt="...">
                
                        <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                        </div>
                
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection
