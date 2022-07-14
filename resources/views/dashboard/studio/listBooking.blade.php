<div class="row w-100 py-4 px-3">
    
    <h3>Active Booking</h3>
    <hr>

    <div class="border w-100 d-flex justify-content-center">
        <div class="row row-cols-3 my-3 w-100">

            @if ($orders->count())
                @foreach ($orders as $order)
                    <div class="col d-flex">

                        <div class="card mx-2 my-2">

                            <div class="position-relative mx-1 mt-1">

                                {{-- <img src="@if($order->user->profile_pic != null) {{ asset('storage/') .'/' . $order->user->profile_pic }} @else {{ asset('img/image-about.jpg') }} @endif" alt="..." class=" img-thumbnail card-img-top"> --}}
                                <div class="img-thumbnail card-img-top" style="max-width: 100%; max-height: 250px; overflow: hidden;">
                                    <img src="@if($order->user->profile_pic) {{ asset('storage/') .'/' . $order->user->profile_pic }} @else {{ asset('img/image-about.png') }} @endif" alt="{{ auth()->user()->username }}"style="height: 250px;" class="d-block m-auto">
                                </div>
                                <div class="position-absolute px-3 py-2 bottom-0 start-0 text-white" style="background-color: rgba(0, 0, 0, 0.575); border-top-right-radius: 0.375rem; margin-bottom: 0.1rem; margin-left: 0.5rem;">
                                    <small>{{ $order->user->name }}</small>
                                </div>

                            </div>

                            <div class="card-body">
                                <p class="fs-9">{{ $order->desc }}</p>
                                <span>Status:
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
                                </span>
                                <a href="/order/{{ $order->id }}" class="mt-2">Click for more...</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            @else
                <h3>No booking yet.</h3>
                <hr>
            @endif
            
        </div>

    </div>
</div>
