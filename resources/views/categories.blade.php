@extends('layouts.main')

@section('container')

    <h1 class="mb-4">List Kategori</h1>

    @foreach ($categories as $item)
    <article class="mb-2">

        <ul>
            <li>
                <h2>
                    <a href="/categories/{{ $item->slug }}" class="text-decoration-none">{{ $item->name }}</a>
                </h2>
            </li>
        </ul>

    </article>
    @endforeach
@endsection
