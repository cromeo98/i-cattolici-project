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

        if(array_key_exists('src', $newImage)){
            // salvo l'immagine e ne recupero il percorso
            $img_path = Storage::put('covers', $newImage['src']);
            // salvo il tutto nella tabella apartments
            $newImage['src'] = $img_path;
        }

        $image = new Image();
        $image->fill($newImage);



        dd($image);

        $image->save();

        return redirect()->route('admin.image.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
