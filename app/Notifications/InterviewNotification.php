<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterviewNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $job;
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('دعوت به مصاحبه')
            ->greeting('سلام ' . $notifiable->name)
            ->line('شما برای مصاحبه شغل «' . $this->job->title . '» دعوت شده‌اید.')
            ->action('مشاهده جزئیات مصاحبه', url('/jobs/' . $this->job->id))
            ->line('منتظر حضور شما هستیم 🌸');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'دعوت به مصاحبه',
            'message' => 'برای شغل «' . $this->job->title . '» دعوت به مصاحبه شدید.',
            'job_id' => $this->job->id,
        ];
    }

}
