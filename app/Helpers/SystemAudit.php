<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\Input;
use Auth;
use Response;
use App\User;
use Session;
use Hash;
use DateTime;
use Mail;
use Modules\Account\Entities\CharterOfAccount;
use Validator;
use Redirect;
use App\SystemLog;
use App\SystemNotification;

;
class SystemAudit
{

   public  static function CreateEvent($user,$event_name,$description,$serverity,$ip_address,$module)
   {
       $model=new SystemLog();
       $model->user_id=$user->id;
       $model->event_name=strtoupper($event_name);
       $model->module_name=$module;
       $model->event_date=date('Y-m-d H:i:s');
       $model->ip_address=$ip_address;
       $model->event_description=$description;
       $model->severity=$serverity;
       $model->save();

    
   }


    public  static function CreateNotification($user,$type,$icon,$body)
   {
       $model=new SystemNotification();
       $model->user_id=$user->id;
       $model->notification_type=$type;
       $model->notification_icon=$icon;
       $model->notification_date=date('Y-m-d H:i:s');
       $model->notification_body=$body;
       $model->created_by==$user->id;
       
       $model->save();

    
   }




  
 
}