@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h2>
                    {{ $studio->title }}
                </h2>
        
                <p class="mb-3">Owner: <a href="/owners/{{ $studio->user->username }}" class="text-decoration-none">{{ $studio->user->name }}</a> in <a href="/katalog?category={{ $studio->category->slug }}" class="text-decoration-none">{{ $studio->category->name }}</a></p>
        
                <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}">

               <article class="my-3 fs-5">
                    {!! $studio->desc !!}
               </article>
               
                <a href="/katalog">Kembali ke katalog</a>

            </div>
        </div>
    </div>

    <article class="mb-4">

       

    </article>

@endsection