<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Studio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function history()
    {
        return view('dashboard.history.history', [
            "title" => "history",
            "active" => 'history',
            "orders" => Order::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function show(Order $order)
    {
        return view('order.bookingDetail', [
            "title" => "Order Detail",
            "active" => 'studios',
            "order" => $order,
        ]);
    }

    public function update(Request $request,Order $order)
    {
        $status = $request->validate([
            'status' => 'required|max:5',
        ]);

        Order::where('id', $order->id)->update(['status' => $status['status']]);
        
        return redirect()->route('studio', [$order->studio])->with('success', 'Order by '. $order->user->name.' has been updated!');
    }

    public function store(Request $request, Studio $studio)
    {
        $validatedData = [
            'status' => 'required|max:10',
            'reservation_date' => 'required|date_format:m/d/Y|after_or_equal:today',
            'start_time' => 'required|date_format:H:i|before:end_time',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'final_price' => 'required',
            'desc' => 'max:255',
        ];

        $downPayment = null;

        if($request->down_payment)
        {
            $validatedData['down_payment'] = 'required|lt:final_price';
            $downPayment = $request->down_payment;
        }

        $validatedOrder = $request->validate($validatedData);

        $validatedOrder['down_payment'] = $downPayment;
        $validatedOrder['reservation_date'] = Carbon::createFromFormat('m/d/Y', $request->reservation_date)->format('Y-m-d');
        $validatedOrder['studio_id'] = $studio->id;
        $validatedOrder['user_id'] = auth()->user()->id;

        Order::create($validatedOrder);

        return redirect('/dashboard/history')->with('success', 'Order has been created');;
    }
}
