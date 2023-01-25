<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Album extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function moveAllElementsToAlbum(Album $album)
    {
        $photos = Photo::where('album_id',$this->id)->get();
        File::exists(public_path("uploads/$album->id/"))?:File::makeDirectory(public_path("uploads/$album->id/"));
        if($photos)
        {
            foreach ($photos as $photo ) {
                $pathParts = explode('/',$photo->path);
                $newPath = "uploads/$album->id/" .end($pathParts);
                File::move(public_path($photo->path), public_path($newPath));
                $photo->album_id = $album->id;
                $photo->path = $newPath;
                $photo->save();
            }
            return true;
        }
        return false;
    }

    protected $fillable = ['user_id', 'name',];
}
