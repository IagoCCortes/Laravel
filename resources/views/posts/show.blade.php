@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="border-0 bg-dark rounded p-3 mb-4" style="color: #fff">
                <div class="mb-8">
                    <h4>{{$post->title}}</h2>
                </div>
                <div class="">
                    <img src="/storage/{{$post->image}}" alt="post" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection