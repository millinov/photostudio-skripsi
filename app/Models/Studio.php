<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    // protected $fillable =['title','owner','excerpt','desc'];
    protected $guarded =['id'];
    protected $with =['category','user'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
           return $query->where('title', 'like', '%' . request('search'). '%')
                        ->orWhere('desc', 'like', '%' . request('search'). '%');
        }
    }

    // relasi model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
