@extends('layouts.main')

@section('container')

<main class="form-signin m-auto card p-4" style="width: 50%">
    <form class="d-flex flex-column align-items-center">

        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Register</h1>
    
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

        <button class="w-50 btn btn-lg btn-primary fs-4" type="submit">REGISTER</button>

    </form>

    <div class="d-block text-center mt-2 mb-4">
        <small>Already have an account? <a href="/login" class="text-decoration-none">Login now!</a></small>
    </div>

</main>
    
@endsection