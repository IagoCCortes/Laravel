@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row"><h2>Edit profile</h2></div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>


                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" 
                        name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Profile image</label>

                    <input id="image" type="file" class="form-control-file" 
                           name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group row pt-4">
                    <button class="btn btn-primary">Save profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection