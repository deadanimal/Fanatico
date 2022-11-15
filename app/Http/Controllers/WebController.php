<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(Request $request) {
        return view('web.home');
    }

    public function dashboard(Request $request) {
        return view('web.dashboard');
    }   
    
    public function dollar(Request $request) {
        return view('web.dollar');
    }        

}
