@extends('dashboard.layouts.main')

@section('main')

<div class="container">


    @if ($studio === null)

        {{-- create studio --}}
        @include('dashboard.studio.createStudio')
        
    @else

        {{-- detail studio --}}
        @include('dashboard.studio.detailStudio')
        
        {{-- list booking --}}
        @include('dashboard.studio.listBooking')
        
    @endif

    

</div>
    
@endsection