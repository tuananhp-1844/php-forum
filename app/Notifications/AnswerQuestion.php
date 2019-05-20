<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;
use App\Models\Question;

class AnswerQuestion extends Notification
{
    use Queueable;

    public $user;
    public $question;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Question $question)
    {
        $this->user = $user;
        $this->question = $question;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'link' => '/questions/' . $this->question->id,
            'title' => $this->question->title,
            'full_name' => $this->user->fullname,
            'message' => 'answered your question ',
            'type' => 'answer',
            'icon' => 'fa fa-comment-o',
        ];
    }
}
