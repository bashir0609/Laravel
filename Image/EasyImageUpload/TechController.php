<?php

namespace App\Http\Controllers;

use App\Tech;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TechController extends Controller
{
    public function index()
    {
        $techs = Tech::all()->sortByDesc('created_at');
        return view('tech.index', compact('techs'));
    }
    public function create()
    {
        return view('tech.create');
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);

        $tech = new Tech;
        $tech->title = request()->title;
        if (request()->hasFile('image')) {  
            $tech->image = request()->image->store('public/images');
        }
        $tech->save();

        return redirect('/tech');
    }
}
