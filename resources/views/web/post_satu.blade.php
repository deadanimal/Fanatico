@extends('layouts.app')

@section('content')
@if(Auth::user()->hasRole('manager'))
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                Edit Post
            </div>
            <div class="card-body">

                <form action="/post/{{$post->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$post->name}}" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">description</label>
                        <textarea class="form-control" id="description" name="description">{{$post->description}}</textarea>
                    </div>                            
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-9">
    </div>
</div>
@else
<h1>{{$post->name}}</h1>
<p>{{$post->description}}</p>
@endif

@endsection
