<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait uploadImage
{

    function uploadImg(Request $r, $inputImage, $oldPath = null, $path = '/upload')
    {
        // dd($oldPath->getClientOriginalExtension());
        echo $r->inputImage;
        if ($r->hasFile($inputImage)) {
            $image = $r->{$inputImage};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;
            $image->move(public_path($path), $imageName);

            if ($oldPath && File::exists(public_path($oldPath)) && strpos($oldPath, '/default') !== 0) {
                File::delete(public_path($oldPath));
            }
            return $path . '/' . $imageName;
        }
        return null;
    }

    function uploadMultipleImg(Request $r, $inputImage, $oldPath = null, $path = '/upload')
    {

        if ($r->hasFile($inputImage)) {
            $images = $r->{$inputImage};
            $paths = [];
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;
                $image->move('upload', $imageName);
                array_push($paths,$path . '/' . $imageName);
            }
            return $paths;
        }
        return null;
    }
}
