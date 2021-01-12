<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;
class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $keyword = $request->keyword;
        if (isset($keyword)){
            $bands = Band::bandSearch($keyword);
        } 
        else {
            $bands = Band::all();
        }
        
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
    public function store(Request $request){
        $request->validate([
            'band_name'=>'required',
            'music_genres'=>'required',
            'description'=>'required',
            'biography'=>'required',       
        ]);

        $band= Band::create($request->all());
        
        if (request('band_image') != '') {
            $path = $request->file('band_image')->store('band_imgs');          
            $band->band_image = $path;
        }
        
        $video_1 = $request->video_1;
        $video_2 = $request->video_2;
        $video_3 = $request->video_3;

        if (isset($video_1)) {
            $video_1_str = explode("=", $video_1);
            $band->video_1 = $video_1_str[1];
        }
        if (isset($video_2)) {
            $video_2_str = explode("=", $video_2);
            $band->video_2 = $video_2_str[1];
        }
        if (isset($video_3)) {
            $video_3_str = explode("=", $video_3);
            $band->video_3 = $video_3_str[1];
        }
        
        auth()->user()->bands()->attach($band);
        $band->save();
        
        return redirect('/bands/'.$band->id)->with('success', 'Band is bewaard!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Band $band){
    
        return view('bands.show', compact('band'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band){
        return view('bands.edit', compact('band'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band){   
        
        if (request('band_image') != '') {
            
            $path = $request->file('band_image')->store('band_imgs'); 
            $band->update($request->all());
            $band->band_image = $path;
        }
        else{
            $band->update($request->all());
        }
        
        $video_1 = $request->video_1;
        $video_2 = $request->video_2;
        $video_3 = $request->video_3;
        
        $request->validate([
            'band_name'=>'required',
            'music_genres'=>'required',
            'description'=>'required',
            'biography'=>'required',
        ]);

        if (isset($video_1)) { 
            if(strpos($video_1, '=') !== false) {
                $video_1_str = explode("=", $video_1);
                $band->video_1 = $video_1_str[1];
            }
            else {
                $band->video_1 = $video_1;
            }
        }
        if (isset($video_2)) {
            if(strpos($video_2, '=') !== false) {
                $video_2_str = explode("=", $video_2);
                $band->video_2 = $video_2_str[1];
            } 
            else {
                $band->video_2 = $video_2;
            }
        }
        if (isset($video_3)) {
            if(strpos($video_3, '=') !== false) {
                $video_3_str = explode("=", $video_3);
                $band->video_3 = $video_3_str[1];
            } 
            else {
                $band->video_3 = $video_3;
            }
        }

        $band->save();

        return redirect('/bands/'.$band->id)->with('success', 'Band is aangepast!');
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
        auth()->user()->bands()->detach($band);
        return redirect('/bands')->with('message', 'Band is verwijderd!');

    }

    public function addUser(Band $band)   
    {
        auth()->user()->bands()->attach($band);
        return redirect()->route('bands.index')->with('message','Gebruiker Toegevoed');
    
    }

    public function removeUser(Band $band)   
    {
        auth()->user()->bands()->detach($band);
        return redirect()->route('bands.index')->with('message','Gebruiker Verwijderd');
    
    }

}
