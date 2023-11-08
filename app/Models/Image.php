<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['path'];

    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }

    

    public function getUrl($w = null, $h = null){
        return Image::getUrlByFilePath($this->path, $w, $h);
    }

    public function getUrlByFilePath($filePath, $w = null, $h = null){
        if (!$w && !$h) {
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$filename}";
        // dd($file);
        return Storage::url($file);
    }
}
