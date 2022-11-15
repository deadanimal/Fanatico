<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Token;
use App\Models\TokenBalance;
use App\Models\TokenPurchase;

class WebController extends Controller
{
    public function home(Request $request) {
        return view('web.home');
    }

    public function faq(Request $request) {
        return view('web.faq');
    }     

    public function dashboard(Request $request) {
        $user = $request->user();

        if(TokenBalance::where([
            ['token_id', '=', 1],
            ['user_id', '=', $user->id]
        ])->exists() == false) {
            $dollar_balance = New TokenBalance;
            $dollar_balance->token_id = 1;
            $dollar_balance->user_id = $user->id;
            $dollar_balance->save();
        }

        $dollar_balance = TokenBalance::where([
            ['token_id', '=', 1],
            ['user_id', '=', $user->id]
        ])->first();

        return view('web.dashboard', compact('dollar_balance'));
    }   
    
    public function dollar(Request $request) {
        return view('web.dollar');
    }        

}
