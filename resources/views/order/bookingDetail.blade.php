@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card d-flex m-auto p-2 justify-content-center flex-column align-items-center" style="background-color: #B7F9F5;">
                <div class="card-body d-flex justify-content-center flex-column align-items-center">

                    <h3 class="card-title text-center mb-3">Booking Detail</h3>

                    <div id="{{ $order->studio->slug . '-carousel' }}" class="carousel slide bg-dark border mx-3 d-flex justify-content-center align-items-center" data-bs-ride="false" style="min-height: 300px; max-height: 400px; max-width: 500px;">
            
                        <div class="carousel-inner d-flex align-items-center ">
            
                            @if ($order->studio->images->isNotEmpty())
            
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/') .'/' . $order->studio->images[0]->path }}" class="d-block w-100" alt="{{ $order->studio->category->name }}">
                                </div>
                                @foreach ($order->studio->images->skip(1) as $image)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block w-100" alt="{{ $order->studio->category->name }}">
                                    </div>
                                @endforeach
                                
                            @else
            
                                <div class="carousel-item active ">
                                    <img src="https://picsum.photos/1200/700?random={{ $order->studio->id }}" class="d-block w-100" alt="{{ $order->studio->category->name }}">
                                </div>
                                @for ($i = 1+$order->studio->id; $i <=2+$order->studio->id; $i++ )
                                    <div class="carousel-item ">
                                        <img src="https://picsum.photos/1200/700?random={{ $i+$order->studio->id }}" class="d-block w-100" alt="{{ $order->studio->category->name }}">
                                    </div>
                                @endfor
                                
                            @endif
            
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="{{'#' . $order->studio->slug . '-carousel' }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="{{'#' . $order->studio->slug . '-carousel' }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
            
                    </div>   

                    <h6 class="card-subtitle my-2 text-muted">{{ $order->studio->title }}</h6>
                    <div class="card-text row">
                        <span class="fs-5 mb-2 text-center">Customer has booked at this timeslot: </span>
                        <table class="table table-striped">
                            <tr>
                                <td>
                                    Date:
                                </td>
                                <td>
                                    Start Time:
                                </td>
                                <td>
                                    End Time:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ $order->reservation_date }}
                                </td>
                                <td>
                                    {{ $order->start_time}}
                                </td>
                                <td>
                                    {{ $order->end_time }}
                                </td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td colspan="2">
                                    @switch($order->status)
                                        @case(0)
                                            You have not confirmed this booking.
                                        @break
                                        @case(1)
                                            You have confirmed this booking, waiting for user's payment.
                                        @break

                                        @case(2)
                                            Transaction has been finished.
                                        @break

                                        @case(3)
                                            Reservation has happened. Order complete.
                                        @break

                                        @case(4)
                                            Order is cancelled.
                                        @break

                                        @default
                                            Order is cancelled.
                                        
                                    @endswitch
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row w-100 mb-3">
                        <span>Description</span>
                        <textarea class="form-control" rows="3"readonly style="resize: none">{{ $order->description }}</textarea>
                    </div>
                    <div class="d-flex w-100 justify-content-around">
                        @if ($order->status < 3)
                            @switch($order->status)
                                @case(0)

                                    <form action="/order/update/{{ $order->id }}" method="post">
                                        @csrf 

                                        <input type="hidden" value="{{ $order->status+1 }}" name="status" id="status">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            Confirm Order
                                        </button>
                                    </form>
                                    
                                    @break
                                @case(1)
                                    <button type="button" class="btn btn-primary btn-lg text-decoration-none ms-2" data-bs-toggle="modal" data-bs-target="#createTransactionModal">
                                        Confirm Payment
                                    </button>
                                    @break
                                
                                @case(2)

                                <form action="/order/update/{{ $order->id }}" method="post">
                                    @csrf 

                                    <input type="hidden" value="3" name="status" id="status">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Complete Reservation
                                    </button>
                                </form>
                                
                                @break

                                <form action="/order/update/{{ $order->id }}" method="post">
                                    @csrf 

                                    <input type="hidden" value="{{ $order->status+1 }}" name="status" id="status">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Confirm Order
                                    </button>
                                </form>
                                    
                            @endswitch

                        @endif

                        @if ($order->transaction != null)
                            <button type="button" class="btn btn-primary btn-lg text-decoration-none mx-2" data-bs-toggle="modal" data-bs-target="#seeTransactionModal-{{ $order->transaction->id }}">
                                See Transaction
                            </button>
                        @endif
                        @if ($order->status != 4)
                            <a href="#" class="btn btn-primary btn-lg text-decoration-none me-2">Chat</a>
                        @endif
                        <a href="/dashboard/studio/{{ $order->studio->slug }}" class="btn btn-primary btn-lg text-decoration-none">Return to Studio</a>
                    </div>
                </div>
            </div>
        </div>

        @include('transaction.createTransaction')
        
        @if ($order->transaction != null)
            @include('transaction.seeTransaction')
        @endif

    </div>
@endsection