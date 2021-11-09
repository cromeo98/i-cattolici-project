<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Image::all();
        
        return view('admin.image.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'src' => 'required'
        ]);

        $newImage = $request->all();

        // dd($newImage);

        $baseSlug = Str::slug($newImage['title'], '-');

        $newSlug = $baseSlug;
        $counter = 0;
        while(Image::where('slug', $newSlug)->first()){
            $counter++;
            $newSlug = $baseSlug . '-' . $counter;
        }

        $newImage['slug'] = $newSlug;

        $newImage['alt'] = $newImage['title'];

        if(!isset($newImage['is_visible'])){
            $newImage['is_visible'] = 0;
        } else{
            $newImage['is_visible'] = 1;
        }



        $image = new Image();
        // salvo l'immagine e ne recupero il percorso
        $img_path = Storage::put('public', $newImage['src']);
        // salvo il tutto nella tabella image
        $newImage['src'] = $img_path;

        $image->fill($newImage);

        $image->save();

        return redirect()->route('admin.image.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('admin.image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('admin.image.index');
    }
}
