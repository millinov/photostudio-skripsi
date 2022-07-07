<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Studio;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class StudioController extends Controller
{
    public function katalog()
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
            "studios" => Studio::latest()->filter(request(['search', 'category', 'owner']))->paginate(7)->withQueryString()
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

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Studio::class, 'slug',  $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function index()
    {
        $studio = Studio::where('user_id', auth()->user()->id)->latest()->first();

        if($studio === null)
        {
            return view('dashboard.studio.index', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'studio' => $studio,
                'categories' => Category::all()
            ]);
        }
        else
        {
            return redirect()->route('studio', [$studio]);
        }

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
        // return $request->file('image')->store('studio-images');
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:studios',
            'category_id' => 'required',
            'address' => 'required',
            'images' => 'required',
            'images.*' => 'required|image||mimes:jpeg,png,jpg,gif,svg|max:10240',
            'desc' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->desc, 100, '...');
        $validatedData['published_at'] = Carbon::now()->toDateTimeString();

        $validatedStudio = Arr::except($validatedData, ['images']);
        $validatedImage = [];

        Studio::create($validatedStudio);
        $studio = Studio::where('user_id', auth()->user()->id)->latest()->first();

        if($request->images)
        {
            foreach($request->images as $image)
            {
                $validatedImage['path'] = $image->store('studio-images');
                $validatedImage['studio_id'] = $studio->id;
                Image::create($validatedImage);
            }
        }

        return redirect()->route('studio', [$studio])->with('success', 'Studio has been made!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        return view('dashboard.studio.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'studio' => $studio,
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function edit(Studio $studio)
    {
        
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
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'address' => 'required',
            'images' => 'required',
            'images.*' => 'required|image||mimes:jpeg,png,jpg,gif,svg|max:10240',
            'desc' => 'required'
        ];

        $newSlug = $studio->slug;

        if($request->slug != $studio->slug)
        {
            $rules['slug'] = 'required|unique:studios';
            $newSlug = $request->slug;
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->desc, 100, '...');
        $validatedStudio = Arr::except($validatedData, ['images']);
        $validatedImage = [];

        Studio::where('id', $studio->id)
                ->update($validatedStudio);

        if($request->images)
        {
            if($request->oldImage)
            {
                $currImage = Image::where('studio_id', $studio->id);
                foreach($request->oldImage as $studioImage)
                {
                    Storage::disk('public')->delete($studioImage);
                }
                $currImage->delete();
            }

            foreach($request->images as $image)
            {
                $validatedImage['path'] = $image->store('studio-images');
                $validatedImage['studio_id'] = $studio->id;
                Image::create($validatedImage);
            }
        }

        return redirect()->route('studio', $newSlug)->with('success', 'Studio has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studio $studio)
    {
        $image = Image::where('studio_id', $studio->id);
        $image->delete();
        $studio->delete();

        return redirect('dashboard/studio')->with('success', 'Studio has been deleted!');
    }
}
