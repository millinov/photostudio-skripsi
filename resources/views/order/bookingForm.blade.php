<div class="modal fade" id="createOrderFormModal" name="createOrderFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Create Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="/order/{{ $studio->slug }}" id="createOrderForm">
                @csrf

                <input type="hidden" value="0" name="status" id="status">
                <div class="modal-body row">
                    <div class="col-lg-7">

                        <div class="mb-3">
                            <label for="reservation_date" class="form-label">Booking Date</label>
                            <div class="input-group" id="datePicker" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                <input id="reservation_date" name="reservation_date" type="text" class="form-control @error('reservation_date') is-invalid @enderror" data-td-target="#datePicker" value="{{ old('reservation_date') }}" placeholder="mm/dd/yyyy" required/>
                                <span class="input-group-text" data-td-target="#datePicker" data-td-toggle="datetimepicker">
                                    <i class="bi bi-calendar"></i>
                                </span>

                                @error('reservation_date')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label for="start_time" class="form-label">Start Time</label>
                                <div class="input-group" id="startTime" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                    <input id="start_time" name="start_time" type="text" class="form-control @error('start_time') is-invalid @enderror" data-td-target="#startTime" value="{{ old('start_time') }}" required/>
                                    <span class="input-group-text" data-td-target="#startTime" data-td-toggle="datetimepicker">
                                        <i class="bi bi-clock"></i>
                                    </span>

                                    @error('start_time')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <label for="end_time" class="form-label">End Time</label>
                                <div class="input-group" id="endTime" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                    <input id="end_time" name="end_time" type="text" class="form-control @error('end_time') is-invalid @enderror" data-td-target="#endTime" value="{{ old('end_time') }}" required/>
                                    <span class="input-group-text" data-td-target="#endTime" data-td-toggle="datetimepicker">
                                        <i class="bi bi-clock"></i>
                                    </span>

                                    @error('end_time')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="final_price" class="form-label">Negotiated Price</label>
                            <input type="text" name="final_price" class="form-control @error('final_price') is-invalid @enderror" id="final_price" value="{{ old('final_price') }}" required placeholder="Please chat with the owner for the Price.">
                            
                            @error('final_price')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="downPaymentCheck" onchange="checkDownPayment()">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Down payment
                                </label>
                            </div>
                            <input type="text" name="down_payment" class="form-control @error('down_payment') is-invalid @enderror" id="down_payment" value="{{ old('down_payment') }}" placeholder="Check it if there's down payment." disabled>
                            
                            @error('down_payment')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <input id="desc" type="text" name="desc" class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc') }}">

                            @error('desc')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="mb-3">
                            <label for="images" class="form-label">Studio's image</label>
                            @if ($studio->images->isNotEmpty())
                            <div id="bookingFormCarousel" class="carousel slide w-100 d-flex flex-column justify-content-center align-items-stretch bg-dark border" data-bs-ride="false" style="min-height: 500px;">
                                <div class="carousel-indicators">
                                    
                                    @if ($studio->images)
                                        <button type="button" data-bs-target="#bookingFormCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        @for ($i = 1; $i < $studio->images->count(); $i++)
                                            <button type="button" data-bs-target="#bookingFormCarousel" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button> 
                                        @endfor
                                    @else
                                        <button type="button" data-bs-target="#bookingFormCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        @for ($i = 1; $i <=2; $i++ )
                                            <button type="button" data-bs-target="#bookingFormCarousel" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                                        @endfor
                                        
                                    @endif
                    
                                </div>
                                <div class="carousel-inner d-flex align-items-center h-100">

                                    @if ($studio->images)

                                        <div class="carousel-item active">
                                            <img src="{{ asset('storage/') .'/' . $studio->images[0]->path }}" class="d-block w-100" alt="{{ $studio->category->name }}">
                                        </div>
                                        @foreach ($studio->images->skip(1) as $image)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/') .'/' . $image->path }}" class="img-responsived-block w-100" alt="{{ $studio->category->name }}">
                                            </div>
                                        @endforeach
                                        
                                    @else

                                        <div class="carousel-item active">
                                            <img src="https://picsum.photos/1200/700?random=0" class="d-block w-100" alt="{{ $studio->category->name }}">
                                        </div>
                                        @for ($i = 1; $i <=2; $i++ )
                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/1200/700?random={{ $i }}" class="d-block w-100" alt="{{ $studio->category->name }}">
                                            </div>
                                        @endfor
                                        
                                    @endif
                    
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#bookingFormCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#bookingFormCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                    
                            </div>
                            @else
                                <img src="https://picsum.photos/1200/600?random={{ $studio->id }}" class="img-fluid" alt="{{ $studio->category->name }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Booking</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    new tempusDominus.TempusDominus(document.getElementById('datePicker'), {
        display: {
            components: {
                clock: false,
                decades: false
            }
        },
        restrictions: {
            minDate: Date.today()
        }
    });

    new tempusDominus.TempusDominus(document.getElementById('startTime'), {
        display: {
            viewMode: 'clock',
            components: {
                decades: false,
                year: false,
                month: false,
                date: false,
                hours: true,
                minutes: true,
                seconds: false,
                useTwentyfourHour: true
            }
        }
    });

    new tempusDominus.TempusDominus(document.getElementById('endTime'), {
        display: {
            viewMode: 'clock',
            components: {
                decades: false,
                year: false,
                month: false,
                date: false,
                hours: true,
                minutes: true,
                seconds: false,
                useTwentyfourHour: true
            }
        }
    });

    const downPaymentForm = document.getElementById('down_payment');
    const price = document.querySelector('#final_price');
    const fullP = document.querySelector('#full_payment');

    price.addEventListener('change', function() {
        fullP.value = price.value;
    });

    @if($errors->any())
        $(document).ready(function(){
                $("#createOrderFormModal").modal('show');
        });
    @endif

    function checkDownPayment()
    {
        if(downPaymentForm.disabled) {
            downPaymentForm.disabled = false;
        }
        else{
            downPaymentForm.disabled = true;
        }
    }
</script>