<div class="modal fade" id="seeTransactionModal-{{ $order->transaction->id }}" name="seeTransactionModal-{{ $order->transaction->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Transaction: {{ $order->transaction->transaction_date }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="mb-3 d-flex flex-column">
                        <label for="transaction_date" class="form-label">Full Payment Receipt</label>
                        <a href="/receipt/fp/{{ $order->transaction->id }}" class="btn btn-primary text-decoration-none me-2">Download</a>
                    </div>
                </div>

                <div class="col-md-6">

                    @if ($order->transaction->receipt_down_payment != null)

                        <div class="mb-3 d-flex flex-column">
                            <label for="transaction_date" class="form-label">Down Payment Receipt</label>
                            <a href="/receipt/dp/{{ $order->transaction->id }}" class="btn btn-primary text-decoration-none me-2">Download</a>
                        </div>
                        
                    @endif

                    @if ($order->transaction->invoice != null)

                        <div class="mb-3 d-flex flex-column">
                            <label for="transaction_date" class="form-label">Down Payment Receipt</label>
                            <a href="/receipt/iv/{{ $order->transaction->id }}" class="btn btn-primary text-decoration-none me-2">Download</a>
                        </div>
                        
                    @endif

                </div>
            </div>

            @if ($order->status === 3)
                @cannot('seller')
                    @if (!$order->review)
                        <div class="modal-footer">
                            <a href="/review/{{ $order->id}}" class="btn btn-primary text-decoration-none me-2">Create Review</a>
                        </div>
                    @endif
                @endcannot
            @endif

        </div>
    </div>
</div>
