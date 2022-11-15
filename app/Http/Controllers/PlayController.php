<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;


use App\Models\GameInQuestion;
use App\Models\GameInAnswer;

use App\Models\SportTeam;
use App\Models\Player;
use App\Models\GameOutcome;

use App\Models\GameInPosition;
use App\Models\GameMatch;
use App\Models\GamePosition;

use App\Models\Token;
use App\Models\TokenBalance;

class PlayController extends Controller
{

    public function buy_token_team(Request $request) {
        $id = (int)$request->route('id');
        $user = $request->user();
        $amount = $request->amount;
        $team = SportTeam::find($id);
        $token_id = $team->token_id;

        $dollar_balance = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', 1],
        ])->first();        

        $exists = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', $token_id],
        ])->exist();
        
        if(!$exists) {

        }

        $token_balance = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', $token_id],
        ])->first();        
        
        $dollar_balance->balance -= $amount;
        $token_balance->balance += $amount;

    }

    public function buy_token_player(Request $request) {
        $id = (int)$request->route('id');
        $user = $request->user();
        $player = Player::find($id);

        $dollar = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', 1],
        ])->first();        

        $exists = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', $player->token_id],
        ])->exist();
        
        if(!$exists) {

        }        
    }

    public function play_outcome(Request $request) {
        $id = (int)$request->route('id');
        $user = $request->user();
        $outcome = GameOutcome::find($id);
        $match = GameMatch::find($outcome->game_match_id);
        $token_amount = 1000000;

        $dollar_balance = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', 1],
        ])->first();

        if($dollar_balance->balance <= $token_amount) {
            return back();
        }

        $dollar_balance->balance -= $token_amount;
        $dollar_balance->save();

        $position = New GamePosition;
        $position->game_match_id = $match->id;
        $position->game_outcome_id = $outcome->id;
        $position->user_id = $user->id;
        $position->token_id = 1;
        $position->token_amount = $token_amount;
        $position->save();    

        return back();
    }

    public function play_ingame(Request $request) {
        $id = (int)$request->route('id');
        $user = $request->user();
        $answer = GameInAnswer::find($id);
        $question = GameInQuestion::find($answer->game_in_question_id);
        $match = GameMatch::find($answer->game_match_id);
        $token_amount = 100000;

        $dollar_balance = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', 1],
        ])->first();

        if($dollar_balance->balance <= $token_amount) {
            Alert::error('Insufficient Balance', 'Please topup your token balance to make a bet.');
            return back();
        }

        $dollar_balance->balance -= $token_amount;
        $dollar_balance->save();

        $position = New GameInPosition;
        $position->game_match_id = $match->id;
        $position->game_in_question_id = $question->id;
        $position->game_in_answer_id = $answer->id;
        $position->user_id = $user->id;
        $position->token_id = 1;
        $position->token_amount = $token_amount;
        $position->save();  
        
        Alert::success('Successful Bet Made', 'You have successfully placed a bet on the in-game');
        return back();

    }




    public function cipta_question(Request $request) {
        $id = (int)$request->route('id');
        GameInQuestion::create([
            'question' => $request->question,
            'game_match_id' => $id,
            'user_id' => $request->user()->id,             
        ]);
        return back();
    }

    public function kemaskini_question(Request $request) {
        $id = (int)$request->route('id');
        $question = GameInQuestion::find($id);
        $question->save();
        return back();
    }

    public function satu_question(Request $request) {
        $id = (int)$request->route('id');
        $question = GameInQuestion::find($id);
        return view('web.question_satu', compact('question'));
    }




    public function cipta_answer(Request $request) {
        $id = (int)$request->route('id');
        GameInAnswer::create([
            'answer' => $request->answer,
            'game_match_id' => $id,
            'game_in_question_id' => $request->question_id,
            'token_id' => 1,
            'token_min_amount' => $request->token_min_amount,
            'user_id' => $request->user()->id,             
        ]);
        return back();
    }

    public function kemaskini_answer(Request $request) {
        $id = (int)$request->route('id');
        $answer = GameInAnswer::find($id);
        $answer->save();
        return back();
    }

    public function satu_answer(Request $request) {
        $id = (int)$request->route('id');
        $answer = GameInAnswer::find($id);
        return view('web.answer_satu', compact('answer'));
    }   
    


}
