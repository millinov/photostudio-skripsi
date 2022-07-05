<div class="row w-100 py-4 px-3">
    
    <h3>Active Booking</h3>
    <hr>

    <div class="border w-100 d-flex justify-content-center">
        <div class="row row-cols-4 my-3 w-100">

            <div class="col d-flex w-100">

                @for($i=1; $i<=4; $i++)

                <div class="card mx-2 my-2">

                    <div class="position-relative mx-1 mt-1">

                        <img src="https://picsum.photos/300/300?random={{ $i-1 }}" alt="..." class=" img-thumbnail card-img-top">
                        <div class="position-absolute px-3 py-2 bottom-0 start-0 text-white" style="background-color: rgba(0, 0, 0, 0.575); border-top-right-radius: 0.375rem; margin-bottom: 0.3rem; margin-left: 0.35rem;">
                            <small>Name</small>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="fs-9">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, nulla?</p>
                        <a href="">Click for more...</a>
                    </div>

                </div>

                @endfor

            </div>

        </div>
    </div>

</div>