@extends('layouts.main')

@section('container')

<div class="d-dlex flex-column align-items-center justify-content-center">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom w-100">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="row d-flex justify-content-center flex-wrap flex-md-nowrap w-100">
        
        @include('dashboard.layouts.sidebar')
  
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex flex-column justify-content-center border rounded-end " style="background-color: #e3f2fd;">
        
            @yield('main')
            
        </main>
    </div>
</div>
    
@endsection