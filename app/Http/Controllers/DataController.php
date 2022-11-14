<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GameMatch;

class DataController extends Controller
{

    public function cipta_match(Request $request) {
        $match = New GameMatch;
        $match->save();
        return back();
    }

    public function kemaskini_match(Request $request) {}

    public function satu_match(Request $request) {}

    public function senarai_match(Request $request) {}



    
    public function cipta_outcome(Request $request) {}

    public function kemaskini_outcome(Request $request) {}

    public function satu_outcome(Request $request) {}

    public function senarai_outcome(Request $request) {}   




    public function cipta_post(Request $request) {}

    public function kemaskini_post(Request $request) {}

    public function satu_post(Request $request) {}

    public function senarai_post(Request $request) {}    



    
    public function cipta_team(Request $request) {}

    public function kemaskini_team(Request $request) {}

    public function satu_team(Request $request) {}

    public function senarai_team(Request $request) {}   
    


    
    public function cipta_player(Request $request) {}

    public function kemaskini_player(Request $request) {}

    public function satu_player(Request $request) {}

    public function senarai_player(Request $request) {}    
    
    

    public function upload_image(Request $request) {}

    public function upload_video(Request $request) {}
}
