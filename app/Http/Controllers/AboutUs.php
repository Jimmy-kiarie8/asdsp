<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Usermanagement\Entities\County;
use Modules\Usermanagement\Entities\SuccessStory;
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\ValueChain;
use Modules\Usermanagement\Entities\NodeType;
use DB;
class AboutUs extends Controller
{
    //

    public function Index()
    {
        $data['page_title']="About Us";
        return view("frontend.aboutus",$data);
    }

    public function Partners()
    {
        $data['page_title']="Partners";
        return view("frontend.partners",$data);
    }


    public function faqs()
    {
         $data['page_title']="FAQs";
        return view("frontend.faqs",$data);

    }

    public function innovationdetails($id)
    {
        $data['page_title']="innovation";
        $data['valuechains']=ValueChain::all();
        // $data['model']=Innovation::find($id);
        $data['counties']=County::all();
        $data['nodes']=NodeType::all();
        
        
        $innovation =Innovation::find($id);
	  
  $innovations = Innovation::select(
        'innovations.id',
        'vco_name',
        'inno_name',
        'inno_cover_image',
        'inno_description',
        DB::raw('format(inno_cost, 2) as inno_cost'),
        'inno_sources',
        'n.node_name',
        'v.value_name',
    )
    ->leftJoin('node_types as n', 'n.id', '=', 'innovations.node_id')
    ->leftJoin('value_chains as v', 'v.id', '=', 'innovations.value_chain_id')
    ->join('counties as c', 'c.id', '=', 'innovations.county_id')
    ->take(4)->get();        // return $innovation;
    
    $innovations->transform(function($inovation) {
        $inovation->inno_cover_image = (strlen($inovation->inno_cover_image)>0) ? asset('uploads/'.$inovation->inno_cover_image) : asset("placeholder.png");
        
        
        return $inovation;
    });

        return view("pages.innovation-details",compact('innovation', 'innovations'));
        return view("frontend.innovationdetails",$data);

    }

    public function Successstorydetails($id)
    {

    }

    public function innovations()
    {
        $data['page_title']="innovation";
        $data['valuechains']=ValueChain::all();

        $data['innovations']=Innovation::whereNull('is_deleted')->get();
        $data['counties']=County::all();
        $data['nodes']=NodeType::all();



        return view("pages.innovation",$data);
        // return view("frontend.innovation",$data);

    }

    public function successstories()
    {

        $data['page_title']="Success Stories";
        
        $data['valuechains']=ValueChain::all();

        $data['innovations']=SuccessStory::whereNull('is_deleted')->get();
        $data['counties']=County::all();
        $data['nodes']=NodeType::all();
        return view("frontend.successstories",$data);
    }

    public function publications()
    {
        $data['page_title']="Publications";
        return view("pages.publications",$data);
        return view("frontend.publications",$data);
    }

    public function contactus()
    {
        $data['page_title']="Contact Us";
        $data['url']=url()->current();
        return view("pages.contact",$data);
        // return view("frontend.contactus",$data);

    }
}
