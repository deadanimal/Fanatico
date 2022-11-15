@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
            @if ($post->images->count() > 0)
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    @foreach ($post->images as $image)
                        <div class="carousel-inner">
                            @if ($loop->first)
                                <div class="carousel-item active">
                            @else 
                                <div class="carousel-item">
                            @endif                            
                            
                                <img src="https://pipeline-apps.sgp1.digitaloceanspaces.com/{{ $image->path }}"
                                    class="d-block w-100" alt="{{ $image->title }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $image->title }}</h5>
                                    <p>{{ $image->caption }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <h1>{{ $post->name }}</h1>
    <p>{{ $post->description }}</p>

    @role('manager')
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">

                        <form action="/post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $post->name }}"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
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
                            <input type="hidden" name="taggable_type" value="App\Models\Post">
                            <input type="hidden" name="taggable_id" value="{{$post->id}}">
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
