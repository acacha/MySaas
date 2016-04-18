<?php

namespace App\Listeners;

use App\Events\UserHasChanged;
use Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCacheForget
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
     * @param  UserHasChanged  $event
     * @return void
     */
    public function handle(UserHasChanged $event)
    {
        Cache::forget('query.users');
    }
}
