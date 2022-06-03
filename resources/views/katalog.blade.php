@extends('layouts.main')

@section('container')

    <h1 class="mb-3">{{ $title }}</h1>

    @if ($catalogue->count())

    <div class="card mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    
    @else

    <p class="text-center fs-4">No post found.</p>

    @endif

    

    @foreach ($catalogue as $item)
    <article class="mb-2 border-bottom pb-3">

        <h3>
            <a href="/katalog/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
        </h3>

        <h5 class="mb-1">Owner: <a href="/owners/{{ $item->user->username }}" class="text-decoration-none">{{ $item->user->name }}</a></h5>
        
        <h5 class="">Category: <a href="/categories/{{ $item->category->slug }}" class="text-decoration-none">{{ $item->category->name }}</a> </h5>

        <p>{{ $item->excerpt }}</p>

        <a href="/katalog/{{ $item->slug }}" class="text-decoration-none">Read more..</a>

    </article>
    @endforeach

    @if ($title != "All Studio")

    <a href="/katalog">Kembali ke katalog</a>
        
    @endif

@endsection
