@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration m-auto card p-4">
            <form class="d-flex flex-column align-items-center" action="/register" method="post">
                @csrf
        
                <h1 class="h3 mb-3 fw-normal">Registration Form</h1>
            
                <div class="w-100">
        
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="Name" style="margin-bottom: -1px;">
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" style="margin-bottom: -1px;">
                        <label for="username">Userame</label>
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" style="margin-bottom: -1px;">
                        <label for="email">Email address</label>
                    </div>
        
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
         
                </div>
        
                <button class="w-50 btn btn-lg btn-primary fs-4 mt-3" type="submit">REGISTER</button>
        
            </form>
        
            <div class="d-block text-center mt-2 mb-4">
                <small>Already have an account? <a href="/login" class="text-decoration-none">Login</a></small>
            </div>
        
        </main>
    </div>
</div>
    
@endsection