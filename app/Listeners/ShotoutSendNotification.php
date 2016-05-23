<?php

namespace App\Listeners;

use App\Events\ShotoutAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShotoutSendNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShotoutAdded  $event
     * @return void
     */
    public function handle(ShotoutAdded $event)
    {
        //
    }
}
