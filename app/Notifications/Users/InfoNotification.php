<?php

namespace App\Notifications\Users;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InfoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var array
     */
    public $data;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param $data
     * @param User $user
     */
    public function __construct($data, User $user)
    {
        $this->data = $data;
        $this->user = $user;
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
        return (new MailMessage)
            ->subject('News on Laramap.com 🗞️')
            ->greeting('Dear '.$this->user->username)
            ->line($this->data['body'])
            ->line('Please note that laramap is still in development. 👷‍')
            ->line('Thank you for using Laramap! 😻');
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
