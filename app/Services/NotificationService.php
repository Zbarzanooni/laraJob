<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\JobAppliedNotification;
use Illuminate\Mail\Mailer;

class NotificationService
{

    protected $mailer ;

    public function __construct(Mailer $mailer){
        $this->mailer = $mailer;
    }
    public function jobApplied(User $user,$job){

        $user->notify(new JobAppliedNotification($user,$job));

    }
}
