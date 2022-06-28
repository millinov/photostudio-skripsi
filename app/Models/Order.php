<?php

namespace App\Models;

use App\Models\User;
use App\Models\Studio;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $with =['studio','user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
