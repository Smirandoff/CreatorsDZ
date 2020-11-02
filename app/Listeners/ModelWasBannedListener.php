<?php

namespace App\Listeners;

use App\Notifications\ModelWasBannedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use \Cog\Laravel\Ban\Events\ModelWasBanned;

class ModelWasBannedListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(ModelWasBanned $event)
    {
        $event->model->notify(new ModelWasBannedNotification($event->ban));
    }
}
