<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Notifications;
use App\Event;
use App\User;
use auth;

class AddEvent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $event;

    public function __construct(Event $event )
    {
        $this->event = $event;
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


    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }



    public function toDatabase() {
    //gowa el db deh ba2oloh ana 3awez a save a? gwa el db bta3te
        //ba3mel post gded w 3awez 2a2ol lel user en feh post gded edaf
            return[
            'id'=>$this->event->id,
            'title'=>$this->event->title,
            'description'=>$this->event->description,
            'date'=>'10/10/2010',
        ];

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
            'data' => 'You have new Event ' .$this->event->title .' added by '. auth()->user()->name,
            ];
    }
}
