<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;

use function Psy\debug;

class ChatList extends Component
{
    public $messages;
    public $data;
    public $name;

    protected $listeners = ["sendMessage" => "messageReceived"];

    public function mount()
    {
        /*$data = Chat::orderBy('id','ASC')->get();
        $this->messages = strlen($data) == 0 ? [] : $data;*/
        //var_dump();
        $this->name = explode("/", $_SERVER['REQUEST_URI'])[2];
    }

    public function messageReceived($message)
    {
        //dd($message);
        //$this->messages[] = $message;
            $chat = new Chat;
            $chat->name = $message["name"];
            $chat->message = $message["message"];
            $chat->file = $message["file"] == null ? "" : $message['file'];
            $chat->typeFile = $message["typeFile"] == null ? "" : $message['typeFile'];
            $chat->save();
    }

    public function render()
    {
        $data = Chat::orderBy('id', 'ASC')->get();

        $this->messages = strlen($data) == 0 ? [] : $data;
    
        return view('livewire.chat-list');
    }
}
