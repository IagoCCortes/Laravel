@extends('layouts.app')

@section('title', 'Croatoan')
@section('empty', 'hmm... you don\'t have anything in your feed')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            @include('postsIterator')
        </div>

        <div class="col-3">
            <div class="sideHead" style="background-image: url('https://www.redditstatic.com/desktop2x/img/leaderboard/banner-background.png');">
                <h2 class="sideText">Something</h2>
            </div>
            <div>
            </div>
        </div>
    </div>
</div>
@endsection
