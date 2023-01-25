<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Photo extends Model
{
    use HasFactory;

    // @override delete
    public function delete()
    {
        File::delete(public_path($this->path));
        return parent::delete();
    }

    protected $fillable = ['path','name'];
}
