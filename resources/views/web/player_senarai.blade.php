@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-9">
            @foreach($players as $player) 
            <a href="/player/{{$player->id}}">{{$player->name}}</a> - {{$player->description}} <br/>
            @endforeach
        </div>

    </div>

    @role('manager')
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Create player
                    </div>
                    <div class="card-body">

                        <form action="/player" method="POST">
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
