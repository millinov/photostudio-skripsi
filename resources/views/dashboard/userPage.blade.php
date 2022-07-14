@extends('dashboard.layouts.main')

@section('main')

<div class="p-3 w-100">
    @if (session()->has('success'))

    <div class="alert text-center row alert-success alert-dismissible fade show p-2" role="alert">
        <h5 class="m-0">{{ session('success') }}</h5>
    </div>

    @endif
    
    <div class="row h-100 d-flex justify-content-center">
        <div class="col-lg-6"><h3>Your Profile</h3>
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
        <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center">
            <img src="img/image-about.jpg" alt="{{ auth()->user()->username }}" width="300" class="img-thumbnail rounded-circle my-3">
        </div>
    </div>

    <div class="row">
        <div class="col d-flex flex-column align-items-center">
            <button class="btn btn-primary btn-usual-color w-50 ">Edit Profile</button>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <button class="btn row btn-primary btn-usual-color w-50">Change Profile Picture</button>
        </div>
    </div>
</div>
    
@endsection