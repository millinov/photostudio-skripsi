<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Review;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Studio extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable =['title','owner','excerpt','desc'];
    protected $guarded =['id'];
    protected $with =['category','user'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('title', 'like', '%' . $filters['search']. '%')
        //                 ->orWhere('desc', 'like', '%' . $filters['search']. '%');
        // }

        // $query->when($filters['search'] ?? false, function($query, $search) {
        //     return $query->where('title', 'like', '%' . $search. '%')
        //                  ->orWhere('desc', 'like', '%' . $search. '%');
        // });

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('desc', 'like', '%' . $search . '%');
             });
         });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['owner'] ?? false, function($query, $owner) {
            return $query->whereHas('user' /* namanya harus sama denagn function yg ada di Model */, function($query) use($owner) {
                $query->where('username', $owner);
            });
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
