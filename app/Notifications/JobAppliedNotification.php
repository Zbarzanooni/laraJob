<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobAppliedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $job;
    public $user;
    public function __construct($user, $job)
    {
        $this->user = $user;
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('درخواست  همکاری جدید ')
            ->greeting('سلام ' . $this->user->name .'عزیز')
            ->line('درخواست شما برای شغل ' . $this->job->title . 'ارسال شد.')
            ->line('این شرکت  پس از برسی رزومه شما درصورت تمایل برای مصاحبه با شما تماس خواهد گرفت ' . $this->job->title . 'ارسال شد.')  ;
    }
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'درخواست شغل جدید',
            'message' => "{$this->user->name} برای شغل «{$this->job->title}» درخواست داده است.",
            'job_id' => $this->job->id,
            'user_id' => $this->user->id,
        ];
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
