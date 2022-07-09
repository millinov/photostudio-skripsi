<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug',  $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:App\Models\Category,name',
            'slug' => 'required|unique:App\Models\Category,name'
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories/');
    }
}
