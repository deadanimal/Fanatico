<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $dollar = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', 1],
        ])->first();
                

    }

    public function play_ingame(Request $request) {
        $id = (int)$request->route('id');
        $user = $request->user();
        $answer = GameInAnswer::find($id);
        $match = GameMatch::find($answer->game_match_id);

        $dollar = TokenBalance::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', 1],
        ])->first();

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
            'question_id' => $request->question_id,
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
