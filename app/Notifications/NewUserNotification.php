<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\support\Facades\Mail;
use App\Mail\SendNewUserMail;


class NewUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->data['email']    = $user->email;
        $this->data['name']     = $user->name;
        $this->data['link']     = route('users.show', $user->id);
        $this->data['message']  = 'Good Day,<p> The following user account(' . $user->name.')
                                    has been created.</p><p>Click on the following link to view their
                                    <a href="'. $this->data['link'].'">profile</a></p>';
        $this->data['subject']  = 'New User created';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject($this->data['subject'])
            ->line($this->data['message']);
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
            'name'      => $this->data['name'],
            'email'     => $this->data['email'],
            'message'   => $this->data['message'],
            'link'      => $this->data['link'],
        ];
    }
}
