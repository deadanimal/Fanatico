<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GameMatch;
use App\Models\GameOutcome;

use App\Models\Player;
use App\Models\Post;
use App\Models\SportTeam;

use App\Models\Image;
use App\Models\Video;
class DataController extends Controller
{

    public function cipta_match(Request $request) {
        GameMatch::create([
            'name' => $request->name,
            'description' => $request->description,
            // 'planned_start_datetime' => $request->planned_start_datetime,
            // 'planned_end_datetime' => $request->planned_end_datetime,
            // 'actual_start_datetime' => $request->actual_start_datetime,
            // 'actual_end_datetime' => $request->actual_end_datetime,  
            'user_id' => $request->user()->id,             
        ]);
        return back();
    }

    public function kemaskini_match(Request $request) {
        $id = (int)$request->route('id');
        $match = GameMatch::find($id);
        $match->name = $request->name;
        $match->description = $request->description;        
        $match->save();
        return back();
    }

    public function satu_match(Request $request) {
        $id = (int)$request->route('id');
        $match = GameMatch::find($id);
        return view('web.match_satu', compact('match'));
    }

    public function senarai_match(Request $request) {
        $matches = GameMatch::all();
        return view('web.match_senarai', compact('matches'));        
    }

    public function add_team_to_match(Request $request) {
        $id = (int)$request->route('id');
        $match = GameMatch::find($id);
        $team = SportTeam::find($request->team_id);
        $match->teams()->attach($team);
        return back();
    }    

    public function remove_team_from_match(Request $request) {
        $id = (int)$request->route('id');
        $match = GameMatch::find($id);
        $team = SportTeam::find($request->team_id);
        $match->teams()->detach($team);
        return back();
    }     





    
    public function cipta_outcome(Request $request) {
        $id = (int)$request->route('id');  

        GameOutcome::create([
            'name' => $request->name,
            'description' => $request->description,
            'game_match_id' => $id,
            'user_id' => $request->user()->id,  
            'token_id' => 1,
            'token_min_amount' => $request->token_min_amount,               
        ]);
        return back();        
    }

    public function kemaskini_outcome(Request $request) {
        $id = (int)$request->route('id');
        $outcome = GameOutcome::find($id);
        $outcome->save();
        return back();
    }

    public function satu_outcome(Request $request) {
        $id = (int)$request->route('id');
        $outcome = GameOutcome::find($id);
        return view('web.outcome_satu', compact('outcome'));   
    }

    public function senarai_outcome(Request $request) {
        $outcomes = GameOutcome::all();
        return view('web.outcome_senarai', compact('outcomes'));   
    }   




    public function cipta_post(Request $request) {
        Post::create([
            'name' => $request->name,
            'description' => $request->description, 
            'user_id' => $request->user()->id,            
        ]);
        return back();
    }

    public function kemaskini_post(Request $request) {
        $id = (int)$request->route('id');
        $post = Post::find($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();   
        return back();
    }

    public function satu_post(Request $request) {
        $id = (int)$request->route('id');
        $post = Post::find($id);
        $post->save();    
        return view('web.post_satu', compact('post'));       
    }

    public function senarai_post(Request $request) {
        $posts = Post::all();
        return view('web.post_senarai', compact('posts')); 
    }    



    
    public function cipta_team(Request $request) {
        SportTeam::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user()->id,
        ]);
        return back();        
    }

    public function kemaskini_team(Request $request) {
        $id = (int)$request->route('id');
        $team = SportTeam::find($id);  
        $team->name = $request->name;
        $team->description = $request->description;        
        $team->save();
        return back();
    }

    public function satu_team(Request $request) {
        $id = (int)$request->route('id');
        $team = SportTeam::find($id);   
        return view('web.team_satu', compact('team'));
    }

    public function senarai_team(Request $request) {
        $teams = SportTeam::all();
        return view('web.team_senarai', compact('teams'));
    }   

    public function add_player_to_team(Request $request) {
        $id = (int)$request->route('id');
        $team = SportTeam::find($id);
        $player = Player::find($request->player_id);
        $team->players()->attach($player);
        return back();
    }    

    public function remove_player_from_team(Request $request) {
        $id = (int)$request->route('id');
        $team = SportTeam::find($id);
        $player = Player::find($request->player_id);
        $team->players()->detach($player);
        return back();
    }      
    


    
    public function cipta_player(Request $request) {
        Player::create([
            'name' => $request->name,
            'description' => $request->description,
            'creator_id' => $request->user()->id,
        ]);
        return back();        
    }

    public function kemaskini_player(Request $request) {
        $id = (int)$request->route('id');
        $player = Player::find($id);
        $player->name = $request->name;
        $player->description = $request->description;           
        $player->save();
        return back();
    }

    public function satu_player(Request $request) {
        $id = (int)$request->route('id');
        $player = Player::find($id);
        $player->save();
        return view('web.player_satu', compact('player'));
    }

    public function senarai_player(Request $request) {
        $players = Player::all();
        return view('web.player_senarai', compact('players'));
    }    
    
    

    public function upload_image(Request $request) {
        Image::create([
            'name' => $request->name,
            'path' => $request->file('image')->store('fanatico/images'),
            'user_id' => $request->user()->id,
            'taggable_type' => $request->taggable_type,
            'taggable_id' => $request->taggable_id, 
        ]);
        return back();
    }

    public function upload_video(Request $request) {
        Video::create([
            'name' => $request->name,
            'path' => $request->file('video')->store('fanatico/videos'),
            'user_id' => $request->user()->id,
            'taggable_type' => $request->taggable_type,
            'taggable_id' => $request->taggable_id, 
        ]);
        return back();          
    }
}
