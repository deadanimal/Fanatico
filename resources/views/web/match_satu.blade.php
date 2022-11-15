@extends('layouts.app')

@section('content')
    @if (Auth::user()->hasRole('manager'))
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Edit match
                    </div>
                    <div class="card-body">

                        <form action="/match/{{ $match->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $match->name }}"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">description</label>
                                <textarea class="form-control" id="description" name="description">{{ $match->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Add Team to Match
                    </div>
                    <div class="card-body">

                        <form action="/match/{{ $match->id }}/add-team" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Team ID</label>
                                <input type="text" class="form-control" id="name" name="team_id">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Team</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Create Outcome for Match
                    </div>
                    <div class="card-body">                        

                        <form action="/match/{{ $match->id }}/outcome" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="name" name="description">
                            </div>    
                            
                            <div class="mb-3">
                                <label class="form-label">Minimum Amount</label>
                                <input type="text" class="form-control" id="name" name="token_min_amount">
                            </div>                               
                            <button type="submit" class="btn btn-primary">Add Outcome</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1>{{ $match->name }}</h1>
        <p>{{ $match->description }}</p>
    @endif

    @foreach ($match->teams as $team)
        {{$team->name}} <br/>
    @endforeach
@endsection
