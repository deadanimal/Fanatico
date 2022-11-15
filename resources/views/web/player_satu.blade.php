@extends('layouts.app')

@section('content')


<h1>{{$player->name}}</h1>
<p>{{$player->description}}</p>


@role('manager')
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                Edit player
            </div>
            <div class="card-body">

                <form action="/player/{{$player->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$player->name}}" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">description</label>
                        <textarea class="form-control" id="description" name="description">{{$player->description}}</textarea>
                    </div>                            
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                Upload Image
            </div>
            <div class="card-body">

                <form action="/image" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="taggable_type" value="App\Models\Player">
                    <input type="hidden" name="taggable_id" value="{{$player->id}}">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Caption</label>
                        <textarea class="form-control" id="caption" name="caption"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>                            
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div> 
    </div>    
</div>
@endrole


@endsection
