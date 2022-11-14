<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(Request $request) {
        return view('web.home');
    }

}
