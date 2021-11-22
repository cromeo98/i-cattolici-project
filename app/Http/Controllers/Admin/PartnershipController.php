<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partnership;
use Illuminate\Support\Facades\Storage;


class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnership = Partnership::all();
        return view('admin.partnership.index', compact('partnership'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partnership.create');
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
            'partner' => 'required|max:255',
            'description' => 'required',
            'img'=> 'nullable|image'
        ]);

        $newPartnership = $request->all();

        $partnership = new Partnership();

        if(array_key_exists('img', $newPartnership)){
            $sponsorPath = Storage::put('sponsorImg', $newPartnership['img']);
            $newPartnership['sponsorImg'] = $sponsorPath;
        } 

        $partnership->fill($newPartnership);

        $partnership->save();

        return redirect()->route('admin.partnership.index')->with('create', 'Lo Sponsor ' . $partnership->partner . ' è stato aggiunto con successo!');;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partnership $partnership)
    {
        return view('admin.partnership.show', compact('partnership'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnership $partnership)
    {
        return view('admin.partnership.edit', compact('partnership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partnership $partnership)
    {
        $request->validate([
            'partner' => 'required|max:255',
            'description' => 'required',
            'img'=> 'nullable|image'
        ]);

        $editPartnership = $request->all();

        // carico le modifiche nel DB
        $partnership->update($editPartnership);

        return redirect()->route('admin.partnership.index')->with('edit', 'Lo Sponsor ' . $partnership->partner . ' è stato modificato con successo!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partnership $partnership)
    {
        $partnership->delete();

        return redirect()->route('admin.partnership.index')->with('delete', 'Lo Sponsor ' . $partnership->partner . ' è stato eliminato con successo!');
    }
}
