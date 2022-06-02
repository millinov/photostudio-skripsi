@extends('layouts.main')

@section('container')

    <h1 class="mb-3">Halaman Katalog</h1>

    @foreach ($catalogue as $item)
    <article class="mb-2 border-bottom pb-3">

        <h3>
            <a href="/katalog/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
        </h3>

        <h5 class="mb-1">Owner: <a href="#" class="text-decoration-none">{{ $item->user->name }}</a></h5>
        <h5 class="">Category: <a href="/categories/{{ $item->category->slug }}" class="text-decoration-none">{{ $item->category->name }}</a> </h5>

        <p>{{ $item->excerpt }}</p>

        <a href="/katalog/{{ $item->slug }}" class="text-decoration-none">Read more..</a>

    </article>
    @endforeach
@endsection
