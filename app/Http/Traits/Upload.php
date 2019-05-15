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
        // try {
        //     if (!is_dir($path . '_custom/')) {
        //         mkdir($path . '_custom/');
        //     }
        //     $img = Image::make($file->getRealPath())
        //         ->resize(200, 200);
        //     Storage::disk('public')->putFileAs($path, $img, $filename);
        //     $data["image_custom"] = $path . '_custom/' . $filename;
        // } catch (\Exception $e) {
        // }
        Storage::disk('public')->putFileAs($path, $file, $filename);
        $data['image'] = 'storage/' . $path . '/' . $filename;

        return $data;
    }
}
