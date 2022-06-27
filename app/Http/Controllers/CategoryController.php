<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        return view('categories',[
            'title' => 'Kategori Studio',
            'active' => "categories",
            'categories' => Category::all()
        ]);
    }
}
