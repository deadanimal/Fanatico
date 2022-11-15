<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlockController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\WebController;

Route::get('', [WebController::class, 'home']);

Route::get('match', [DataController::class, 'senarai_match']);
Route::get('match/{id}', [DataController::class, 'satu_match']);

Route::get('post', [DataController::class, 'senarai_post']);
Route::get('post/{id}', [DataController::class, 'satu_post']);

Route::get('team', [DataController::class, 'senarai_team']);
Route::get('team/{id}', [DataController::class, 'satu_team']);

Route::get('player', [DataController::class, 'senarai_player']);
Route::get('player/{id}', [DataController::class, 'satu_player']);

Route::get('question/{id}', [PlayController::class, 'satu_question']); 
Route::get('answer/{id}', [PlayController::class, 'satu_answer']);  



Route::middleware(['auth'])->group(function () { 

    Route::post('dollar', [BlockController::class, 'buy_dollar']);
    Route::get('dollar/{id}', [BlockController::class, 'confirm_dollar']);

    Route::post('team/{id}/buy-token', [PlayController::class, 'buy_token_team']);
    Route::post('player/{id}/buy-token', [PlayController::class, 'buy_token_player']);
    Route::post('outcome/{id}/play', [PlayController::class, 'play_outcome']);   
    Route::post('answer/{id}/play', [PlayController::class, 'play_ingame']);   

});


Route::middleware(['auth', 'role:manager'])->group(function () { 

    Route::post('post', [DataController::class, 'cipta_post']);    
    Route::put('post/{id}', [DataController::class, 'kemaskini_post']); 
        
    Route::post('team', [DataController::class, 'cipta_team']);    
    Route::put('team/{id}', [DataController::class, 'kemaskini_team']);  
        
    Route::post('player', [DataController::class, 'cipta_player']);    
    Route::put('player/{id}', [DataController::class, 'kemaskini_player']);     

    Route::post('image', [DataController::class, 'upload_image']);
    Route::post('video', [DataController::class, 'upload_video']);

});


Route::middleware(['auth', 'role:bookeeper'])->group(function () {
    
    Route::post('match', [DataController::class, 'cipta_match']);    
    Route::put('match/{id}', [DataController::class, 'kemaskini_match']);

    Route::post('match/{id}/outcome', [DataController::class, 'cipta_outcome']);    
    Route::put('outcome/{id}', [DataController::class, 'kemaskini_outcome']);   

});


Route::middleware(['auth', 'role:ingame'])->group(function () {  

    Route::post('match/{id}/question', [PlayController::class, 'cipta_question']);    
    Route::put('question/{id}', [PlayController::class, 'kemaskini_question']); 
    
    Route::post('match/{id}/answer', [PlayController::class, 'cipta_answer']);    
    Route::put('answer/{id}', [PlayController::class, 'kemaskini_answer']);     

});