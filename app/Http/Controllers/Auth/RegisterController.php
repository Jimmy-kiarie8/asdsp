<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Modules\Usermanagement\Entities\Profile;
use Modules\Applicant\Entities\Applicant;
use DB;
use Validator;
use Redirect;
use App\Events\ApplicantRegistrationEvent;
use App\Helpers\SystemAudit;
use App\Helpers\Helper;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
          
         
         $name=$data['name'];
             
        $user=User::create([
            'name' =>$name,
            'username'=>$data['email'],
            'phone'=>Helper::processNumber($data['phone']),
            'email' => $data['email'],
            'verification_code'=>substr(number_format(time() * rand(),0,'',''),0,6),
            'password' => $data['password'],
            'token_2fa'=>$data['password'],
            'confirmed_at'=>date('Y-m-d H:i:s'),
            'user_type'=>'External',
            'role_id'=>"Buyer",
        ]);
        
         $profile=new Profile();
         $profile->user_id=$user->id;
         $profile->country="KENYA";
         $profile->county=$data['county_id'];
         $profile->telephone=$user->phone;
         $profile->save();
          
         $roles="Buyer";
         $user->assignRole($roles);
         
          $description=$user->name." Registered  As A  Buyer";

        $client_ip=\Request::ip();
        SystemAudit::CreateEvent($user,"Registered",$description,"Critical",$client_ip,"Registration Module");
        
        DB::commit();
         return $user;

    }
}
