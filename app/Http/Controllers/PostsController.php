<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()->validate([
            //in case i have a field that does not require validation
            //'field' => '',
            'title' => 'required',
            'image' => ['required','image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        //$image = Image::make(public_path('storage/{{$imagePath}}'))->fit(1200, 1200);
        //$image->save();

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'image' => $imagePath,
        ]);

        //\App\Post::create($data);

        return redirect('feed/' . auth()->user()->id);
    }

    //using laravel route model binding
    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
        //compact('post') equal to ['post' => $post]
    }
}
