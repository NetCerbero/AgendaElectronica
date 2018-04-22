<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FireMensaje implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $mensaje;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mensaje $msg)
    {
        $this->mensaje = $msg;
        $this->user = auth()->user();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('mensaje.'.$this->mensaje->id);
    }
}
