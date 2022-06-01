<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    // protected $fillable =['title','owner','excerpt','desc'];
    protected $guarded =['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
