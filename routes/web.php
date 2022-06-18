<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Livewire\ChatForm;


Route::get('/', Controller::class);


Route::get('/chat',function(){
    return view('home.chat');
});



/*Route::get('/', function () {
    return view('welcome');
});*/
