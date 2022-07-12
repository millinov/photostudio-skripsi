<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $validatedData = [
            'transaction_date' => 'required|date_format:m/d/Y|after_or_equal:today',
            'receipt_full_payment' => 'required|file|max:10240',
        ];

        $invoice = null;
        $receiptDownPayment = null;

        if($request->receipt_down_payment)
        {
            $validatedData['receipt_down_payment'] = 'required|file|max:10240';
            $receiptDownPayment = $request->receipt_down_payment->store('receipt/down-payment');
        }

        if($request->invoice)
        {
            $validatedData['invoice'] = 'required|file|max:10240';
            $invoice = $request->invoice->store('invoices');
        }

        $status = $request->validate([
            'status' => 'required|max:5',
        ]);

        $validatedTransaction = $request->validate($validatedData);

        $validatedTransaction['transaction_date'] = Carbon::createFromFormat('m/d/Y', $request->transaction_date)->format('Y-m-d');
        $validatedTransaction['receipt_down_payment'] = $receiptDownPayment;
        $validatedTransaction['receipt_full_payment'] = $request->receipt_full_payment->store('receipt/full-payment');
        $validatedTransaction['invoice'] = $invoice;
        $validatedTransaction['order_id'] = $order->id;
        $validatedTransaction['user_id'] = $order->user->id;

        Transaction::create($validatedTransaction);
        Order::where('id', $order->id)->update(['status' => $status['status']]);

        return redirect()->route('studio', [$order->studio])->with('success', 'Order by '. $order->user->name.' has been updated!');
    }

    public function fpDownload(Transaction $transaction)
    {
        $filePath = $transaction->receipt_full_payment;
        return Storage::download($filePath);
    }

    public function dpDownload(Transaction $transaction)
    {
        $filePath = $transaction->receipt_down_payment;
        return Storage::download($filePath);
    }

    public function ivDownload(Transaction $transaction)
    {
        $filePath = $transaction->invoice;
        return Storage::download($filePath);
    }
}
