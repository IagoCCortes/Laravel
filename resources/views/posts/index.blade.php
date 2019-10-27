@extends('layouts.app')

@section('content')
<div class="container">
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
            <div class="sideHead" style="background-image: url('https://www.redditstatic.com/desktop2x/img/leaderboard/banner-background.png');">
                <h2 class="sideText">Spotify</h2>
            </div>
            <div>
            </div>
        </div>
    </div>
</div>
@endsection
