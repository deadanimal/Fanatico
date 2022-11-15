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
                {{$balance->token->name}} - {{$balance->balance}}
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

                In-game: {{Auth::user()->positions->sum('token_amount')}}  <br/>
                Outcome: {{Auth::user()->in_positions->sum('token_amount')}}  <br/>

            </div>
        </div>
    
    </div>    
</div>


<div class="row">
    <h1>Bet on Match</h1>
    <div class="col">     
        {{Auth::user()->positions}}   
    </div>
</div>


<div class="row">
    <div class="col">
        <h1>Bet on In-Game Match</h1>
        <div class="col">     
            {{Auth::user()->in_positions}}   
        </div>        
    </div>
</div>
@endsection
