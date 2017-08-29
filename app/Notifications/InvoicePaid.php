<?php

namespace App\Notifications;

use App\Models\Owner;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    private $payment, $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment, $message)
    {
        $this->payment = $payment;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        try {
            $name = @$this->payment->owner->owner_name;
            $lot_name = @$this->payment->invoice->lot->lot_name;
            $pay_date = @$this->payment->payment_date->format('M d,Y');
        } catch (\Exception $e) {
            $lot_name = $name = $pay_date = '';
        }

        $owner = Owner::where('user_id', auth()->user()->id)->first();

        return (new MailMessage)
            ->subject('Payment Recipient')
            ->greeting('Payment Recipient')
            ->line('Invoice #' . $this->payment->invoice_id)
            ->line('For ' . $name)
            ->line('Paid on ' . $pay_date)
            ->line('')
            ->line('Owner Name: '.$owner->owner_name)
            ->line('Lot Name: '. $lot_name)
            ->line('Address: ' . $owner->owner_address)
            ->line('Mobile: ' . $owner->owner_phone1)
            ->line('Email: ' . $owner->email)
            ->line('')
            ->line($this->message)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
