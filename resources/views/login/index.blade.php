@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-signin m-auto card p-4">
            <form class="d-flex flex-column align-items-center">
        
                {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                
                {{-- Buat bikin alert setelah register --}}
                @if (session()->has('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                @endif
        
                <h1 class="h3 mb-5 fw-normal">Login</h1>
            
                <div class="w-100">
        
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
        
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
        
                    <div class="checkbox mb-3 mt-1">
                        <label>
                        <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
         
                </div>
        
                <button class="w-50 btn btn-lg btn-primary fs-4" type="submit">LOGIN</button>
        
            </form>
        
            <div class="d-block text-center mt-2 mb-4">
                <small>Not registered? <a href="/register" class="text-decoration-none">Register now!</a></small>
            </div>
        
        </main>
    </div>
</div>
    
@endsection