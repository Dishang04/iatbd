<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PetSittingInterest extends Notification
{
    protected $user;
    protected $pet;
    protected $message;

    public function __construct($user, $pet, $message)
    {
        $this->user = $user;
        $this->pet = $pet;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'pet_name' => $this->pet->name,
    //         'message' => $this->message,
    //         'user_name' => $this->user->name,
    //     ];
    // }

    public function toDatabase($notifiable)
{
    return [
        'pet_name' => $this->pet->name,
        'message' => $this->message,
        'user_name' => $this->user->name,
    ];
}
    
}
