<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;



class ChatList extends Component
{
    public $messages;
    public $data;
    public $name;

    protected $listeners = ["sendMessage"=>"messageReceived"];

    public function mount(){
        /*$data = Chat::orderBy('id','ASC')->get();
        $this->messages = strlen($data) == 0 ? [] : $data;*/
        //var_dump();
    }

    public function messageReceived($message){
        
        $this->messages[] = $message;
        $chat = new Chat;
        $chat->name = $message ["name"];
        $chat->message = $message ["message"];
        $chat->save();
        
    }
    
    public function render()
    {
        $this->name = explode("/",$_SERVER['REQUEST_URI'])[2];
        $data = Chat::orderBy('id','ASC')->get();
        $this->messages = strlen($data) == 0 ? [] : $data;
        return view('livewire.chat-list');
    } 

    
}
