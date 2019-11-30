<?php

namespace App\Http\Controllers;

use Image;
use App\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function create()
    {
        return view('images.create');        
    }

    public function store(Request $request)
    {
        $imgName = request()->file->getClientOriginalName();
        $rename = time().$imgName;
        request()->file->move(public_path('images'), $rename);
    	return response()->json(['uploaded' => '/images/'.$rename]);
    }
}
