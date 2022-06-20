<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;

class ChatForm extends Component
{

    public $name = "";
    public $message = "";
    public $file;
    public $typeFile = "";

    use WithFileUploads;
    
    
    public function index($n)
    {  
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
        
        $this->validate([
            "name" => "required|min:3",
            "message" => "required"
        ]);

        $dataFile = $this->file == null ? "" : $this->file->store('upload',"public");
        $dataType = $this->file == null ? "" : explode('.',$this->file->store('upload',"public"))[1];

        //dd($dataFile);
        $data = ["name" => $this->name, "message" => $this->message, "file"=>$dataFile,"typeFile"=>$dataType];


        $this->emit("successAler");
        $this->emit("sendMessage", $data);
        $this->message = "";
        $this->file = "";
        //dd();
        //event(new \App\Events\SendMessage($this->name,$this->message,$this->file,$this->typeFile));

    }
}
