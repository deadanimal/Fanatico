@extends('layouts.app')

@section('content')
Dashboard

buy Dollar token <br/>

all the bets made on outcome <br/>
all the bets made in-game <br/>

{{Auth::user()->balances}}

@foreach(Auth::user()->balances as $balance)
{{$balance->token->name}} - {{$balance->balance}}
@endforeach
@endsection
