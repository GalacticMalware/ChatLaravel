<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Chat;

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
        $this->name = explode("/", $_SERVER['REQUEST_URI'])[2];
        $this->message = "";
        //return view('home.chat');
    }

    public function render()
    {

        return view('livewire.chat-form');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            "name" => "required|min:3",
            "message" => "required"
        ]);
    }


    public function sendMessageFile()
    {

        $this->validate([
            "name" => "required|min:3",
            "message" => "required"
        ]);

        $dataFile = $this->file == null ? "" : $this->file->store('upload', "public");
        $dataType = $this->file == null ? "" : explode('.', $this->file->store('upload', "public"))[1];

        //dd($dataFile);
        $data = ["name" => $this->name, "message" => $this->message, "file" => $dataFile, "typeFile" => $dataType];

        $this->insertData($data);
        $this->emit("successAler");
        event(new \App\Events\SendMessage($this->name, $this->message, $this->file, $this->typeFile));
        $this->message = "";
        $this->file = "";
        //dd();
    }

    public function insertData($message)
    {
        $chat = new Chat;
        $chat->name = $message["name"];
        $chat->message = $message["message"];
        $chat->file = $message["file"] == null ? "" : $message['file'];
        $chat->typeFile = $message["typeFile"] == null ? "" : $message['typeFile'];
        $chat->save();
    }
}
