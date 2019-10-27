@extends('layouts.app')

@section('content')
<div class="container containerL">
    <div class="row">
        <div class="col-9">{{$user->username}}</div>
        <div class="col-3">
            <div class="sideHead row" style="background-image: url('https://www.redditstatic.com/desktop2x/img/leaderboard/banner-background.png');">
                <h2 class="sideText">{{$user->username}}</h2>
            </div>
            <div class="row border-0 bg-dark rounded-bottom"> 
                <div>
                    <img src="{{$user->profile->profileImage()}}" alt="Profile image" class="w-25 rounded m-2 border">
                </div>
                <div class="ml-2">
                    <div class="mb-1">{{$user->posts->count()}} posts</div>
                    <div class="mb-1">{{$user->profile->description ?? 'Unset'}}</div>
                    <div class="mb-1">{{$user->profile->followers->count()}} followers</div>
                    <div class="mb-1">{{$user->following->count()}} following</div>
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
