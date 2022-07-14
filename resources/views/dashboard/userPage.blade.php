@extends('dashboard.layouts.main')

@section('main')

<div class="p-3 w-100">
    @if (session()->has('success'))

    <div class="alert text-center row alert-success alert-dismissible fade show p-2" role="alert">
        <h5 class="m-0">{{ session('success') }}</h5>
    </div>

    @endif
    
    <div class="row h-100 d-flex justify-content-center">
        <div class="col-lg-6">

            <div class="row">
                <h3>Your Profile</h3>
                <hr>
                <div class="mb-3">
                    <label for="name">Name</label>
                    <div class="form-control">{{ auth()->user()->name }}</div>
                </div>

                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="form-control">{{ auth()->user()->username }}</div>
                </div>

                <div class="mb-3">
                    <label for="username">Phone Number</label>
                    <div class="form-control">{{ auth()->user()->phone_number }}</div>
                </div>

                <div class="mb-3">
                    <label for="username">Email</label>
                    <div class="form-control">{{ auth()->user()->email }}</div>
                </div>

                
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
            <img src="img/image-about.jpg" alt="{{ auth()->user()->username }}" width="350" class="img-thumbnail rounded-circle my-3">
        </div>
        <button class="btn btn-primary btn-usual-color w-50 mt-3">Edit Profile</button>
    </div>
</div>
    
@endsection