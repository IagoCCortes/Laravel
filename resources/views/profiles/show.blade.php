@extends('layouts.app')

@section('empty', 'hmm... this user hasn\'t posted anything')
@section('content')
<div class="container containerL">
    <div class="row">
        <div class="col-10">
            @include('postsIterator')
        </div>
        <div class="col-2">
            <div class="sideHead row mr-0" style="background-image: url('https://www.redditstatic.com/desktop2x/img/leaderboard/banner-background.png');">
                <h2 class="sideText">{{$user->username}}</h2>
            </div>
            <div class="row border-0 bg-dark rounded-bottom  mr-0"> 
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
