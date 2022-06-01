@extends('layouts.main')

@section('container')
    <article class="mb-4">

        <h2>
            {{ $studio["title"] }}
        </h2>

        <h5>By: {{ $studio["owner"] }}</h5>

        <p>{{ $studio["desc"] }}</p>

    </article>

    <a href="/katalog">Kembali ke katalog</a>
@endsection