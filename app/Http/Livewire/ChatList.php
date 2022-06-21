<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat;

class ChatList extends Component
{
    public $messages;
    public $data;
    public $name;

    public $v = 1;

    protected $listeners = ["messageReceived"];

    public function mount()
    {
        /*$data = Chat::orderBy('id','ASC')->get();
        $this->messages = strlen($data) == 0 ? [] : $data;*/
        //var_dump();
        $this->name = explode("/", $_SERVER['REQUEST_URI'])[2];
    }

    public function messageReceived($message)
    {
        $this->messages = [];
        return $this->getData();
       // array_shift($this->getMessages(),$message);  
    }

    public function addMessage($data){
        $this->messages[] = $data;
    }
   

    public function render()
    {   
        $this->getData();
        return view('livewire.chat-list');
    }

    public function getData(){
        
        $data = Chat::orderBy('id', 'ASC')->get();
        $this->messages = strlen($data) == 0 ? [] : $data;
    }
}
