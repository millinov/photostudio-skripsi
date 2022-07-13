<div class="modal fade" id="createTransactionModal" name="createTransactionModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Create Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="/transaction/{{ $order->id }}" id="createOrderForm" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="2" name="status" id="status">
                <div class="modal-body row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="transaction_date" class="form-label">Transaction Date</label>
                            <div class="input-group" id="datePicker" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                <input id="transaction_date" name="transaction_date" type="text" class="form-control @error('transaction_date') is-invalid @enderror" data-td-target="#datePicker" value="{{ old('transaction_date') }}" placeholder="mm/dd/yyyy" required/>
                                <span class="input-group-text" data-td-target="#datePicker" data-td-toggle="datetimepicker">
                                    <i class="bi bi-calendar"></i>
                                </span>

                                @error('transaction_date')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="receipt_full_payment" class="form-label">Full Payment's Receipt</label>
                            <input class="form-control" type="file" id="receipt_full_payment" name="receipt_full_payment" required>

                            @error('receipt_full_payment')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        @if ($order->down_payment != null)

                            <div class="mb-3">
                                <label for="receipt_down_payment" class="form-label">Down Payment's Receipt</label>
                                <input class="form-control" type="file" id="receipt_down_payment" name="receipt_down_payment">

                                @error('receipt_down_payment')
                                    <div class="invalid-feedback mb-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                        @endif

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invoiceCheck" name="invoiceCheck" value="{{ old('invoiceCheck') }}" onchange="checkInvoice()">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Invoice
                                </label>
                            </div>
                            <input class="form-control" type="file" id="invoice" name="invoice">
                            
                            @error('invoice')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit Transaction</button>
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
                decades: false,
            },
            theme: 'light'
        },
        restrictions: {
            minDate: Date.today()
        }
    });

    const invoiceForm = document.getElementById('invoice');
    const invoiceCheck = document.getElementById('invoiceCheck');

    @if($errors->any())
        $(document).ready(function(){
                $("#createTransactionModal").modal('show');
        });
    @endif
    
    if(invoiceCheck.checked == true)
    {
        invoiceForm.disabled = false;
    }
    else{
        invoiceForm.disabled = true;
    }

    function checkInvoice()
    {
        if(invoiceForm.disabled) {
            if(invoiceCheck.checked == false) {
                invoiceForm.disabled = true;
            }
            else {
                invoiceForm.disabled = false;
            }
        }
        else{
            if(invoiceCheck.checked == false) {
                invoiceForm.disabled = false;
            }
            else {
                invoiceForm.disabled = true;
            }
        }
    }

</script>