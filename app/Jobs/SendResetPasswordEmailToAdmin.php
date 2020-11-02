<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Notifications\AdminResetPassword as AdminResetPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendResetPasswordEmailToAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $token, $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Admin $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new AdminResetPasswordNotification($this->token));
    }
}
