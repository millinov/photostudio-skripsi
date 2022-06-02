@extends('layouts.main')

@section('container')

    <h1 class="mb-4">Halaman Kategori : {{ $category }}</h1>

    @foreach ($catalogue as $item)
    <article class="mb-2 border-bottom pb-3">

        <h2>
            <a href="/katalog/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
        </h2>

        <h5 class="mb-1">Owner: <a href="/owners/{{ $item->user->username }}" class="text-decoration-none">{{ $item->user->name }}</a></h5>

        <p>{{ $item->excerpt }}</p>

    </article>
    @endforeach

    <a href="/categories">Kembali ke list kategori</a>

@endsection
