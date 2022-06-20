<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Livewire\ChatForm;
use App\Models\Chat;

Route::get('/', Controller::class);


/*Route::get('/chat/{name}',function(){
    
    return view('home.chat');
});*/


Route::get('/chat/{name}',[ChatForm::class,'index']);

//Route::get('/chat/{name}','ChatForm@indexx');


/*Route::get('/', function () {
    return view('welcome');
});*/
