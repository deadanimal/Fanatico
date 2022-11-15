@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $match->name }}</h1>
            <p>{{ $match->description }}</p>
        </div>
    </div>

    <div class="row">
        @foreach ($match->teams as $team)
            <div class="col-3">

                <div class="card">
                    <div class="card-header">
                        <a href="/team/{{ $team->id }}">{{ $team->name }}</a>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            {{-- <thead>
                                <tr>
                                    <th scope="col">Player</th>
                                </tr>
                            </thead> --}}
                            <tbody>
                                @foreach ($team->players as $player)
                                    <tr>
                                        <td><a href="/player/{{ $player->id }}">{{ $player->name }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <h1>Outcome</h1>

        @foreach ($match->outcomes as $outcome)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        {{ $outcome->name }} ({{$outcome->positions->count()}})
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach ($outcome->positions as $position)
                                    <tr>
                                        <td>{{$position->user->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                        
                        <form action="/outcome/{{ $outcome->id }}/play" method="POST">
                             @csrf
                            <button type="submit" class="btn btn-primary">Buy Outcome</button> 
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    </div>



    <div class="row">
        <h1>In-Game</h1>

            @foreach ($match->in_questions as $question)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        {{ $question->question }} ({{$question->positions->count()}})
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach ($question->answers as $answer)
                                    <tr>
                                        <td>{{$answer->answer}} ({{$answer->positions->count()}}) </td>
                                        <td>
                                            <form action="/answer/{{ $answer->id }}/play" method="POST">
                                                @csrf
                                               <button type="submit" class="btn btn-primary">Buy answer</button> 
                                           </form>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                        
                    </div>
                </div>
            </div>
            @endforeach

    </div>



    @role('manager|admin')
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
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Create Question for Match
                    </div>
                    <div class="card-body">

                        <form action="/match/{{ $match->id }}/question" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">question</label>
                                <input type="text" class="form-control" id="question" name="question">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Question</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        Create answer for Match
                    </div>
                    <div class="card-body">

                        <form action="/match/{{ $match->id }}/answer" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <select class="form-select" name="question_id">
                                    @foreach ($match->in_questions as $question)
                                        <option value={{ $question->id }}>{{ $question->question }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Answer</label>
                                <input type="text" class="form-control" id="answer" name="answer">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Min</label>
                                <input type="number" class="form-control" id="min" name="token_min_amount">
                            </div>
                            <button type="submit" class="btn btn-primary">Add answer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
