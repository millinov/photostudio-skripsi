@extends('dashboard.layouts.main')

@section('main')

<div class="row w-100 py-4 px-3">

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
        {{ session('success') }}
    </div>
        
    @endif
    
    <h3>Active Booking</h3>
    <hr>

    @if ($orders->count())

        <table class="table fs-8" style="border-color: black">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Studio</th>
                    <th>Phone</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->studio->title}}</td>
                        <td>{{ $order->user->phone_number}}</td>
                        <td>
                            <table>
                                <tr>
                                    <td>Down Payment: @if($order->down_payment) {{ $order->down_payment }}  @else -- @endif</td>
                                </tr>
                                <tr>
                                    <td>Full Payment: {{ $order->full_payment }}</td>
                                </tr>
                            </table>
                        </td>
                        <td>{{ $order->studio->address}}</td>
                        <td>{{ $order->reservation_date}}</td>
                        <td>
                            @switch($order->status)
                                @case(0)
                                    Owner has not confirmed your booking.
                                @break
                                @case(1)
                                    Owner has confirmed your booking, waiting for payment.
                                @break

                                @case(2)
                                    Transaction has been finished.
                                @break

                                @case(3)
                                    Reservation has happened. Order complete.
                                @break

                                @default
                                    Owner has not confirmed your booking.
                                
                            @endswitch
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <h5 class="text-center">You have not booked any studio</h5>
    @endif

</div>
@endsection