<?php

namespace App\Listeners;

use App\Events\ApplicantRegistrationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\Helper;
use Mail;
use App\Mail\ApplicantRegister;
class ApplicantRegistrationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApplicantRegistrationEvent  $event
     * @return void
     */
    public function handle(ApplicantRegistrationEvent $event)
    {
        
        $model=$event->applicant;
        $user=$model->user;
        $data=$event->extraUserData;
        $text="Dear ".$user->name." ,Your Job's Portal Account logins are Email:".$user->email.",Password:".$data['password'];
          $phone="254720161652";
      $test=  Helper::sendSMS($user->phone,$text);
       Mail::to($user)->send(new ApplicantRegister($user,$data));
          
    }
}
