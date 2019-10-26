@extends('layouts.app')

@section('content')
<div class="container containerL">
    <div class="row">
        <div class="col-9">{{$user->username}}</div>
        <div class="col-3">
            <div class="sideHead" style="background-image: url('https://www.redditstatic.com/desktop2x/img/leaderboard/banner-background.png');">
                <h2 class="sideText">Spotify</h2>
            </div>
            <div>
                <div>{{$user->posts->count()}} posts</div>
                <div>{{$user->profile->description ?? 'Unset'}}</div>
                <div><a href="/profile/{{$user->profile->id}}/edit">
                                        Edit profile
                </div></a>
            </div>
        </div>
    </div>
</div>
@endsection