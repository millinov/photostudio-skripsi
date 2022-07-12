<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request, User $user)
    {
        $validatedData = [
            'status' => 'required|max:10',
            'reservation_date' => 'required|date_format:m/d/Y|after_or_equal:today',
            'start_time' => 'required|date_format:H:i|before:end_time',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'final_price' => 'required',
            'desc' => 'max:255',
        ];
    }
}
