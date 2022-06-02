@extends('layouts.main')

@section('container')

    <h1 class="mb-4">Halaman Kategori : {{ $category }}</h1>

    @foreach ($catalogue as $item)
    <article class="mb-2 border-bottom pb-3">

        <h2>
            <a href="/katalog/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
        </h2>

        <h5>Owner: {{ $item->owner }}</h5>

        <p>{{ $item->excerpt }}</p>

    </article>
    @endforeach
@endsection
