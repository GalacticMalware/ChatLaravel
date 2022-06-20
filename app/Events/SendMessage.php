<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $message;
    public $file;
    public $typeFile;

    public function __construct($name,$message,$file,$typeFile)
    {   
        $filter = $file == null ? "" : $file->store('upload',"public");
        $filterType = $file == null ? "" : explode('.',$file->store('upload',"public"))[1];
        $this->name = $name;
        $this->message = $message;
        $this->file = $filter;
        $this->typeFile = $filterType;
    }

    public function broadcastOn()
    {
        return 'chat-channel';
    }

    public function broadcastAs(){
        return 'chat-event';
    }
}
