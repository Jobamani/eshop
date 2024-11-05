<?php

namespace App\Notifications;

use App\Models\Promotion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PromotionCreated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $promotion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // You can add 'database', 'sms', etc. if needed
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
                    ->subject('New Promotion Available!')
                    ->line('A new promotion has been created: ' . $this->promotion->message)
                    ->action('Check it out', url('/promotions'))
                    ->line('Thank you for being with us!');
    }

    // You can add more methods like toDatabase() or toSMS() for other channels
}
