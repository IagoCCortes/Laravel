@extends('layouts.app')

@section('content')
<div class="container containerL">
    <div class="row">
        <div class="col-9">
            @foreach($posts as $post)
                <a href="/p/{{$post->id}}">    
                    <div class="border-0 bg-dark rounded p-3 mb-4" style="color: #fff">
                        <div class="mb-8">
                            <h4>{{$post->title}}</h2>
                        </div>
                        <div class="">
                            <img src="/storage/{{$post->image}}" alt="post" class="w-100">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="col-3">
            <div class="sideHead row" style="background-image: url('https://www.redditstatic.com/desktop2x/img/leaderboard/banner-background.png');">
                <h2 class="sideText">{{$user->username}}</h2>
            </div>
            <div class="row border-0 bg-dark rounded-bottom"> 
                <div>
                    <img src="{{$user->profile->profileImage()}}" alt="Profile image" class="w-25 rounded m-2 border">
                </div>
                <div class="ml-2">
                    <div class="mb-1">{{$postCount}} posts</div>
                    <div class="mb-1">{{$userDesc ?? 'Unset'}}</div>
                    <div class="mb-1">{{$followersC}} followers</div>
                    <div class="mb-1">{{$followingC}} following</div>
                    @can('update', $user->profile)
                        <div><a href="/profile/{{$user->id}}/edit">
                                                Edit profile
                        </div></a>
                    @endcan
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
