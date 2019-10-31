<?php

namespace App\Http\Controllers;

use App\Post;

class LikesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Post $post){
        return auth()->user()->likes()->toggle($post);
    }
}
