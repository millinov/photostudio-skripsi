@extends('layouts.main')

@section('container')

<!-- tampilan dashboard history -->

<div class="row w-100 py-4 px-3">
    
    <h3>Bookings</h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Studio</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Studio Contoh</td>
                <td>085212341234</td>
                <td>Jl. Kemanggisan Utama</td>
                <td>12-12-2022</td>
                <td class="text-center">Completed</td>
            </tr>

        </tbody>

    </table>    

   

</div>
@endsection