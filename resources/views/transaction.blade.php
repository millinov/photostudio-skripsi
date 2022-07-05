@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration m-auto card p-4">
            <form class="d-flex flex-column align-items-center" action="/booking" method="post">
                @csrf
        
                <h1 class="h3 mb-3 fw-normal">Create Booking</h1>
                <div>order for "nama studio" </div>
                <hr>
                <div class="w-100">
        
                    <div class="input-group mb-3">
                        <input type="date" name="date" class="form-control rounded-top @error('date') is-invalid @enderror" id="date" placeholder="Date"  required value="{{ old('date') }}">
                        

                        @error('date')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="input-group mb-3">
                        <input type="time" name="time" class="form-control rounded-top @error('time') is-invalid @enderror" id="time" placeholder="Time"  required value="{{ old('time') }}">
                        

                        @error('time')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror


                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" name="price" class="form-control  @error('price') is-invalid @enderror" id="price" placeholder="Amount Paid"  required value="{{ old('price') }}">
                    

                        @error('price')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>

                    <div class="input-group mb-3"">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required >
                       

                        @error('password')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>

                    

                   
         
                </div>
        
                <button class="w-50 btn btn-lg btn-primary fs-4 mt-3" type="submit">BOOK NOW!</button>
        
            </form>
        
        
        </main>
    </div>
</div>
@endsection