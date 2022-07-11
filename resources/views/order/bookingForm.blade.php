<div class="modal fade" id="createOrderFormModal" name="createOrderFormModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Create Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="" id="createOrderForm">
                @csrf

                <input type="hidden" value="0" name="status" id="status">
                <div class="modal-body row">
                    <div class="col-lg-7">

                        <div class="mb-3">
                            <label for="datePickerInput" class="form-label">Booking Date</label>
                            <div class="input-group" id="datePicker" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                <input id="datePickerInput" name="datePickerInput" type="text" class="form-control @error('datePickerInput') is-invalid @enderror" data-td-target="#datePicker" value="{{ old('datePicker') }}" required/>
                            
                                @error('datePickerInput')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <span class="input-group-text" data-td-target="#datePicker" data-td-toggle="datetimepicker">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col">
                                <label for="startTimeInput" class="form-label">Start Time</label>
                                <div class="input-group" id="startTime" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                    <input id="startTimeInput" name="startTimeInput" type="text" class="form-control @error('startTimeInput') is-invalid @enderror" data-td-target="#startTime" value="{{ old('startTimeInput') }}" required/>

                                    @error('startTimeInput')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <span class="input-group-text" data-td-target="#startTime" data-td-toggle="datetimepicker">
                                        <i class="bi bi-clock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col">
                                <label for="endTimeInput" class="form-label">End Time</label>
                                <div class="input-group" id="endTime" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                    <input id="endTimeInput" name="endTimeInput" type="text" class="form-control @error('endTimeInput') is-invalid @enderror" data-td-target="#endTime" value="{{ old('endTimeInput') }}" required/>

                                    @error('endTimeInput')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <span class="input-group-text" data-td-target="#endTime" data-td-toggle="datetimepicker">
                                        <i class="bi bi-clock"></i>
                                    </span>
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
                            <label for="full_payment" class="form-label">Full Payment</label>
                            <input type="text" name="full_payment" class="form-control @error('full_payment') is-invalid @enderror" id="full_payment" value="{{ old('full_payment') }}" required readonly>
                            
                            

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

                    </div>

                    <div class="col-lg-5">
                        <div class="mb-3">
                            <label for="images" class="form-label">Studio's image</label>
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
                seconds: false
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
                seconds: false
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