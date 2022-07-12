<div class="row w-100 py-4 px-3">
    
    <h3>Active Booking</h3>
    <hr>

    <div class="border w-100 d-flex justify-content-center">
        <div class="row row-cols-3 my-3 w-100">

            @foreach ($studio->orders as $order)
                <div class="col d-flex">

                    <div class="card mx-2 my-2">

                        <div class="position-relative mx-1 mt-1">

                            <img src="https://picsum.photos/300/300?random={{ $loop->iteration }}" alt="..." class=" img-thumbnail card-img-top">
                            <div class="position-absolute px-3 py-2 bottom-0 start-0 text-white" style="background-color: rgba(0, 0, 0, 0.575); border-top-right-radius: 0.375rem; margin-bottom: 0.3rem; margin-left: 0.35rem;">
                                <small>{{ $order->user->name }}</small>
                            </div>

                        </div>

                        <div class="card-body">
                            <p class="fs-9">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, nulla?</p>
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

                                    @default
                                        You have not confirmed your booking.
                                    
                                @endswitch
                            </span>
                            <a href="/order/{{ $order->id }}" class="mt-2">Click for more...</a>
                        </div>
                    </div>

                </div>
            @endforeach
            
        </div>

    </div>
</div>
