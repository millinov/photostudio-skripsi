@extends('dashboard.layouts.main')

@section('main')

<div class="pt-3 pb-3">
    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        {{ session('success') }}
    </div>
        
    @endif
</div>
    
@endsection