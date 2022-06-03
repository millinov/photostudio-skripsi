@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2>
                    {{ $studio->title }}
                </h2>
        
                <h5 class="mb-1">By: <a href="/owners/{{ $studio->user->username }}" class="text-decoration-none">{{ $studio->user->name }}</a></h5>
                <h5 class="">Category: <a href="/categories/{{ $studio->category->slug }}" class="text-decoration-none">{{ $studio->category->name }}</a> </h5>
        
               {!! $studio->desc !!}
               
                <a href="/katalog">Kembali ke katalog</a>

            </div>
        </div>
    </div>

    <article class="mb-4">

       

    </article>

@endsection