<?php

namespace App\Events;

use App\Events\Event;
use App\Shoutout;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShotoutAdded extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var Shoutout
     */
    public $shoutout;


    public $atribut2;

    /**
     * Create a new event instance.
     *
     * @return void
     */ShouldBroadcast
    public function __construct(Shoutout $shoutout)
    {
        //
        $this->shoutout = $shoutout;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['shoutout-added'];
    }
}
