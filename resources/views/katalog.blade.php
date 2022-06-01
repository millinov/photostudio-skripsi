@extends('layouts.main')

@section('container')
    @foreach ($catalogue as $item)
    <article class="mb-4">

        <h2>
            <a href="/katalog/{{ $item["id"] }}">{{ $item["title"] }}</a>
        </h2>

        <h5>Owner: {{ $item["owner"] }}</h5>

        <p>{{ $item["desc"] }}</p>

    </article>
    @endforeach
@endsection
