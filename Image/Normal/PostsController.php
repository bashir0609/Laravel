<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->authorize('create', Post::class);
        $post = Post::create($this->validateRequest());
        $this->storeImage($post);
        
        return redirect('/profile/'.auth()->user()->id);
    }
    
    private function validateRequest()
    {
        return request()->validate([
            'caption' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }
    
    private function storeImage($post)
    {
        if (request()->has('image')) {
            $post->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
            $image = Image::make(public_path('storage/' . $post->image))->fit(300, 300, null, 'top-left');
            $image->save();
        }
    }

}
