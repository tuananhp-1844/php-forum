<?php

namespace App\Http\Controllers\Languages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Languages\LanguageRequest;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LanguageRequest $request)
    {
        session(['website_language' => $request->lang]);
        return redirect()->back();
    }
}
