@extends('layouts.main')

@section('container')
    <article class="mb-4">

        <h2>
            {{ $studio->title }}
        </h2>

        <h5 class="mb-1">By: <a href="/owners/{{ $studio->user->username }}" class="text-decoration-none">{{ $studio->user->name }}</a></h5>
        <h5 class="">Category: <a href="/categories/{{ $studio->category->slug }}" class="text-decoration-none">{{ $studio->category->name }}</a> </h5>

       {!! $studio->desc !!}

    </article>

    <a href="/katalog">Kembali ke katalog</a>
@endsection