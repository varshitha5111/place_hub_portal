<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message='';
    public $sender_id=0;
    public $reciever_id=0;

    public function __construct($reciever_id,$sender_id,$msg)
    {
        $this->message=$msg;
        $this->reciever_id=$reciever_id;
        $this->sender_id=$sender_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {

        return[ 
            new PrivateChannel('message.'.$this->reciever_id),
        ];
    }

    public function broadcastWith(){
        return [
            'message'=>$this->message,
            'sender_id'=>$this->sender_id,
            'reciever_id'=>$this->reciever_id,
            'user_id'=>auth()->user()->id,
            'name'=>auth()->user()->name,
            'avatar'=>auth()->user()->avatar
        ];
        echo "hiii";
    }
}
