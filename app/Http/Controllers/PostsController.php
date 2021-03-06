<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        /*$users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = [];

        foreach($users as $user){
            $posts = array_merge($posts, Post::where('user_id', '=', $user)->get());
        }*/

        //select p.id as post, pu.id as liked, (select count(post_id) from post_user where post_id = p.id) as likes,image 
        //from posts p left join post_user pu on p.id = pu.post_id and pu.user_id = 2 
        //where p.user_id in (select follower_id from followers where following_id = 2);
        //$posts = Post::whereIn('user_id', $users)->latest()->get();
        //use this for pagination
        /*$posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);
        <div class="row col-9">
        {{$posts->links()}}
        </div>*/

        /*$likes = [];
        
        foreach($posts as $post){
            $likes = array_merge($likes, (array) (auth()->user() ? auth()->user()->likes->contains($post->id) : false));
        }*/

        $posts = new Post;
        $result = $posts->getIndexPosts();

        dd($result);
        
        //$likes = auth()->user() ? auth()->user()->likes()->pluck('posts.id') : false;

        return view('posts.index', compact('posts', 'likes'));
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

        return redirect('/');
    }

    //using laravel route model binding
    public function show(Post $post){
        $likes = auth()->user() ? auth()->user()->likes->contains($post->id) : false;

        return view('posts.show', compact('post', 'likes'));
        //compact('post') equal to ['post' => $post]
    }
}
