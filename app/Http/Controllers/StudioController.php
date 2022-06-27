<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Studio;
use App\Models\User;

class StudioController extends Controller
{
    public function browseIndex()
    {
        //dd(request('search')); -> buat liat kalo ada dpt searchnya
        $title = "";
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title =  'in ' . $category->name;
        }

        if (request('owner')) {
            $owner = User::firstWhere('username', request('owner'));
            $title =  'by ' . $owner->name;
        }

        return view('katalog', [
            "title" => "All Studio " .  $title,
            "active" => 'studios',
            // "catalogue" => Studio::all()
            "catalogue" => Studio::latest()->filter(request(['search', 'category', 'owner']))->paginate(7)->withQueryString()
        ]);
    }

    public function showPage(Studio $studio)
    {
        return view('studio',[
            "title" => "Studio Foto",
            "active" => 'studios',
            "studio" => $studio
        ]);
    }

    public function index()
    {
        return view('dashboard.studio.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'studio' => Studio::where('user_id', auth()->user()->id)->latest()->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function edit(Studio $studio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studio $studio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studio $studio)
    {
        //
    }
}
