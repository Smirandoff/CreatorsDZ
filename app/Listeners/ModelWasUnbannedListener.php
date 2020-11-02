<?php

namespace App\Listeners;

use App\Notifications\ModelWasUnbannedNotification;
use Cog\Laravel\Ban\Events\ModelWasUnbanned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ModelWasUnbannedListener implements ShouldQueue
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
    public function handle(ModelWasUnbanned $event)
    {
        $event->model->notify(new ModelWasUnbannedNotification());
    }
}
