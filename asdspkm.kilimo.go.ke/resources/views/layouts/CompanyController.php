<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Company\Entities\Group;
use Modules\Company\Entities\Contact;
use Modules\Company\Entities\GroupContact;
use Modules\Company\Entities\Payment;
use Modules\Company\Entities\Message as M;
use Modules\Company\Entities\Scheduled;
use Modules\Company\Entities\Topup;
use Modules\Company\Entities\CompanyAlert;
use Session;
use Validator;
use Input;
use Auth;
use DB;
use App\Helpers\Helper;
use App\Outgoing;
use App\User;
use Modules\UserManagement\Entities\Profile;
use Modules\UserManagement\Entities\Role;
use Entrust;
use App\Company;
use App\Helpers\SystemAudit;
use Mail;
use infobip\api\client\PreviewSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\preview\Preview;
use infobip\api\model\sms\mt\send\preview\PreviewRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\OutgoingReciepient;
use App\Jobs\sendBulkSms;
use Carbon\Carbon;
class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function delete($action,$id)
    {
       $response=Helper::delete($action,$id); 
       Session::flash('success_info',$response);
       return redirect()->back();
    }


    public function getMessageReport(Request $request)
    {
             $data['page-title']="Generate Reports";
        $id=auth::User()->company_id;
         

         return view('company::messages.message_reports',$data);
     }

       public function SingleSMS()
       {
         $data['page-title']="Send Single Sms";
         $data['company']=Company::find(auth::User()->company_id);
          $id=auth::User()->company_id;
         $data['models']=DB::select('select ContactNames,Phone from  
            [GMessenger].[dbo].[Contact]   where CompanyId=? and Active=1 order by ContactNames asc ',[$id]);
         $data['url']=url()->current();
          

          return view('company::messages.singlesms',$data);

       }

    public function DistinctMessage()
    {
           $data['page-title']="DISTINCT  Reports";
      
         

         return view('company::messages.distinct_message_reports',$data);


    }

    public function SendBulkSingle(Request $request)
    {
          $data=$request->all();
           
         
                 $number=$data['numbers'];
        $text=$data['message'];
       


        $company=Company::find(auth::User()->company_id);
        $senderID=$company->SenderId;
      
          $message=new \App\Message();
          $message->user_id=Auth::User()->id;
          $message->CompanyId=Auth::User()->company_id;
          $message->sent_time=date('Y-m-d H:i:s');
          $message->text_sms=$text;
          $message->sender_id=$senderID;
          $message->no_of_recipients=1;
          $message->isProcessed=1;
          $message->process_datetime=date('Y-m-d H:i:s');
          $message->send_by=Auth::User()->name;
          $message->save();
            $sendModel=Helper::EmalisySendSms($number,$senderID,$text,$message->id);
              if(sizeof($sendModel['data'])>0)
                      {

                          $smsData=$sendModel['data'][0];
                          $model=new \App\Outgoing();
                          $model->DateSent= $message->process_datetime;
                          $model->Recipient=$number;
                           $model->Network=$smsData->network;
                         $model->Incomingsms=$smsData->messageId;
                          $model->SMSCount=$smsData->consumedUnits;
                  $model->Processed=1;
                   $model->Status="PENDING";

                  $model->gateway="EmaliFy System";
                  $model->country= "KENYA";
                  $model->SMS=$message->text_sms;
                  $model->ServiceId=$message->id;
                  $model->SentBy=Auth::User()->email;
                  $model->SenderId=$message->sender_id;
                  $model->CompanyId=$message->CompanyId;
                  $model->save();

                      }
          Session::flash("success_msg","Message Send Successfully");
          return redirect('/home');





    }

    public function SendSingle(Request $request)
    {
        $data=$request->all();

         
                 $number=$data['Phone'];
        $text=$data['Text']."Stop *456*9*5#";
        //$number="254708236804";


        $company=Company::find(auth::User()->company_id);
        $senderID=$company->SenderId;


        $model=new \App\Message();
                              $model->text_sms=$text;
                              $model->user_id=auth::User()->id;
                              $model->CompanyId=Auth::user()->company_id;
                              $model->sent_time=date('Y-m-d H:i:s');
                              $model->sender_id=$senderID;
                              $model->no_of_recipients=1;
                              $model->send_by=Auth::user()->name;
                              $model->NumofMin=0;
                              $model->scheduledate=date('Y-m-d H:i:s');
                              $model->save();
                              $to=$number;
                             $models=DB::connection("sql_external")->SELECT('exec  [dbo].[Outgoing.Insert]  @SMS = ?,@ContactId=?,@ServiceId=?,@CompanyId=?,@SentBy=?,@SenderId=?',
                            array($model->text_sms ,$to,$model->id,$model->CompanyId,$email,$model->sender_id));
                              


         
      
       // $test=Helper::EmalisySendSms($number,$senderID,$text,1111);
           
        return 1;

           
       

    }





    public function compose(Request $request)
    {
          if(Entrust::hasRole(["Company","Staff"]) || Entrust::can("sent-sms"))
            {
/*
                $models=DB::connection('sql_external')->select('select Contact.ContactNames,Phone from ContactGroup 
  join Contact on Contact.ContactId=ContactGroup.ContactId
   where GroupId=167');
                 
                 $model=\App\Message::find(3955);
                 $big_array=array();
                   foreach($models as $contact)
                   {
                    $text="Dear ".$contact->ContactNames.", Kindly note our earlier cancelled visit to kantafu phase 1 will be on 17th July 2021. Meeting point will be at our offices at 8.00 A.M. kindly confirm your availability. For inquiry 0723911807";
                      
                     
                       $big_array[] =array("DateSent"=>date('Y-m-d H:i:s'),
                                            "Recipient"=>$contact->Phone,
                                            "ServiceId"=>$model->id,
                                            "CompanyId"=>20,
                                            "Processed"=>1,
                                            "SMS"=>$text,
                                            "Status"=>null,
                                            "SenderId"=>"PEFASACCO",
                                            "gateway"=>"Emalify Systems",
                                            "contact_name"=>$contact->ContactNames,
                                            "Source"=>"Web",
                                            "SentBy"=>$model->send_by


                                          );

                     

                   }



                   

                   



                    $chunk_size = 30;
                      
    foreach (array_chunk($big_array, $chunk_size) as $data_chunk ) {
 
   $sendmodel=\App\Outgoing::insert($data_chunk);
}
  dd("Hapa");
*/




                  
            if($request->isMethod('post'))
            {
            try{
                    $id=$request->get('group');
                    $to="";
                    $contacts=GroupContact::where('GroupId',$id)->get();
                    foreach ($contacts as $contact) 
                    {
                        $c=Contact::find($contact->contact_id);
                        $to.=$c->phone.",";
                       
                    }
                    $to=substr($to, 0, -1);
                    $company=Helper::getCompany(auth::user()->company_id);
                     if($company)
                     {
                    $key=$company->api_key;
                    $default_senderID=$company->default_senderID;
                    $balance=$company->balance;

                    //determine a proper sms cost

                    $sms_cost=9;
                    if($balance<0)
                    {
                    Session::flash('danger_msg','Your account does not have sufficient credit to process your request.Kindly topup your account credit ');
                        return redirect()->back();
                      }
                    $text=$request->get('message');

                    $response=Helper::sendSMS($to,$text,$key);

                      $email_body=$text;
                      $subject=$company->name."sent ".date('Y-m-d H:i:s');
                      Helper::sendEmail("hisanyad@gmail.com",$email_body,$subject);
                      $return_message=json_decode($response);
                    $success=$return_message->success;
                    Session::flash('success_msg','The message was sent successfully.');
                        return redirect()->back();
                    }
                    
                }catch(\Exception $e)
               {
                Helper::sendEmailToSupport($e);
                  Session::flash('error_msg','Their was an error sending the message please try again.');
                        return redirect()->back();
               }
        }
        else
        {
            $data['page_title']="Compose SMS";
            $data['groups']=Group::where('CompanyId',Auth::user()->company_id)->where('Deleted',0)->where(['Active'=>1])->get();

            $company=Company::where(['CompanyId'=>auth::User()->company_id])->first();
            $data['company']=$company;

            return view('company::sms.compose',$data);
        }


            }else{
                return view("forbidden");
            }
        
    }

    public function reports(Request $request)
    {
          if(Entrust::hasRole(["Company","Staff"])|| Entrust::can("sent-sms"))
            {
                //Helper::synclogs(20);

            $data['page_title']="SMS Reports";
           
            return view('company::sms.reports',$data);

            }else{
                return view("forbidden");
            }
        
        
    }

    public function groupCreate(Request $request)
    {
         if(Entrust::hasRole("Company")|| Entrust::can("manage-groups"))
            {
        if($request->isMethod('post'))
        {
            
                       



            $rules = array(
             'name'=>'required',
            
             );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {
                return redirect()->back()
                                ->withInput( Input::only('name'))
                                ->withErrors($validator->errors());
            }
            else
            {
                $name=$request->get('name');
                $group=Group::where('CompanyId',Auth::user()->company_id)->where('GroupName',$name)->first();
                if($group)
                {
                    Session::flash('error_msg','The group name already exists in your account.');
                    return redirect()->back();
                }
                else
                {
                     $data=$request->all();

                    $group=new Group;

                    $group->GroupName=$name;

                    $group->Active=($data['group_status']=="Active")?1:0;;
                    $group->abbreviation=$data['abbreviation'];
                    
                    $group->CompanyId=Auth::user()->company_id;
                    $group->DateCreated=date('Y-m-d H:i:s');
                    $group->StartDate=date('Y-m-d');
                    $group->EndDate=date('2030-m-d');
                    $group->Deleted=0;
                    $group->save();
                    
                    Session::flash('success_msg','Group has been created successfully.');
                    return redirect('/company/group/index');

                }


            }

        }
        else
        {
            $data['page_title']="Group Create";
            return view('company::group.create',$data);
        }

            }else{
                return view("forbidden");
            }
       
    }

    public function groupEdit(Request $request,$id)
    {
         if(Entrust::hasRole("Company") || Entrust::can("manage-groups"))
            {
                  $group=Group::where(['GroupId'=>$id])->first();

                if(!$group)
                {
                    Session::flash('error_msg','Group You are trying to edit does not exit in our records');
                    return redirect()->back();
                }
         if($request->isMethod('post'))
        {
             $data=$request->all();

         try{
            $rules = array(
             'name'=>'required',
             );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {
                return redirect()->back()
                                ->withInput( Input::only('name'))
                                ->withErrors($validator->errors());
            }
            else
            {
                    $name=$request->get('name');
                    $group=$group;
                    $group->GroupName=$name;
                   
                    $group->Active=$request->get('group_status');
                    $group->Abbreviation=$request->get('abbreviation');
                    $group->save();
                    Session::flash('success_msg','Group has been edited successfully.');
                    return redirect('/company/group/index');
            }



            }catch(\Exception $e)
            {
                                 Helper::sendEmailToSupport($e);
                Session::flash('error_msg','Error occured while processing your request,please try again');
                    return redirect()->back();
                
            }
        }
        else
        {
            $data['page_title']="Edit Group";
            $data['group']=$group;
            return view('company::group.edit',$data);
        }

            }else{
                return view("forbidden");
            }
    }

    public function ImportGroups(Request $request)
    {
       if($request->isMethod("post"))
       {
        $data=$request->all();
        try{

                        
  ini_set('memory_limit',-1);


         $file = $request->file('file');
            $filePath = $file->getPathName();

            $array=[]; 
            $duplicates=[];
         \DB::beginTransaction();
              $user=User::where(['company_id'=>$data['company_Id']])->first();

             
 
     $file = $request->file('file');
 



      \Excel::filter('chunk')->load($file)->chunk(250, function($results)
     {   
         dd($results);
          foreach($results as $row)
          {
                //save in database or do whatever you like here
                //print_r($row)
                echo "<br>" . $row['column_name_in_lowercase'];
 
          }
     });










            \Excel::load($filePath, function($reader)use( $user)  {
                $results = $reader->get()->toArray();          
                $count=0;
                $groups=$results[1];

              
                
                 foreach($groups as $group)
                 { 
                   
                   
                  $model=new Group();
                   $model->user_id=$user->id;
                   $model->company_id=$user->company_id;
                   $model->group_status=($group['active']==1)? "Active":"Inactive";
                   $model->name=$group['groupname'];
                   $model->abbreviation=$group['abbreviation'];
                   $model->is_group_deleted=$group['deleted'];
                   $model->save();

                  }



                  $contacts=$results[2];
                   foreach($contacts as $conta)
                   {
                     
                     $contact=Contact::where(['company_id'=>$user->company_id,'name'=>$conta['phone'],'phone'=>$conta['phone']])->first();
                       if(!$contact)
                       {
                      $contact=new Contact();
                      $contact->name=$conta['phone'];
                      $contact->phone=$conta['phone'];
                      $contact->email=$conta['phone'];
                      $contact->user_id=$user->id;
                      $contact->company_id=$user->company_id;
                      $contact->contact_status=($conta['active']==1)?"Active":"Inactive";
                      $contact->start_date=date('Y-m-d');
                      $contact->save();
                      }
                      
                      $group=Group::where(['name'=>$conta['groupname'],'company_id'=>$user->company_id])->first();

                       if($group)
                       {

                        $contactGroup=new GroupContact();
                        $contactGroup->contact_id=$contact->id;
                        $contactGroup->group_id=$group->id;
                        $contactGroup->save();

                         if($group->is_group_deleted==1)
                         {
                            $group->delete();
                         }

                       }
                     }
                     
                   });

                 \DB::commit();
        }catch(\Exception $e)
        {
             dd($e);
        }


     


          Session::flash("success_msg","Contact Imported Successfully");
          return redirect()->back();

       }

      $data['companies']=Company::all();
      $data['url']=url()->current();
       return view('company::group.import',$data);
     }



    public function groupIndex(Request $request)
    {
         if(Entrust::hasRole("Company")|| Entrust::can("manage-groups"))
            {
                 $data['page_title']="View Groups";
            
            return view('company::group.index',$data);

            }else{
                return view("forbidden");
            }
    }


    public function accoutSettings(Request $request)
    {
        if(Entrust::hasRole("Company")|| Entrust::can("manage-groups"))
            {
                 $data['page_title']="Company Settings";
                 $data['model']=$model=Company::find(auth::user()->company_id);
                  if(!$model)
                  {
                    return view("not_found");
                  }


                    if($request->isMethod("post"))
                    {
                        $data=$request->all();
                         try{
                             
                            $model->company_name=strtoupper($data['company_name']);
                            $model->company_email=$data['company_email'];
                            $model->company_type=$data['company_type'];
                            $model->physical_address=ucfirst($data['physical_address']);
                            $model->postal_address=$data['postal_address'];
                            $model->contact_person=ucwords($data['contact_person']);
                            $model->telephone=$data['telephone'];
                            $model->timezone=$data['timezone'];
                            $model->save();
                            Session::flash("success_msg","Account Details Updated successfully");
                            return redirect()->back();


                         }catch(\Exception $e)
                         {
                            Helper::sendEmailToSupport($e);
                            Session::flash("danger_msg","Error Occured while processing your request.System admin notified");
                           return redirect()->back();
                         }
                        

                    }
                  
            
            return view('company::settings.index',$data);

            }else{
                return view("forbidden");
            }

    }


    public function sendEmailAlerts(Request $request)
    {
        if(Entrust::hasRole("Company")|| Entrust::can("manage-groups"))
            {
                 $data['page_title']="Company Settings";
                 $data['model']=$model=Company::find(auth::user()->company_id);
                  if(!$model)
                  {
                    return view("not_found");
                  }


                    if($request->isMethod("post"))
                    {
                        try{
                            $data=$request->all();
                         if(isset($data['send_email_alert']))
                         {
                            $model->send_email_alerts=1;
                            $model->save();
                            $this->updateNotifications($model,$data);

                         }else{
                            $model->send_email_alerts=0;
                            $model->save();

                         }
                         Session::flash("success_msg","Detais Updated Successfully");
                         return redirect()->back();
                        }catch(\Exception $e)
                        {
                            Helper::sendEmailToSupport($e);
                            Session::flash("danger_msg","Error Occured while processing your request.System Admin Notified");
                            return redirect()->back();

                        }
                        }
                  
            
            return view('company::settings.email_alerts',$data);

            }else{
                return view("forbidden");
            }

    }


    public function updateNotifications($model,$data)
    {
        try{
            $model->alerts()->delete();
            $names=$data['name'];
            $emails=$data['email'];
             foreach ($names as $key => $value) {
                 $alert=new CompanyAlert();
                 $alert->company_id=$model->id;
                 $alert->name=$names[$key];
                 $alert->email=$emails[$key];
                 $alert->save();
             }

            return true;

        }catch(\Exception $e)
        {
            Helper::sendEmailToSupport($e);
            return false;
        }

         
    }






    public function DeactivateGroup($id)
    {
        $model=Group::find($id);
         if(!$model)
         {
            Session::flash("danger_msg","Group Details Not Found");
         }else{
            $model->group_status="Inactive";
            $model->save();
            Session::flash("success_msg","Group Deactivated successfully");
         }

         return redirect()->back();

    }

    public function ActivateGroups($id)
    {
        $model=Group::find($id);
         if(!$model)
         {
            Session::flash("danger_msg","Group Details Not Found");
         }else{
            $model->group_status="Active";
            $model->save();
            Session::flash("success_msg","Group Activated successfully");
         }

         return redirect()->back();

    }

    public function getGroupContacts($id)
    {
        $models=GroupContact::join('contacts','contacts.id','=','group_contact.contact_id')
              ->where(['group_id'=>$id])
              ->select('contacts.id','name','contact_status','phone','group_contact.created_at');
          return Datatables::of($models)->make(true);

    }
    public function MultipleOPeration($id,Request $request)
    {
        $group=Group::find($id);
        $data['group']=$group;
        $models=GroupContact::join('contacts','contacts.id','=','group_contact.contact_id')
               ->where(['group_id'=>$id])
               ->select('contacts.id','name','phone','contact_status')
               ->get();
         $data['models']=$models;
         $data['url']=url()->current();
           if($request->isMethod("post"))
           {
             $data=$request->all();
                if($data['action']=="removeFromGroup")
                {
                    $contacts=$data['contact_id'];
                      foreach($contacts as $key=>$value)
                      {
                         $mod=GroupContact::where(['group_id'=>$id,'contact_id'=>$contacts[$key]])->first();
                           if($mod)
                           {
                            $mod->delete();
                           }
                           $myaction="Contact(s) Removed From The Group Successfully";
                         
                      }

                    $myaction="Contact(s) Removed From The Group Successfully";
                }
                else if($data['action']=="Deactivate")
                {
                    $contacts=$data['contact_id'];
                      foreach($contacts as $key=>$value)
                      {
                         $mod=Contact::find($contacts[$key]);
                           if($mod)
                           {
                            $mod->contact_status="Inactive";
                            $mod->save();
                           }
                           $myaction="Contact(s) Deactivated Successfully";
                         
                      }

                 
                }
                else if($data['action']=="DeleteContacts")
                {
                     $contacts=$data['contact_id'];
                      foreach($contacts as $key=>$value)
                      {
                         $mod=Contact::find($contacts[$key]);
                           if($mod)
                           {
                            $mod->delete();
                           
                           }
                           $myaction="Contact(s) Deleted Successfully";
                         
                      }

                 
                }
              Session::flash("success_msg",$myaction);

              return redirect()->back();
           }

        return view('company::group._operation',$data);


    }

    public function fetchGroups()
    {
        $orgId=Auth::user()->company_id;
        $models= DB::select("SELECT  [GMessenger].[dbo].[group].GroupId , GroupName,DateCreated,CASE
            WHEN [Group].Active=1
               THEN 'Active'
               ELSE 'Disabled'
       END as Active,Abbreviation,StartDate,EndDate ,count(ContactId) as no_of_contacts
  FROM [GMessenger].[dbo].[Group]
  left join [GMessenger].[dbo].[ContactGroup] on [GMessenger].[dbo].[ContactGroup].GroupId=[GMessenger].[dbo].[group].GroupId
   where CompanyId=? and Deleted=0 group by GroupName,DateCreated,[Group].Active,Abbreviation,StartDate,EndDate,[GMessenger].[dbo].[group].GroupId",[$orgId]);
       
       $models=collect($models);
         
        return Datatables::of($models)
     
        ->addColumn('action',function($model){
          

            $edit_url=url('/company/group/edit/'.$model->GroupId);
             $view_url=url('/company/group/'.$model->GroupId);
            $delete_url=url('/company/group/delete/'.$model->GroupId);
            $deactivate_url=url('/company/group/deactivate/'.$model->GroupId);
            $activate_url=url('/company/group/activate/'.$model->GroupId);
            $index_url=url('/company/group/index');
             if($model->Active=="Active")
             {
                  return ' <div class="dropdown">
  <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a style="cursor:pointer;"   data-title="Edit Contact" href="'.$edit_url.'">Edit</a></li>
      <li class="dropdown-divider"></li>


      <li><a style="cursor:pointer;"  class="reject-modal"  data-title="Reset Pasword" data-url="'.$view_url.'">View Contacts</a></li>
        <li class="dropdown-divider"></li>
     <li><a style="cursor:pointer;"  class="reject-modal"  data-name="User Account" data-action="1"   data-title="Block User Account"   href="'.$deactivate_url.'">Block Account</a></li>
       <li class="dropdown-divider"></li>

      <li><a style="cursor:pointer;"  class="reject-modal"   data-title="Delete Group"   data-url="'.$delete_url.'">Delete Group</a></li>
    
  </ul>
</div> ';
                 

             }else{
                  return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                <li> <a href="'.$edit_url.'">Edit</a></li>
                                                 <li> <a href="'.$view_url.'">View Contacts</a></li>
                                                 <li><a style="cursor:pointer;" data-name="Group" data-action="0"   data-title="Activate Group" data-url="'.$activate_url.'" class="deactivate-record" >Activate</a></li>
                                             
                                                 <li><a style="cursor:pointer;"  class="reject-modal"   data-title="Delete Group"   data-url="'.$delete_url.'">Delete Group</a></li>

                                            </ul>
                                        </div>';
             }
          



        })
        ->make(true);
    }

    public function DeleteGroup($id,Request $request)
    {
         
         $data['model']=$model=Group::where(['GroupId'=>$id])->first();
           if($request->isMethod("post"))
           {
            $userID=Auth::User()->id; 
            $model->ModifiedBy=$userID;
            $model->DateModified=date('Y-m-d H:i:s');
            $model->DeletedBy=$userID;
            $model->DateDeleted=date('Y-m-d H:i:s');
            $model->Deleted=1;
            $model->save();
                
     
           
         Session::flash("success_msg","Group Deleted Successfully");
            
         return redirect('/company/group/index');

           }
            $data['url']=url()->current();

              return view('company::group.delete',$data);
        

    }

    public function groupContacts($id)
    {
        
        $group=Group::find($id);

        if(!$group)
        {
            $data['page_title']="Unavailable Resouce";
            return View("templates.resource");
        }
        else
        {

            if(Auth::user()->id == $group->user_id)
            {
                $data['page_title']="View Group";
                $data['group']=$group;
                $data['contacts']=GroupContact::join('groups','groups.id','=','group_contact.group_id')
                ->join('contacts','contacts.id','=','group_contact.contact_id')
                ->where('group_contact.group_id','=',$id)
                ->get();

                $data['contacts_count']=GroupContact::join('groups','groups.id','=','group_contact.group_id')
                ->join('contacts','contacts.id','=','group_contact.contact_id')
                ->where('group_contact.group_id','=',$id)
                ->count();

                                    
                return view('company::group.contacts',$data);
            }
            else
            {
                $data['page_title']="forbidden Resource";
                return View("templates.forbidden");
            }


        }        
           
        //$data['contacts']=Contact::join('gr','','','')->select()('group_id',$id)->get();
    } 

    /*Contacts Functions*/

    public function contactCreate(Request $request)
    {
   if(Entrust::can("manage-contacts")|| Entrust::hasRole("Company") || Entrust::hasRole("Admin"))
            {
               






                if($request->isMethod('post'))
        {
            
            $rules = array(
             'name'=>'required',
             'number'=>'required'
             );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {
                return redirect()->back()
                                ->withInput()
                                ->withErrors($validator->errors());
            }
            else
            {
                $contact=Contact::where(['Phone'=>$request->get('number'),'ContactNames'=>$request->get('name')])->where('CompanyId',Auth::user()->company_id)->first();
                if($contact)
                {
                     $contact->Active=1;
                     $contact->Deleted=0;
                     $contact->ModifiedBy=Auth::user()->email;
                     $contact->DateModified=date('Y-m-d H:i:s');
                     $contact->save();

                         $admin=Auth::User();
                $description=$admin->name." ,Restored Contact with the following Details Name: ".$contact->ContactNames ." and Telephone:".$contact->Phone ;

                   $browserDetails =$request->header('User-Agent');
                $client_ip=$request->ip();
        SystemAudit::CreateEvent($admin,"Restored",$description,"Major Incident",$client_ip,"Contact Management");
                    Session::flash('success_msg','Contact  Restored Successfully.');
                     return redirect('/company/contact/index');
                }
                else
                {
                     
                    
                      $data=$request->all();
                       DB::beginTransaction();
                        $cid=Auth::user()->company_id;
                         
               
                    $contact=new Contact;
                    $contact->ContactNames=$request->get('name');
                  
                    $contact->Phone=$request->get('number');
                    $contact->CompanyId=$cid;
                    $contact->EmailAddress=$request->get('email');
                    $contact->Active=($data['contact-status']=="Active")?1:0;
                    $contact->ActiveFrom=date('Y-m-d',strtotime($data['start_date']));
                    $contact->ActiveTo=date('Y-m-d',strtotime($data['end_date']));
                    $contact->ModifiedBy=Auth::User()->email;
                    $contact->DateModified=date('Y-m-d H:i:s');
                    $contact->Deleted=0;
                    $contact->save();



                    $admin=Auth::User();
                $description=$admin->name." ,created new Contact with the following Details: ".$contact->ContactNames ." and Telephone ".$contact->Phone ;

                   $browserDetails =$request->header('User-Agent');
                $client_ip=$request->ip();
        SystemAudit::CreateEvent($admin,"Created",$description,"Major Incident",$client_ip,"Contact Management");
                             


                    if($request->has('groups'))
                    {
                        foreach ($request->get('groups') as $id) {
                            $group=new GroupContact;
                            $group->GroupId=$id;
                            $group->ContactId=$contact->ContactId;
                            $group->ModifiedBy=Auth::User()->email;
                            $group->DateModified=date('Y-m-d H:i:s');
                            $group->Active=1;
                            $group->save();
                        }
                    }
                    DB::commit();
                   /* $company=Company::find(auth::User()->company_id);
                    $email_body="New Contact :<br> Name :  ".$contact->name."<br> Phone :".$contact->phone."<br> Email :".$contact->email."<br> has been added to your contact list ";
                    $email=auth::User()->email;
                    Helper::sendEmail($email,$email_body,$company->company_name."-New Contact Added");*/



                    Session::flash('success_msg','Contact has been created successfully.');
                    return redirect('/company/contact/index');
                }        

                
            }
        }
        else
        {
            $data['page_title']="Contact Create";
           

            $data['groups']=Group::where('CompanyId',Auth::user()->company_id)->where('Deleted',0)->get();
             
            return view('company::contact.create',$data);
        }

            }else{
                return view("forbidden");
            }
        
    }
    public function getCountyCode(Request $request)
    {

       $model=\App\Country::where(['Name'=>$request->get('name')])->latest('id')->first();
         if($model)
         {   
             $models=\App\Country::where(['Name'=>$request->get('name')])->get();
              $nets="<option value=''>---Select Network</option>";
              
               foreach($models as $mod)
               {
              $nets.="<option>".$mod->network."</option>";
               }

             $data['code']=$model->CountryCode;
              $data['network']= $nets;

            return $data ;
         }else{
            $data['code']=254;

            return 254;
         }
    }

    public function contactImport(Request $request)
    {
    if(Entrust::can("manage-contacts")|| Entrust::hasRole("Company") || Entrust::hasRole("Admin"))
     {

        if($request->isMethod('post'))
        {

            $data=$request->all();

            $file = $request->file('file');
            $filePath = $file->getPathName();

            $array=[]; 
            $duplicates=[];

            \Excel::load($filePath, function($reader) use ($data) {
                $results = $reader->get()->toArray();          
                $count=0;
                   $chunk_size = 30;
                      
            foreach (array_chunk($results, $chunk_size) as $data_chunk ) {
                            foreach($data_chunk as $row)
                            {
                                 $row['name']="Customer";
                               $orgId=Auth::user()->company_id;
                              $phone=Helper::processNumber($row['phone']);
                                $contact=Contact::where(['Phone'=>$phone,'CompanyId'=>$orgId])->first();
                                  try{
                                     DB::beginTransaction();

                                    if(!$contact)
                                    {
                                      $contact=new Contact();
                                      $contact->Phone=$phone;
                                      $contact->CompanyId=$orgId;
                                      $contact->ContactNames=$row['name'];
                                      $contact->Active=1;
                                      $contact->Deleted=0;
                                      $contact->ModifiedBy=Auth::User()->id;
                                      $contact->DateModified=date('Y-m-d H:i:s');

                                      //$contact->EmailAddress=$row['email'];
                                      $contact->save();
                                       
                                    }

                                    $contactgroup=new GroupContact();
                                    $contactgroup->ContactId=$contact->ContactId;
                                    $contactgroup->GroupId=$data['GroupId'];
                                    $contactgroup->ModifiedBy=$contact->ModifiedBy;
                                    $contactgroup->Active=1;
                                    $contactgroup->DateModified=$contact->DateModified;
                                    $contactgroup->save();
                                    DB::commit();

                                  }catch(\Exception $e){
                                    
                                    Helper::sendEmailToSupport($e);

                                  }
                                 
                                }
                     
                 }


               $numbers='';
                //dd($duplicates);
                if (sizeof(@$duplicates) > 0) 
                {                
                    foreach (@$duplicates as $dup) {
                        $numbers.=$dup.',';
                    }    

                    Session::flash('error_msg','Contact(s) has (have) been imported successfully although the following numbers have been skipped as duplicates: '.$numbers);
                }
                else
                {

                    Session::flash('success_msg','Contact(s) has (have) been imported successfully.');
                   
                }

              
            });
            
            return redirect('/company/contact/index');
        }
        else
        {
            $data['page_title']="Import Contacts";
            $data['groups']=Group::where(['CompanyId'=>Auth::user()->company_id,'Active'=>1,'Deleted'=>0])->get();
            return view('company::contact.import',$data);
        }
    }else{
        return view("forbidden");
    }
    }


    public function contactGroups()
    {
        if(Entrust::can("manage-contacts")|| Entrust::hasRole("Company") || Entrust::hasRole("Admin"))
            {
        $data['page_title']="Contact Groups";
        $data['groups']=Group::where(['company_id'=>auth::user()->company_id,'group_status'=>'Active'])->get();
         
        return view('company::contact.group_list',$data);

    }else{
        return view("forbidden");
    }


    }


    public function createNewGroup($company_id,$name)
    {
       try{
        $model=new Group();
        $model->company_id=$company_id;
        $model->name=ucfirst($name);
        $model->abbreviation=$model->name;
        $model->group_status="Active";
        $model->save();
        return $model;


       }catch(\Exception $e)
       {
         Helper::sendEmailToSupport($e);
         return false;
       }

    }



    public function contactIndex(Request $request)
    {
    if(Entrust::can("manage-contacts")|| Entrust::hasRole("Company") || Entrust::hasRole("Admin"))
      {
         $data['page_title']="View Contacts";
         return view('company::contact.index',$data);
    }else{
        return view("forbidden");
    }
    }
    public function fetchGroupContacts(Request $request)
    {
        $models=GroupContact::join('contacts','contacts.id','=','group_contact.contact_id')
               ->join('groups','groups.id','=','group_contact.group_id')
               ->select('contacts.id','groups.name as group_name','contacts.name','abbreviation','phone','email','contact_status','groups.id as group_id')
               ->where(['contacts.company_id'=>auth::User()->company_id])
               ->get();
      return Datatables::of($models)
        ->filter(function ($instance) use ($request) {
                if ($request->has('groupName')) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['group_id'], $request->get('groupName')) ? true : false;
                    });
                }
                 if ($request->has('name')) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['name'], ucwords($request->get('name'))) ? true : false;
                    });
                }
                  if ($request->has('phone')) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['phone'], $request->get('phone')) ? true : false;
                    });
                }
                
                 if ($request->has('status')) {
                   
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['contact_status'], $request->get('status')) ? true : false;
                    });
                }
            }) ->make(true);
    }

    public function deactivateConctact($id)
    {
      if(Entrust::can("manage-contacts")|| Entrust::hasRole("Company") || Entrust::hasRole("Admin"))
      {
          $model=Contact::find($id);
           if(!$model)
           {
            Session::flash("danger_msg","Contact Details Not Found");
            return redirect()->bacK();
           }
           $model->contact_status="Inactive";
           $model->save();
           Session::flash("success_msg","Contact Deactivate successfully");
           return redirect()->bacK();

    }else{
        return view("forbidden");
    }
    }

    public function activateContacts($id)
    {
          if(Entrust::can("manage-contacts")|| Entrust::hasRole("Company") || Entrust::hasRole("Admin"))
      {
          $model=Contact::find($id);
           if(!$model)
           {
            Session::flash("danger_msg","Contact Details Not Found");
            return redirect()->bacK();
           }
           $model->contact_status="Active";
           $model->save();
           Session::flash("success_msg","Contact Activate successfully");
           return redirect()->bacK();

    }else{
        Session::flash("danger_msg","You do not have permissions to perform this function.Contact System admin for assistance");
         return redirect()->bacK();
    }

    }
    public function getInactiveContacts()
    {
         $data['page_title']="Inactive Contacts";

        return view('company::contact.inactive',$data);
    }

    public function getDeletedContacts()
    {
         $data['page_title']="Deleted Contacts";

        return view('company::contact.deleted',$data);

    }
    public function fetchDeletedcontacts()
    {
        $id=auth::user()->company_id;

           $models=\DB::select(\DB::raw("call getOrgDeletedList($id)"));
          $models=collect($models);

        return Datatables::of($models)
         ->editColumn('contact_status',function($model){
             if($model->contact_status=="Inactive")
             {
                return '<label class="label label-danger">Inactive</label>';
             }else{
                 return '<label class="label label-success">Active</label>';
             }

         })
         ->addColumn("action",function($model){

        
         $edit_url=url('/company/contact/edit/'.$model->id);
             $view_url=url('/company/group/'.$model->id);
            $delete_url=url('/company/contact/delete/'.$model->id);
            $deactivate_url=url('/company/contact/Restore/'.$model->id);
            $activate_url=url('/company/contact/activate/'.$model->id);
            $group_url=url('/company/contacts/view-groups/'.$model->id);
            $index_url=url('/company/contact/index');

              return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                
                                                <li><a style="cursor:pointer;" data-name="Restore" data-action="0"   data-title="Restore Contact" data-url="'.$deactivate_url.'" class="deactivate" >Restore</a></li>
                                               
                                                <li class="divider"></li>
                                                 <li><a style="cursor:pointer"  data-urlto="'.$index_url.'" class="delete-record" data-url="'.$delete_url.'">Delete</a></li>
                                            </ul>
                                        </div>';

           


         })->make(true);


    }

    public function fetchInactiveContacts()
    {
        
         $id=auth::user()->company_id;

           $models=\DB::select(\DB::raw("call getOrgContacts($id,'Inactive')"));
          $models=collect($models);

        return Datatables::of($models)
         ->editColumn('contact_status',function($model){
             if($model->contact_status=="Inactive")
             {
                return '<label class="label label-danger">Inactive</label>';
             }else{
                 return '<label class="label label-success">Active</label>';
             }

         })


         ->addColumn('action',function($model){

            $edit_url=url('/company/contact/edit/'.$model->id);
             $view_url=url('/company/group/'.$model->id);
            $delete_url=url('/company/contact/delete/'.$model->id);
            $deactivate_url=url('/company/contact/deactivate/'.$model->id);
            $activate_url=url('/company/contact/activate/'.$model->id);
            $group_url=url('/company/contacts/view-groups/'.$model->id);
            $index_url=url('/company/contact/index');
             if($model->contact_status=="Active")
             {
                 return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                <li> <a href="'.$edit_url.'">Edit</a></li>
                                                 <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$group_url.'"  data-title="View Groups Attached To">View Groups</a></li>
                                                <li><a style="cursor:pointer;" data-name="Contact" data-action="1"   data-title="Deactivate Contact" data-url="'.$deactivate_url.'" class="deactivate" >Deactivate</a></li>
                                               
                                                <li class="divider"></li>
                                                 <li><a style="cursor:pointer"  data-urlto="'.$index_url.'" class="delete-record" data-url="'.$delete_url.'">Delete</a></li>
                                            </ul>
                                        </div>';

             }else{

                 return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                <li> <a href="'.$edit_url.'">Edit</a></li>
                                                 <li> <a class="pop-modal" data-url="'.$group_url.'" data-title="View Groups Attached To">View Groups</a></li>
                                                <li><a data-name="Contact" style="cursor:pointer;" data-action="0" data-title="Activate Contact" data-url="'.$activate_url.'" class="activate" >Activate</a></li>
                                               
                                                <li class="divider"></li>
                                                 <li><a style="cursor:pointer"  data-urlto="'.$index_url.'" class="delete-record" data-url="'.$delete_url.'">Delete</a></li>
                                            </ul>
                                        </div>';
             }
           



        })
        ->make(true);

    }

    public function fetchAllContacts()
    {

        

     $id=auth::user()->company_id;
      $models=DB::select(" SELECT distinct ContactId as CID, ContactNames,Phone,EmailAddress,ActiveFrom,ActiveTo,
CASE
            WHEN Active=1
               THEN 'Active'
               ELSE 'Disabled'
       END as Active,

       IsMobileUser,

        
        STUFF ((SELECT DISTINCT ',' + GroupName FROM  [GMessenger].[dbo].[Contact] 
                join  [GMessenger].[dbo].ContactGroup on  [GMessenger].[dbo].[contact].ContactId= [GMessenger].[dbo].[ContactGroup].ContactId
                join  [GMessenger].[dbo].[Group] on  [GMessenger].[dbo].[Group].GroupId= [GMessenger].[dbo].[ContactGroup].GroupId
                where  [GMessenger].[dbo].[ContactGroup].ContactId=Co.ContactId
                
                FOR XML PATH(''), ROOT('MyProduct'), TYPE).value('/MyProduct[1]','VARCHAR(MAX)'), 1, 1,'') AS groups from  [GMessenger].[dbo].[Contact] co
                
                where Co.CompanyId=? and Co.Active=1 and Co.Deleted=0   order by Co.ContactID desc ",[$id]);

          // $models=\DB::select(\DB::raw("call getOrgContacts($id,'Active')"));
          $models=collect($models);

              
    return Datatables::of($models)
         ->editColumn('Active',function($model){
             if($model->Active=="Disabled")
             {
                return '<label class="label label-danger">Inactive</label>';
             }else{
                 return '<label class="label label-success">Active</label>';
             }

         })


         ->addColumn('action',function($model){

            $edit_url=url('/company/contact/edit/'.$model->CID);
             $view_url=url('/company/group/'.$model->CID);
            $delete_url=url('/company/contact/delete/'.$model->CID);
            $deactivate_url=url('/company/contact/deactivate/'.$model->CID);
            $activate_url=url('/company/contact/activate/'.$model->CID);
            $group_url=url('/company/contacts/view-groups/'.$model->CID);
            $user_url=url('/company/contact/ConvertToUser/'.$model->CID);
            $index_url=url('/company/contact/index');
             if($model->Active=="Active")
             {

                    if($model->IsMobileUser==0)
                    {
                          return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-success dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                <li> <a href="'.$edit_url.'">Edit</a></li>
                                                  <li class="dropdown-divider"></li>
                                                  <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$user_url.'"  data-title="Convert To Mobile User">Convert To Mobile User</a></li>
                                                     <li class="dropdown-divider"></li>

                                                 <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$group_url.'"  data-title="View Groups Attached To">View Groups</a></li>
                                                   <li class="dropdown-divider"></li>
                                                <li><a style="cursor:pointer;" data-name="Contact" data-action="1"   data-title="Deactivate Contact" data-url="'.$deactivate_url.'" class="deactivate" >Deactivate</a></li>
                                                 <li class="dropdown-divider"></li>
                                                <li class="divider"></li>

                                                <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$delete_url.'"  data-title="Confirm Delete">Delete</a></li>

                                                
                                            </ul>
                                        </div>';



                    }else{
                          return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                <li> <a href="'.$edit_url.'">Edit</a></li>
                                                
                                                    <li class="dropdown-divider"></li>
                                                 <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$group_url.'"  data-title="View Groups Attached To">View Groups</a></li>
                                                   <li class="dropdown-divider"></li>
                                                <li><a style="cursor:pointer;" data-name="Contact" data-action="1"   data-title="Deactivate Contact" data-url="'.$deactivate_url.'" class="deactivate" >Deactivate</a></li>
                                                 <li class="dropdown-divider"></li>
                                                <li class="divider"></li>
                                                 <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$delete_url.'"  data-title="Confirm Delete">Delete</a></li>

                                            </ul>
                                        </div>';

                    }
               

             }else{

                 return '<div class="btn-group ">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" aria-expanded="true">Actions<span class="caret"></span></a>
                                            <ul class="dropdown-menu text-left">
                                                <li> <a href="'.$edit_url.'">Edit</a></li>
                                                  <li class="dropdown-divider"></li>
                                                 <li> <a class="pop-modal" data-url="'.$group_url.'" data-title="View Groups Attached To">View Groups</a></li>
                                                   <li class="dropdown-divider"></li>
                                                <li><a data-name="Contact" style="cursor:pointer;" data-action="0" data-title="Activate Contact" data-url="'.$activate_url.'" class="activate" >Activate</a></li>
                                               
                                                <li class="divider"></li>
                                                 <li> <a style="cursor:pointer;" class="reject-modal" data-url="'.$delete_url.'"  data-title="Confirm Delete">Delete</a></li>
                                            </ul>
                                        </div>';
             }
           



        })
        ->make(true);
    }


    public function  ConvertToUser($id,Request $request)
    {
        $contact=Contact::find($id);
         $data['contact']=$contact;
         $data['model']=new User();
         $data['url']=url()->current();
            if($request->isMethod("post"))
            {
                $data=$request->all();
                DB::beginTransaction();
                $user=User::where(['email'=>$data['email']])->first();
                  if(!$user)
                  {
                     $user=new User();
                 $user->name=$data['name'];
                 $user->phone=$data['phone'];
                 $user->email=$data['email'];
                 $user->password=$data['password'];
                 $user->company_id=Auth::User()->company_id;
                 $user->user_type="External";
                 $user->user_status="Active";
                 $user->confirmed_at=date('Y-m-d H:i:s');
                 $user->verification_code=str_random(6);
                 $user->save();
                  $company=Company::where(['CompanyId'=>$user->company_id])->first();
                    if($company)
                    {
                        $senderID=$company->SenderId;
                    }else{
                       $senderID="Geecko" ;
                    }
                 

                 $text="Dear ".$user->name.",your mobile application logins are \n username:".$user->email."\n Password :".$data['password']." \n";
                 $test=Helper::infobipSendSingleSms($user->phone,$senderID, $text);
                 $profile=new Profile();
                  $profile->user_id=$user->id;
                  $profile->telephone=$user->phone;
                  $profile->save();
                   $role=Role::where('name','Contact User')->first();
                   $user->roles()->attach($role->id);

                  }
                
                   $contact->UserId=$user->id;
                   $contact->IsMobileUser=1;
                   $contcat->EmailAddress=$user->email;
                   $contact->DateModified=date("Y-m-d H:i:s");
                   $contact->save();
                DB::commit();
                Session::flash("success_msg","User Account Created Successfully");
                return redirect()->back();

                  
            }






          return view('company::contactuser.create',$data);


    }

    public function ContactsView($id)
    {
        $contact=Contact::find($id);

        if(!$contact)
        {
            $data['page_title']="Unavailable Resouce";
            return View("templates.resource");
        }
        else
        {

            if(Auth::user()->id == $contact->user_id)
            {
                $data['page_title']="View Contact";
                $data['contact']=$contact;
                $data['contacts']=GroupContact::join('groups','groups.id','=','group_contact.group_id')
                ->join('contacts','contacts.id','=','group_contact.contact_id')
                ->where('group_contact.group_id','=',$id)
                ->get();

                $data['contacts_count']=GroupContact::join('groups','groups.id','=','group_contact.group_id')
                ->join('contacts','contacts.id','=','group_contact.contact_id')
                ->where('group_contact.group_id','=',$id)
                ->count();

                                    
                return view('company::group.contacts',$data);
            }
            else
            {
                $data['page_title']="forbidden Resource";
                return View("templates.forbidden");
            }


        } 
    }

    public function getGroups($id)
    {
      $model=Contact::find($id);
        if($model)
        {
            $data['model']=$model;
            $data['groups']=$model->groups;
            return view('company::contact.view',$data);
            
        }else{
            Session::flash("danger_msg","Details Not Found");
            return redirect()->back();
        }

    }

    public function RestoreDeletedContacts($id)
    {
       
      $model=Contact::withTrashed()->find($id)->restore();
       Session::flash("success_msg","Contact Restored Successfully");
        return redirect()->back();

    }

    public function DeleteContact($id,Request $request)
    {
            
        try{
            $model=Contact::where(['ContactId'=>$id])->first();
              
                if($request->isMethod("post"))
                {
                     $data=$request->all();

                       
                             if($model)
                           {

                             $model->Deleted=1;
                             $model->DeletedBy=Auth::user()->email;
                             $model->DeletedAt=date('Y-m-d H:i:s');
                             $model->Active=0;
                             $model->save();

                                      $admin=Auth::User();
                $description=$admin->name." ,deleted Contact with the following Details: ".$model->ContactNames ." and Telephone ".$model->Phone."from Your List" ;

                   $browserDetails =$request->header('User-Agent');
                $client_ip=$request->ip();
        SystemAudit::CreateEvent($admin,"Deleted",$description,"Major Incident",$client_ip,"Contact Management");




                               $user=User::find($model->UserId);
                                 if($user)
                                 {
                                    $user->delete();
                                 }

                           
                            
                                Session::flash("success_msg","Contact Deleted Successfully");
                                return redirect()->back();

                           }

                }
                 $data['model']=$model;
                 $data['url']=url()->current();             

               return view('company::contact.delete_contact',$data);
           
           


        }catch(\Exception $e)
        {
            Helper::sendEmailToSupport($e);
            Session::flash("danger_msg","Error Occured While Deleting Contact.System Admin notified");
        }

    }

    public function contactEdit(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
             $rules = array(
             'name'=>'required',
             'number'=>'required'
             );
             $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {
                return redirect()->back()
                                ->withInput()
                                ->withErrors($validator->errors());
            }
            else
            {
                $data['gc']=GroupContact::where('ContactId',$id)->get();

                foreach ($data['gc'] as $c) 
                {  
                    
 
                  $c->delete();
                }

                $contact=Contact::find($id);
                $contact->ContactNames=$request->get('name');
                $contact->Phone=$request->get('number');
            
                $contact->EmailAddress=$request->get('email');
               
                $data=$request->all();
                $contact->ActiveFrom=date('Y-m-d',strtotime($data['start_date']));
                $contact->ActiveTo=date('Y-m-d',strtotime($data['end_date']));
                
                $contact->save();
                if($request->has('groups'))
                {
                     
                    foreach ($request->get('groups') as $id) {
                        $group=new GroupContact;
                        $group->GroupId=$id;
                        $group->ContactId=$contact->ContactId;
                        $group->save();
                    }
                }

                Session::flash('success_msg','Contact has been updated successfully.');
                return redirect('/company/contact/index');
            }
        }
        else
        {
            $data['contact']=Contact::find($id);

            $data['groups']=Group::where('CompanyId',Auth::user()->company_id)->get();
            $data['gc']=GroupContact::where('ContactId',$id)->select('GroupId')->get();
            $co=[];
            foreach ($data['gc'] as $c) 
            {
               $co[]=$c->GroupId;     
            }
            $data['co']=$co;

           


            $data['page_title']="Contact Edit";

            return view('company::contact.edit',$data);
        }
    }

    public function topupCreate(Request $request)
    {
        //dd($request->all());
        if($request->has('txncd'))
        {
            $txn=$request->get('txncd');
            $payment=Payment::where('txncd',$txn)->first();
            if(!$payment)
            {
                $payment=new Payment;
            }
            $payment->txncd=$request->get('txncd');
            $payment->qwh=$request->get('qwh');
            $payment->afd=$request->get('afd');
            $payment->poi=$request->get('poi');
            $payment->uyt=$request->get('uyt');
            $payment->ifd=$request->get('ifd');
            $payment->agt=$request->get('agt');
            $payment->status=$request->get('status');
            $payment->ivm=$request->get('ivm');
            $payment->mc=$request->get('mc');
            $payment->msisdn_id=$request->get('msisdn_id');
            $payment->msisdn_idnum=$request->get('msisdn_idnum');
            $payment->channel=$request->get('channel');
            $payment->hsh=$request->get('hsh');
            $payment->user_id=$request->get('p1');
            $payment->save();

            if($payment->status=='fe2707etr5s4wq')
            {
                $payment->status='Failed';
                $payment->save();
                Session::flash('success_info','Failed transaction. Not all parameters are fulfilled.');
            }
            elseif($payment->status=="aei7p7yrx4ae34")
            {
                $payment->status='Successful';
                $payment->save();
                Session::flash('success_info','The transaction has been successful.');

                if($payment->count==0)
                {

                    $user=User::find($payment->user_id);
                    $balance=$user->balance;
                    $user->balance=$balance+$payment->mc;
                    $user->save();
                    $payment->count=1;
                    $payment->save();
                }
                
            }
            elseif($payment->status=="bdi6p2yy76etrs")
            {
                $payment->status='Pending';
                $payment->save();
                Session::flash('success_info','Pending: Incoming Mobile Money Transaction Not found. Please try again in 5 minutes.');
            }
            elseif($payment->status=="cr5i3pgy9867e1")
            {
                $payment->status='Used';
                $payment->save();
                Session::flash('success_info','This code has already been used. A notification of this transaction has been sent to the merchant.');
            }
            elseif($payment->status=="dtfi4p7yty45wq")
            {
                $payment->status='Less';
                $payment->save();
                Session::flash('success_info','Less: The amount that you have sent via mobile money is LESS than what was required to validate this transaction.');
                if($payment->count==0)
                {
                    $user=User::find($payment->user_id);
                    $balance=$user->balance;
                    $user->balance=$balance+$payment->mc;
                    $user->save();
                    $payment->count=1;
                    $payment->save();
                }
            }
            elseif($payment->status=="eq3i7p5yt7645e")
            {
                $payment->status='More';
                $payment->save();
                Session::flash('success_info','More: The amount that you have sent via mobile money is MORE than what was required to validate this transaction.');
                if($payment->count==0)
                {
                    $user=User::find($payment->user_id);
                    $balance=$user->balance;
                    $user->balance=$balance+$payment->mc;
                    $user->save();
                    $payment->count=1;
                    $payment->save();
                }

            }

            //return redirect('/company/topup/create');
        }
        
        $data['page_title']="Initiate Topup";
        return view('company::topup.create',$data);
    }

    public function topupIndex()
    {
        $data['page_title']="Payment History";
       
        return view('company::topup.index',$data);
    }

    public function fetchPaymentHistory()
    {
        $models=Payment::where(['company_id'=>auth::user()->company_id]);
        return Datatables::of($models)->make(true);
    }



    public function getAccount(Request $request)
    {
        $data['page_title']="Account Settings";
        $data['sender_id']= (empty(Auth::user()->sender_id)) ? 'PICTONET' : Auth::user()->sender_id;
        $data['model']=$model=Company::find(auth::user()->company_id);
         if(!$model)
         {
          return view("not_found");
         }
          if($request->isMethod("post"))
          {
            $data=$request->all();
            $model->sms_validity_period=$data['sms_validity_period'];
            $model->sms_length=$data['sms_length'];
            $model->save();
            Session::flash("success_msg","Details Updated Successfully");
            return redirect()->back();
            

          }




        return view('company::settings.settings',$data);
    }
    public function profile(Request $request)
    {
        if($request->isMethod('post'))
        {

        }
        else
        {
            $data['page_title']="Account Profile";

            return view('company::settings.profile',$data);
        }
    }
    public function smsPreview(Request $request)
    {   
        $text=$request->get("text");

        // Initializing PreviewSms client with appropriate configuration
        $client = new PreviewSms(new BasicAuthConfiguration('geecko', 'geecko23'));

        // Creating request body
        $previewRequest = new PreviewRequest();
        $previewRequest->setText($text);
        //$previewRequest->setLanguageCode("ENG");
        /*$previewRequest->setTransliteration("TURKISH");*/

        // Executing request
         if(strlen($text)>0)
         {
            $previewResponse = $client->execute($previewRequest);

        /** @var Preview $noConfigurationPreview */
        $noConfigurationPreview = $previewResponse->getPreviews()[0];

        /** @var Preview $noConfigurationPreview */
        //$configurationPreview = $previewResponse->getPreviews()[1];

        return json_encode($noConfigurationPreview);

         }
        
    }

    public function smsCost(Request $request)
    {
        dd($request->all());
        $count=$request->get('count');
        $groups-$request->get('groups');
    }
    public  function sendPersonalized($data)
    {
          try{
              $groups=$data['groups'];
        $models=GroupContact::join('Contact','Contact.ContactId','=','ContactGroup.ContactId')->whereIn('GroupId',$groups)->select('ContactNames','Phone')->get();
         $big_array=array();
             
             $senderId=$data['sender_id'];
                DB::beginTransaction();
                 $text=$data['message'];
                $model=new \App\Message();
                              $model->text_sms=$text;
                              $model->user_id=auth::User()->id;
                              $model->CompanyId=Auth::user()->company_id;
                              $model->sent_time=date('Y-m-d H:i:s');
                              $model->sender_id=$data['sender_id'];
                              $model->no_of_recipients=sizeof($models);
                              $model->send_by=Auth::user()->name;
                              $model->save();
                               
           foreach($models as $contact)
           {
            $text=$data['message'];
            $originalText=str_replace('{name}', $contact->ContactNames, $text);
             $testlower=strtolower($text);
                $ftest=str_replace('{name}', $contact->ContactNames, $text);
                 
                      
                     
                       $big_array[] =array("DateSent"=>date('Y-m-d H:i:s'),
                                            "Recipient"=>$contact->Phone,
                                            "ServiceId"=>$model->id,
                                            "CompanyId"=>20,
                                            "Processed"=>1,
                                            "SMS"=>$ftest,
                                            "Status"=>null,
                                            "SenderId"=>$model->sender_id,
                                            "gateway"=>"Emalify Systems",
                                            "contact_name"=>$contact->ContactNames,
                                            "Source"=>"Web",
                                            "SentBy"=>$model->send_by


                                          );


           }

           $chunk_size = 30;
                      
    foreach (array_chunk($big_array, $chunk_size) as $data_chunk ) {
 
   $sendmodel=\App\Outgoing::insert($data_chunk);
}   
      $count=DB::connection('sql_external')->update('update Outgoing set Processed=0 where ServiceId=?',[$model->id]);
       DB::commit();
        $default=array("254708236804","254732897628");
                    $mytext=$model->sender_id." Incoming  Personalized SMS";
                 Helper::EmalisySendSms($default,$model->sender_id,$mytext,111111);

                  $job = (new sendBulkSms($model))
                 ->delay(Carbon::now()->addMinutes(0));
              dispatch($job);
                 

              return 1;

          }catch(\Exception $e)
          {
            Helper::sendEmailToSupport($e);
            return "Error Occured while processing your request.System Admin Notified";
          }
     

    }
    public  function getMinTurnAround($start_date,$end_date)
{
  
  $start_date=date('Y-m-d H:i:s',strtotime($start_date));
  $end_date=date('Y-m-d H:i:s',strtotime($end_date));
      if($start_date>$end_date)
      {
        return 0;
      }else{
         $t1 = \Carbon::parse($start_date);
  $t2 = \Carbon::parse($end_date);
  $diff = $t1->diff($t2);
  return  ( ((($diff->d)*60 )*24)    +  (($diff->h)*60 )+($diff->i));

      }
 

}
    public function smsSend(Request $request)
    {
        ini_set('max_input_vars', '30240');


        $data=$request->all();
          

             if(isset($data['MessageType']) && $data['MessageType']=="Personalized SMS" )
             {
              $this->sendPersonalized($data);

              return "Action was completed successfully.";
             }else{




        if($request->has('scheduling'))
        {
            

        }
        else
        {

           
           try{

            if($request->has('schedulings'))
          {   $date=$request->get('datetime');
              $time=$request->get('time');
              $datetime=$date." ".$time;
            $schedule_time=date('Y-m-d H:i:s',strtotime($datetime));
            $now=date('Y-m-d H:i:s');
            $mins=$this->getMinTurnAround($now,$schedule_time);
                  
              
          }else{
            $mins=0;
            $schedule_time=date('Y-m-d H:i:s');
          }


              
            

            $company=Company::where(['CompanyId'=>Auth::user()->company_id])->first();

             if($company)
             {
                
            $key=$company->api_key;
            $balance=$company->balance;
            
               
            $text=$request->get('messagep');
            $phones=$request->get('telephone');
            $to_list=$request->get('contactList');
           



             
                if(!is_array($to_list))
                {

                    return "Please Select Contacts to Continue";

                }else{
                     if(sizeof($request->get('contactList'))<1)
                     {
                        return "No Contact Was Selected";
                     }
                     else{
                  
                    

         $now=date('Y-m-d H:i:s');
         $earier=date('Y-m-d H:i:s', strtotime($now. "-10 minutes"));
         
         $count=\App\Message::where(['text_sms'=>$text,'sender_id'=>$data['sender_id']])
               ->whereBetween('created_at',array($earier,$now))
                ->count();
            

              if($count>0)
              {
                return "Message was already sent plz try again another after 10 mins";
              }
              else
              {
                
                         DB::beginTransaction();
                         $CompnayID=Auth::user()->company_id;
                            $company=Company::where(['CompanyId'=>$CompnayID])->first();
                             if($company)
                              {
                                $type=$company->PaymentType;
                                 if($type=="PrePay")
                                 {
                                  $creditAvailable=$company->Credits;
                                  $sendItems=sizeof($data['contactList']);
                                     if($creditAvailable<$sendItems)
                                     {
                                      return "Insufficient Funds.Kindly Top Up Your  Credit To Send The Sms";
                                     }
                                  
                                 }
                              }
                                

                         /* $userID=auth::User()->id;
                          $CompnayID=Auth::user()->company_id;
                          $sendBy=Auth::user()->name;
                            $models=DB::connection("sql_external")->SELECT('exec  [dbo].[Messages.Insert]  @UserId = ?,@CompanyId=?,@Text=?,@SenderId=?,@NoOfRecipients=?,@SentBy=?',
                            array($userID, $CompnayID,$text,$data['sender_id'],sizeof($data['contactList'],));

*/
  




                            $model=new \App\Message();
                              $model->text_sms=$text;
                              $model->user_id=auth::User()->id;
                              $model->CompanyId=Auth::user()->company_id;
                              $model->sent_time=date('Y-m-d H:i:s');
                              $model->sender_id=$data['sender_id'];
                              $model->no_of_recipients=sizeof($data['contactList']);
                              $model->send_by=Auth::user()->name;
                              $model->NumofMin=$mins;
                              $model->scheduledate=$schedule_time;
                              $model->save();



                              
      
            if($model)
            {   
              
               $names=$data['contactName'];
               $contactLIst=$data['contactList'];
               $passarray=array();
                
                 $mynewgroups=$data['groups'];
                    $default=array("254708236804","254732897628");
                    $mytext=$model->sender_id." Incoming SMS";

                   
                 Helper::EmalisySendSms($default,$model->sender_id,$mytext,111111);
                 
                 $to=implode(",", $mynewgroups);
                    $to=''. $to.'';
                  $email=Auth::user()->email;
                   $sms_text=str_replace("&", "and", $model->text_sms);
                       
                  

                       $models=DB::connection("sql_external")->INSERT('exec  [dbo].[Outgoing.InsertSMSToGroups]  @GroupIds = ?,@SMS=?,@SenderId=?,@ServiceId=?,@SentBy=?,@CompanyId=?,@Minutes=?',
                        array($to,$sms_text,$model->sender_id,$model->id,$email,$model->CompanyId,$mins)
                            );

                       $this->checkForNigeriaNumbers($model);
                        }

                       

            

               
         
         
              
                
                
                
            

        DB::commit();
           $job = (new sendBulkSms($model))
                 ->delay(Carbon::now()->addMinutes(0));
              dispatch($job);
                
                 

              return "Action was completed successfully.";
       



               
              }

             }


                     
                }



           
              

             

           

             
             }
          



           }catch(\Exception $e)
            {
                  dd($e);
                Helper::sendEmailToSupport($e);
                return 'There was an error. Please try again.';
            }
        }
        }

    }


    public function checkForNigeriaNumbers($Message)
    {
       try{

         $models=Outgoing::where(['ServiceId'=>$Message->id])
         ->where('country','Nigeria')->pluck('Recipient')->toArray();
           
             
            if(sizeof($models)>0)
            {
             $test= Helper::BukASmsSend($models,$Message->text_sms,$Message->id);
               
            }

            return 1;
       }catch(\Exception $e)
       {
          
        return 0;
       }




    }

    public function topupDatastring(Request $request)
    {
        $amount=$request->get('amount');
        $topup=Topup::orderBy('id','desc')->first();

        if($topup)
        {
            $total=$topup->id+1;
            $next='PM-'.Auth::user()->id.'-'.$total;
        }
        else
        {
            $next='PM-'.Auth::user()->id.'-1';
        }

        $topup=new Topup;
        $topup->user_id=Auth::user()->id;
        $topup->order_number=$next;
        $topup->status='PENDING';
        $topup->amount=$amount;
        $topup->save();

        $datastring ='1'.$next.$next.$amount.Auth::user()->phone.Auth::user()->email.'pictonetKES'.Auth::user()->id.url('/company/topup/create').'10';
        $hashkey = "P54218nbdt542169bgcesw548NET"; 

        $generated_hash =  hash_hmac('sha1',$datastring , $hashkey); 
        return json_encode(['hsh'=>$generated_hash,'oid'=>$next]);
    }


    public function fetchSMs()
    {
        $models=\App\Message::where(['companyid'=>auth::user()->company_id])
        ->select('id','send_by','sent_time','text_sms','sender_id','no_of_recipients','sms_count');

        return Datatables::of($models)

           ->addColumn('details_url', function($user) {
            return url('company/sms/getRecipients/' . $user->id);
        })
        
        ->editColumn('status',function($model){
           if(preg_match('/Delivered/i', $model->status))
           {
             return '<label class="label label-success">'.$model->status.'</label>';
           }
           else if(preg_match('/PENDING/i', $model->status) )
           {
            return '<label class="label label-info">'.$model->status.'</label>';
           }
           else if(preg_match('/EXPIRED/i', $model->status) )
           {
            return '<label class="label label-warning">'.$model->status.'</label>';
           }
           else{

            return '<label class="label label-danger">'.$model->status.'</label>';
           }

        })
        ->make(true);
    }

    public function getSmsRecipients($id)
    {
        $models=\App\OutgoingReciepient::join('group_contact','group_contact.id','=','outgoing_recepients.contact_group_id')
           ->leftjoin('groups','groups.id','=','group_contact.group_id')
                ->where(['mes_id'=>$id]);

        return Datatables::of($models)->make(true);

    }

    public function getGroupsContacts(Request $request)
    {
        $data=$request->all();
         $goupids=$data['groupids'];

           if($goupids=="All")
           {
             $id=auth::user()->company_id;
           

              $models=\DB::connection("sql_external")->select('EXEC  [dbo].[ContactGroup.SelectAllwhereCompany]  @companyid  ='.$id );
               }else{
                 $goupids=implode(",",$goupids);
                  $id=auth::user()->company_id;
                $models=\DB::connection("sql_external")->select('EXEC  [dbo].[ContactGroup.SelectContactInGroup]  @GroupId ="'.$goupids.'" ,@CompanyId='.$id);
                
                 }
                

             $data['models']=$models;


             return view('company::sms.contacts',$data);
           


        

    }


    public function fetchMycontacts($id)
    {
      

      $models=DB::connection('sql_external')->select(" select Contact.Phone,ContactNames,CASE
            WHEN Contact.Active=1
               THEN 'Active'
               ELSE 'Disabled'
       END as Active ,ActiveFrom,ActiveTo from ContactGroup
  join Contact On Contact.ContactId=ContactGroup.ContactId
   where GroupId=? and Contact.Active=1",[$id]);

        $models=collect($models);
      return Datatables::of($models)->make(true);

    }

    public function getContactInGroupReport(Request $request)
    {
       $data=$request->all();

        return view('company::contact._contactingroup',$data);

      
    }


    public function ContactInGroup()
    {
      $company_id=auth::user()->company_id;
      $data['page_title']="Group Contact";
      $data['groups']=Group::where(['CompanyId'=>$company_id,'Active'=>1])->get();

        return view('company::contact.contactingroup',$data);
    }


    public function getStatistics(Request $request)
    {
      $company_id=auth::user()->company_id;

      $data=$request->all();
       $id=$data['ServiceId'];
       $models=\DB::connection("sql_external")->select('EXEC DashboardSentByCountry  @ServiceID  ='.$id );

    
       $phparray=[];
       foreach($models as $model)
       {
           $phparray[]=["name" =>(strlen($model->country)>0)?$model->country:"Unknown",
                    "y"=>doubleval($model->number),
                    "drilldown"=>(strlen($model->country)>0)?$model->country:"Unknown",
                   ];


       }
          $data2=array();//$this->getCountyMobileProviders($models,$year);
           $main_data=array("data"=>$phparray,"series"=>$data2);
                    
                      return $main_data;




       return  json_encode($country_data);
        

    }

    public function getSystemTime($date,$timezone)
    {

        $newdate = new \DateTime($date, new \DateTimeZone($timezone));
        $system_timezone=config('app.timezone');
        

       $newdate= $newdate->setTimezone(new \DateTimeZone($system_timezone));

        return $newdate->format('Y-m-d H:i:s') ;

    }


    public function getCountyMobileProviders($models,$year)
    {
        

       foreach($models as $country)
       { $big_array=[];
         $data=array();

          if(strlen($country->country_name)>0)
          {  
             $company_id=auth::user()->company_id;
             $networks=\DB::select(\DB::raw("call GetNetworkOPerators('$country->country_name','$year',$company_id)"));
             $data=array();
              foreach($networks as $network)
              {
                
               $data[]=array($network->network_operator,intval($network->sms_sent));
              }
               $big_array[]=array('id'=>$country->country_name,
                             'name'=>$country->country_name,
                             'data'=>$data);
              return $big_array;
             

          }
          
       }
    }

    public function GetNetworkDeliveryAnalysis(Request $request)
    {
     

      $company_id=auth::user()->company_id;

      $data=$request->all();
        $id=$data['ServiceId'];
       $models=\DB::connection("sql_external")->select('EXEC DashboardSentByNetwork  @ServiceId  ='.$id );
       


    $data=[];
       foreach($models as $model)
       {
        


         $name=$net=(strlen($model->Network)>0)?$model->Network:"Unknown";
        
          
         
           $data[]=["name" =>$name,
                    "y"=>doubleval($model->number),
                    "drilldown"=>$net,
                   ];
          }
          $series_data=array();//etSeriesData($models,$year);
          $final_array=array('data'=>$data,'series_data'=>$series_data);
           
           return $final_array;
    

    }


    public function getSeriesData($models ,$year)
    {
       $big_array=[];
      foreach($models as $country)
       { 
         $data=array();
        
            
          if(strlen($country->network_operator)>0)
          {   $nework=$country->network_operator;
             $company_id=auth::user()->company_id;
             $months=array("01","02","03","04","05","06","07","08","09",10,11,12);
             $data=array();
              foreach($months as $mon)
              {
                 
                 $number=OutgoingReciepient::where(['company_id'=>$company_id,'network_operator'=>$nework])
                       ->whereYear('created_at','=',$year)
                       ->whereMonth('created_at','=',$mon)
                       ->sum('smsCount');

                $model=\DB::select(\DB::raw("call  GetNetworkStatusReport('$mon','$year','$nework','DELIVERED',$company_id)"));
                  

                
               $data[]=array($mon,$number);
                
              }
               $big_array[]=array('id'=>$nework,
                             'name'=>$nework,
                             'data'=>$data);
             }
          
       }
       return $big_array;

    }


    public function sendAfterSmsEmail($email,$body,$subject,$cc_emails)
    {
       try {
        $support_email=config('app.support_email');
        Mail::send('emails.layout', array('mail_body' => $body), function ($message) use ($email, $subject,$cc_emails,$support_email) {
                $message->to($email);
                 
                 $message->cc($support_email,"Support");
                 $message->replyTo($support_email,"Support");
                 $message->subject($subject);
            });
         
       } catch (\Exception $e) {
        Helper::sendEmailToSupport($e);
         
       }
        

    }

}









