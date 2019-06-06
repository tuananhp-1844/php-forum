<?php
namespace App\Http\Traits;

use Image;
use Storage;

trait Upload
{
    public function upload($file, $path)
    {
        $data = [];
        $name = explode('.', $file->getClientOriginalName());
        $name = end($name);
        do {
            $filename = str_random(8) . '.' . $name;
        } while (file_exists($path . $filename));
        
        Storage::disk('public')->putFileAs($path, $file, $filename);

        return $filename;
    }
}
