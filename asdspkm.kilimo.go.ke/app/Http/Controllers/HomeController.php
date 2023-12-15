<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Helpers\Helper;
use DB;
use Modules\Usermanagement\Entities\County;
class HomeController extends Controller
{
    
     protected $userID;
    protected $mid;
    protected $sid;
  public function __construct()
    {
      $this->middleware(['auth','setup','securex']);
        
       
        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            $this->sid=Auth::user()->org_id;

            return $next($request);
        });
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 

         $data['page_title']="Admin Dashboard";
            

           
             return view('dashboards.admin',$data);
       
    }
}
