<?php

namespace App\Notifications;

use Cog\Contracts\Ban\Ban;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ModelWasBannedNotification extends Notification
{
    use Queueable;

    public $ban;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ban $ban)
    {
        $this->ban = $ban;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->ban->isPermanent()){
            $message = 'Nous tenons à vous informer que vous avez été banni du site, et ce pour cette raison: ';
            $subject = 'Vous avez été banni';
        }else{
            $message = 'Nous tenons à vous informer que votre compte a été suspendu jusqu\'au ' .$this->ban->expired_at->format('d/m/Y'). '. Et ce, pour cette raison: ';
            $subject = 'Suspension du compte';
        }
        return (new MailMessage)
                    ->subject($subject)
                    ->line($message)
                    ->line($this->ban->comment);
        }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
