<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();

        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
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
            'band_name'=>'required',
            'music_genres'=>'required',
            'description'=>'required',
            'biography'=>'required',
            // 'band_img'=>'required'
            
            ]);

            Band::create($request->all());
            return redirect()->route('bands.index')->with('success', 'band is bewaard!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band)
    {
    
        return view('bands.show', compact('band'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band)
    {
        $request->validate([
            'band_name'=>'required',
            'music_genres'=>'required',
            'description'=>'required',
            'biography'=>'required',
            // 'band_img'=>'required'
            ]);
            
            $band->update($request->all());
        
            return redirect('/bands')->with('success', 'Band is aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $band->delete();
        return redirect('/bands')->with('success', 'band is verwijderd!');

    }
}
