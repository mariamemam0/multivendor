<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $order ;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];

        
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $addr = $this->order->billingAddress;

        return (new MailMessage)
                    ->subject("New Order #{$this->order->number}")
                    ->from('notification@ajyal-store.ps', 'AJYAL Store')
                    ->greeting("Hi {$notifiable->name},")
                    ->line("A new order (#{$this->order->number}) created by {$addr->name} from {$addr->country_name}.")
                    ->action('View Order', url('/dashboard'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
