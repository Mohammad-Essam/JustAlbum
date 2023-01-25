<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('index',['albums'=> Album::with('photos')->withCount('photos')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $album = Album::create(['name' => $request->name]);
        return back();
    }

    public function show(Album $album)
    {
        // return $album->with('photos')->withCount('photos')->get();
        return view('album',['album' => $album->with('photos')->get()]);
    }
    public function getMoveThenDestroy($id)
    {
        return view('components.returnedAlbums',['id' => $id]);
    }
    public function moveThenDestroy($album_id, $reciever_id)
    {
        $album = Album::find($album_id);
        $album->moveAllElementsToAlbum(Album::find($reciever_id));
        $album->delete();
        return back();
    }


    public function destroy(Request $request)
    {
        $album = Album::find($request->album_id);
        foreach ($album->photos as $photo ) {
            $photo->delete();
        }
        $album->delete();
        return back();
    }
}


