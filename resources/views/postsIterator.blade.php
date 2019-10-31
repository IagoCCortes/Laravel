@forelse($posts as $post)    
        <div class="border-0 bg-dark rounded p-3 mb-4" style="color: #fff">
            <like-button post-id="{{$post->id}}" likes="{{$likes?? ''}}"></like-button>
            <div class="mb-8">
                <span>Posted by <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></span>
                <a href="/p/{{$post->id}}"><h4>{{$post->title}}</h4></a>
            </div>
            <div>
                <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" alt="post" class="w-100"></a>
            </div>
        </div>
@empty
    <p>@yield('empty')</p>
@endforelse