<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $follows = auth()->user() ? auth()->user()->following->contains($user->profile->id) : false;

        //without cache
        /*$postCount = $user->posts->count();
        $userDesc = $user->profile->description;
        $followersC = $user->profile->followers->count();
        $followingC = $user->following->count();*/

        //with cache, rememberForever
        $postCount = Cache::remember(
            'count.posts' . $user->id, 
            now()->addSeconds(30), 
            function() use ($user) {
                return $user->posts->count();
            });

        $userDesc = Cache::remember(
            'desc.user' . $user->id, 
            now()->addSeconds(30), 
            function() use ($user) {
                return $user->profile->description;
            });

        $followersC =Cache::remember(
            'count.followers' . $user->id, 
            now()->addSeconds(30), 
            function() use ($user) {
                return $user->profile->followers->count();
            });

        $followingC =Cache::remember(
            'count.following' . $user->id, 
            now()->addSeconds(30), 
            function() use ($user) {
                return $user->following->count();
            });

        $posts = Post::where('user_id', $user->id)->latest()->get();
        
        //App\User substitutes code below
        //$user = User::findOrFail($user);
        //using only User because of 'use App\User;'
        return view('profiles.show', compact('user', 'follows', 'postCount', 'userDesc', 'followersC', 'followingC', 'posts'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            //in case i have a field that does not require validation
            //'field' => '',
            //'url' => 'url'
            'description' => 'required',
            'image' => ''
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
