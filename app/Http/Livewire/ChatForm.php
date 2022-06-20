<?php

namespace App\Http\Livewire;

use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Route;
use Livewire\Component;

class ChatForm extends Component
{

    public $name = "";
    public $message = "";
    public $n = "";
    
    private $faker;

    protected $updatesQueryString = ['name'];

    
    public function index($n)
    {
        $this->n = $n;
        return view('home.chat');
    }

   
    public function mount()
    {
        $this->name = explode("/",$_SERVER['REQUEST_URI'])[2];
        $this->message = "";
        //return view('home.chat');
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
        $this->name = $this->n;
        $this->validate([
            "name" => "required|min:3",
            "message" => "required"
        ]);

        $data = ["name" => $this->name, "message" => $this->message];

        $this->emit("successAler");
        //$this->emit("sendMessage", $data);
        
        event(new \App\Events\SendMessage($this->name,$this->message));
    }
}
