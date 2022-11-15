@extends('layouts.app')

@section('content')
Dashboard

buy Dollar token <br/>

all the bets made on outcome <br/>
all the bets made in-game <br/>

<div class="row">
    <div class="col-3">    

        <div class="card">
            <div class="card-header">
                Balance
            </div>
            <div class="card-body">

                @foreach(Auth::user()->balances as $balance)
                {{$balance->token->name}} - {{number_format($balance->balance / (10 ** $balance->token->decimal), 2, '.', ',') }}
                @endforeach

            </div>
        </div>
    
    </div>

    <div class="col-3">    

        <div class="card">
            <div class="card-header">
                Amount of Bets
            </div>
            <div class="card-body">

                In-game: {{number_format(Auth::user()->positions->sum('token_amount') / 1000000, 2, '.', ',') }}  <br/>
                In-game: {{number_format(Auth::user()->in_positions->sum('token_amount') / 1000000, 2, '.', ',') }}  <br/>

            </div>
        </div>
    
    </div>    
</div>

<div class="row">
    <h1>Bet on Match</h1>
    <div class="col">     
        <table class="table">
            <tbody>
                @foreach (Auth::user()->positions as $position)
                    <tr>
                        <td>{{$position->match->name}}</td>
                        <td>{{$position->outcome->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>             
    </div>
</div>


{{$position->position_question}}

<div class="row">
    <div class="col">
        <h1>Bet on In-Game Match</h1>
        <div class="col">  
            <table class="table">
                <tbody>
                    @foreach (Auth::user()->in_positions as $position)
                        <tr>
                            <td>{{$position->match->name}}</td>
                            <td>{{$position->question->question}} {{$position->answer->answer}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>                 
        </div>        
    </div>
</div>
@endsection
