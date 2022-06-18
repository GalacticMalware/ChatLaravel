<?php

namespace App\Http\Livewire;

use Illuminate\Routing\Route;
use Livewire\Component;

class ChatForm extends Component
{

    public function index()
    {
        return view('home.chat');
    }

    public $name = "";
    public $message = "";

    public function mount()
    {
        $this->name = "Jose";
        $this->message = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function updated($field){
        $this->validateOnly($field,[
            "name" => "required|min:3",
            "message" => "required"
        ]);
    }


    public function sendMessage()
    {
        $this->validate([
            "name" => "required|min:3",
            "message" => "required"
        ]);

        $data = ["user" => $this->name, "message" => $this->message];

        $this->emit("successAler");
        //$this->emit("sendMessage", $data);
        
        event(new \App\Events\SendMessage($this->name,$this->message));
    }
}
