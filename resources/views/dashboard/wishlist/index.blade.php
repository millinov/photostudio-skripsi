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
                <tr class="text-center">
                    <th>No.</th>
                    <th>Studio</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="/katalog/{{ $order->studio->slug }}" class="text-decoration-none">{{ $order->studio->title }}</a></td>
                        <td>
                            <table>
                                <tr>
                                    <td>Down Payment: @if($order->down_payment) {{ $order->down_payment }}  @else -- @endif</td>
                                </tr>
                                <tr>
                                    <td>Full Payment: {{ $order->final_price }}</td>
                                </tr>
                            </table>
                        </td>
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
                                    <button type="button" class="btn btn-primary btn-sm text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#seeTransactionModal-{{ $order->transaction->id }}">
                                        See Transaction
                                    </button>
                                @break

                                @case(3)
                                    Reservation has happened. Order complete.
                                    <button type="button" class="btn btn-primary btn-sm text-decoration-none mx-2" data-bs-toggle="modal" data-bs-target="#seeTransactionModal-{{ $order->transaction->id }}">
                                        See Transaction
                                    </button>
                                @break

                                @case(4)
                                    Order is cancelled.
                                @break

                                @default
                                    Order is cancelled.
                                
                            @endswitch
                        </td>
                        <td>
                            @if ($order->status <=1)

                                <form action="/order/update/{{ $order->id }}" method="post">
                                    @csrf 

                                    <input type="hidden" value="4" name="status" id="status">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Cancel Order
                                    </button>
                                </form>
                                
                            @else
                                
                            @endif
                        </td>
                    </tr>

                    
                @endforeach
            </tbody>
        </table>

        @foreach ($orders as $order)
            @if ($order->transaction)
                @include('transaction.seeTransaction')
            @endif
        @endforeach
        
    @else
        <h5 class="text-center">You have not booked any studio</h5>
    @endif

    

</div>
@endsection