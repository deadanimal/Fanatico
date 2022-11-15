<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Token;
use App\Models\TokenBalance;
use App\Models\TokenPurchase;

class BlockController extends Controller
{

    public function buy_dollar(Request $request) {
        $user = $request->user();
        $token = Token::find(1);
        $token_balance = Token::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', $token->id]
        ])->first();

        $purchase = new TokenPurchase;
        $purchase->save();

        return back();
    }

    public function confirm_dollar(Request $request) {
        $user = $request->user();
        $token = Token::find(1);

        $purchase = TokenPurchase::find($request->purchase_id);

        if($purchase->user_id != $user->id) {
            dd('User cannot find other people invoice');
            return back();
        }        

        $token_balance = Token::where([
            ['user_id', '=', $user->id],
            ['token_id', '=', $token->id]
        ])->first();

        if ($purchase->completed == false) {                    
            $resource_url = 'https://bitpay.com/invoices/';
            $invoice_id = $purchase->invoice_id;
            $bitpay_url = $resource_url.$invoice_id;
            $bitpay_response = Http::get($bitpay_url, [
                'token' => env('BITPAY_TOKEN')
            ])->json();

            if($bitpay_response['data']['status'] == 'confirmed') {
                $purchase->status = 'confirmed';
                $purchase->completed = true;                
                $purchase->save();

                $token_balance->balance += $purchase->amount;
                $token_balance->save();
            }
        }

        return back();
    }

    public function bitpay_redirect(Request $request) {
        $user = $request->user();
        $purchase = TokenPurchase::where('user_id', $user->id)->latest();
        return view('web.redirect', compact('purchase'));
    }

    public function bitpay_notification(Request $request) {
        return response('', 200);
    }
    
}
