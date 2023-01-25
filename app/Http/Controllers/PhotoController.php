<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(Album $album)
    {
        // in the view it will extract all the photos that are within this album
        return view('album',['album' => $album]);
    }
    public function store(Request $request,Album $album)
    {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,giff',
            'name' => 'required',
        ]);

        //i created a disk named 'public_uploads' thats directly in public to save albums in it.
        //create a file with the id of the album and store the images in it.
        $path = $request->file('photo')->store($album->id,'public_uploads');
        $photo = $album->photos()->create(['path' => 'uploads/'.$path,'name'=>$request->name]);
        return back();
    }

    public function destroy($album,$photo)
    {
        $ph = Photo::find($photo);
        $ph->delete();

        //i overrided the delete function in the photo model to do the cleaning itself
        // File::delete(public_path($ph->path));
        // $ph->delete();
        return back();
    }
}
