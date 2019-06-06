<?php

namespace App\Http\Controllers\Questions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;

class UploadController extends Controller
{
    use Upload;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $image = $this->upload($request->file, config('asset.question_folder'));

        return env('APP_URL') . '/' . config('asset.question_path') . $image;
    }
}
