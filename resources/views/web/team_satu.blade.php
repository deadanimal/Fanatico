@extends('layouts.app')

@section('content')
    <h1>{{ $team->name }}</h1>
    <p>{{ $team->description }}</p>

    @foreach ($team->players as $player)
        {{ $player->name }} <br />
    @endforeach

    @role('manager')
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Edit team
                    </div>
                    <div class="card-body">

                        <form action="/team/{{ $team->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $team->name }}"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <textarea class="form-control" id="description" name="description">{{ $team->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Add Player to Team
                    </div>
                    <div class="card-body">

                        <form action="/team/{{ $team->id }}/add-player" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">player ID</label>
                                <input type="text" class="form-control" id="name" name="player_id">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Player</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
