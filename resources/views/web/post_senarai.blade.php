@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-9">
            <table class="table">
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="/post/{{ $post->id }}">{{ $post->name }}</a></td>
                            <td>{{$post->description}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>

    </div>

    @role('journalist|admin')
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Create Post
                    </div>
                    <div class="card-body">

                        <form action="/post" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>                            
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-9">
            </div>
        </div>
    @endrole
@endsection
