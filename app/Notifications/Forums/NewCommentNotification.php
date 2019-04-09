<?php

namespace App\Notifications\Forums;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Channels\BroadcastChannel;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    public $user;

    /**
     * @var Thread
     */
    public $thread;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param Thread $thread
     */
    public function __construct(User $user, Thread $thread)
    {
        $this->user = $user;
        $this->thread = $thread;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', BroadcastChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $author = $this->thread->user;

        return (new MailMessage)
                    ->subject('New comment 💬')
                    ->greeting('Hey, '.$author->username)
                    ->line($this->user->username.' commented on '.$this->thread->title)
                    ->action('View Thread 💬', url('/discuss/'.$this->thread->slug))
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
            'title' => $this->user->username.' commented on '.$this->thread->title,
            'from_user' => $this->user,
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'commented on '.$this->thread->title,
            'from_user' => $this->user,
        ]);
    }
}
