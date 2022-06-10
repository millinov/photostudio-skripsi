@extends('layouts.main')

@section('container')

<div class="container-fluid">

    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="row d-flex justify-content-center flex-wrap flex-md-nowrap w-100">
        
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse ms-2">
            <div class="position-sticky pt-3 pb-3 border rounded-start">
                <ul class="nav flex-column">
                    
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="#">
                        <span data-feather="home" class="align-text-bottom text-dark"></span>
                        Your Profile
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        Wishlist
                        </a> 
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">
                        <span data-feather="file" class="align-text-bottom"></span>
                        History
                        </a>
                    </li>
        
                </ul>
            </div>
        </nav>
  
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-flex justify-content-center border rounded-end">
        
            <div class="">
                
            </div>
            
        </main>
    </div>
</div>
    
@endsection