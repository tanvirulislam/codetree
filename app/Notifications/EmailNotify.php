<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotify extends Notification
{
    use Queueable;
    public $name;
    public $email;
    public $software_name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $email, $software_name)
    {
        $this->request_name = $name;
        $this->request_email = $email;
        $this->software_name = $software_name;

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
                    ->line('You have a new demo request')
                    ->line('Name: '.$this->request_name)
                    ->line('Email: '.$this->request_email)
                    ->line('Software Name: '.$this->software_name)
                    ->line('Thank you for using our application!');
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
