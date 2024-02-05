<?php

namespace App\Http\Controllers;

use App\Community;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Modules\Usermanagement\Entities\County;
use Modules\Usermanagement\Entities\SuccessStory;
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\ValueChain;
use Modules\Usermanagement\Entities\NodeType;
use Modules\Usermanagement\Entities\InnovationCategory;
use Modules\Usermanagement\Entities\FeaturedItem;
use Modules\Usermanagement\Entities\Publication;

use DB;
use Illuminate\Support\Facades\Mail;

class AboutUs extends Controller
{
    //

    public function Index()
    {
        $data['page_title'] = "About Us";
        return view("pages.about", $data);
        // return view("frontend.aboutus", $data);
    }

    public function Partners()
    {
        $data['page_title'] = "Partners";
        return view("frontend.partners", $data);
    }


    public function faqs()
    {
        $data['page_title'] = "FAQs";
        return view("frontend.faqs", $data);
    }

    public function innovationdetails($id)
    {
        $data['page_title'] = "innovation";
        $data['valuechains'] = ValueChain::all();
        // $data['model']=Innovation::find($id);
        $data['counties'] = County::all();
        $data['nodes'] = NodeType::all();


        $innovation = Innovation::with('county')->find($id);
        $categories = InnovationCategory::all();

        $innovations = Innovation::select(
            'innovations.id',
            'vco_name',
            'inno_name',
            'inno_cover_image',
            'inno_description',
            'inno_longitude',
            'inno_latitude',
            DB::raw('format(inno_cost, 2) as inno_cost'),
            'inno_sources',
            'n.node_name',
            'v.value_name',
        )
            ->leftJoin('node_types as n', 'n.id', '=', 'innovations.node_id')
            ->leftJoin('value_chains as v', 'v.id', '=', 'innovations.value_chain_id')
            ->join('counties as c', 'c.id', '=', 'innovations.county_id')
            ->take(4)->get();        // return $innovation;

        $innovations->transform(function ($inovation) {
            $inovation->inno_cover_image = (strlen($inovation->inno_cover_image) > 0) ? asset('uploads/' . $inovation->inno_cover_image) : asset("placeholder.png");


            return $inovation;
        });

        return view("pages.innovation-details", compact('innovation', 'innovations', 'categories'));
        return view("frontend.innovationdetails", $data);
    }

    public function Successstorydetails($id)
    {
        return $story = SuccessStory::find($id);
        return view("pages.story-details", compact('story'));
    }

    public function innovations()
    {
        $data['page_title'] = "innovation";
        $data['valuechains'] = ValueChain::all();

        $data['innovations'] = Innovation::whereNull('is_deleted')->take(10)->get();
        $data['counties'] = County::all();
        $data['nodes'] = NodeType::all();
        $search = request('search');


        $locations = Innovation::whereNotNull('inno_latitude')->whereNotNull('inno_longitude')->select('inno_latitude', 'inno_longitude', 'inno_description', 'inno_name')->when($search, function ($q) use ($search) {
            return $q->where('inno_name', 'Like', "%{$search}%")
                ->orWhere('inno_description', 'Like', "%{$search}%")
                ->orWhere('inno_name', 'Like', "%{$search}%")
                ->orWhere('innovation_type', 'Like', "%{$search}%")
                ->orWhere('inno_location', 'Like', "%{$search}%")
                ->orWhere('innovation_status', 'Like', "%{$search}%")
                ->orWhere('inno_contactname', 'Like', "%{$search}%")
                ->orWhere('inno_sources', 'Like', "%{$search}%")
                ->orWhere('vco_name', 'Like', "%{$search}%");
        })->latest()->paginate(8);




        return view("pages.innovation", compact('data', 'locations'));
        // return view("frontend.innovation",$data);

    }

    public function innovation_list()
    {

        $categories = request('categories');
        $search = request('search');

        $data['featured_items'] = FeaturedItem::inRandomOrder()->take(6)->get();

        $totalAdverts = InnovationCategory::count();
        $users = Innovation::whereNull('is_deleted')->count();
        $applicants = SuccessStory::withoutGlobalScopes()->whereNull('is_deleted')->count();
        $applications = Publication::whereNull('is_deleted')->count();

        $data['categories'] = $totalAdverts;
        $data['innovations'] = $users;
        $data['successstories'] = $applicants;
        $data['publications'] = $applications;

        //  $inovations = Innovation::paginate(12);
        $inovations = Innovation::select(
            'innovations.id',
            'innovations.created_at',
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
            ->orderBy('innovations.created_at', 'desc') // Order by created_at column in descending order
            ->when($search, function ($q) use ($search) {
                return $q->where('inno_name', 'Like', "%{$search}%")
                    ->orWhere('inno_description', 'Like', "%{$search}%")
                    ->orWhere('vco_name', 'Like', "%{$search}%");
            })
            ->paginate(12);

        $inovations->transform(function ($inovation) {
            $inovation->inno_cover_image = (strlen($inovation->inno_cover_image) > 0) ? asset('uploads/' . $inovation->inno_cover_image) : asset("placeholder.png");
            return $inovation;
        });

        return view('pages.innovation-list', compact('inovations'));
    }

    public function successstories()
    {

        $data['page_title'] = "Success Stories";

        $data['valuechains'] = ValueChain::all();

        $data['innovations'] = SuccessStory::withoutGlobalScopes()->latest()->whereNull('is_deleted')->get();
        $data['counties'] = County::all();
        $data['nodes'] = NodeType::all();
        $innovation = [];
        $search = request('search');

        $publications = SuccessStory::withoutGlobalScopes()->latest()->when($search, function ($q) use ($search) {
            return $q->where('story_title', 'Like', "%{$search}%")
                ->orWhere('strory_description', 'Like', "%{$search}%")
                ->orWhere('story_cover_image', 'Like', "%{$search}%")
                ->orWhere('story_location', 'Like', "%{$search}%");
        })->paginate();
        return view("pages.success-story", compact('data', 'publications', 'innovation'));
    }

    public function publications()
    {
        $data['page_title'] = "Publications";

        $publications = Publication::paginate();
        return view("pages.publications", compact('data', 'publications'));
    }

    public function contactus()
    {
        $data['page_title'] = "Contact Us";
        $data['url'] = url()->current();
        return view("pages.contact", $data);
        // return view("frontend.contactus",$data);

    }

    public function contact_mail(Request $request)
    {
        // return $request->all();
        $data = $request->all();
        Mail::to($request->email)->send(new ContactMail($data));

        // Return back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    public function community_post(Request $request)
    {
        $community = new Community;

        $community->title = $request->title;
        $community->message = $request->message;
        $community->save();
        return redirect()->back()->with('success', 'Post successfully created!');
    }

    public function community()
    {
        $communities = Community::paginate();
        return view('pages.community.index', compact('communities'));
    }

    public function community_create(Request $request)
    {
        return view('pages.community.topic');
    }
}
