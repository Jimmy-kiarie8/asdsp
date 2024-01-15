<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Usermanagement\Entities\Department;
use Modules\Usermanagement\Entities\County;
use Modules\Usermanagement\Entities\ValueChain;
use Modules\Usermanagement\Entities\NodeType;
use Modules\Usermanagement\Entities\ProductName;
use Modules\Usermanagement\Entities\Ward;
use Modules\Usermanagement\Entities\TrainingPhoto;
use Modules\Usermanagement\Entities\ProductMetaData;
use Modules\Usermanagement\Entities\Organization;
use Modules\Usermanagement\Entities\InnovationStatus;
use Modules\Usermanagement\Entities\CountyValueChain;
use Modules\Usermanagement\Entities\InnovationCategory;
use Modules\Usermanagement\Entities\FeaturedItem;
use App\Imports\OrganizationImport;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;
use DB;
use Input;
use Validator;
use Redirect;
use App\Helpers\SystemAudit;
use Excel;
use App\Upload;
use App\Imports\MemberImport;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Log;
use Modules\Usermanagement\Entities\UnitOfMeasure;
use Modules\Usermanagement\Entities\Training;
use Modules\Usermanagement\Entities\TrainingAttendance;
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\InnovationImage;

class InnovationController extends Controller
{
    protected $userID;
    protected $mid;
    protected $sid;
    public function __construct()
    {
        $this->middleware('auth');


        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            $this->sid = Auth::user()->org_id;

            return $next($request);
        });
    }



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['page_title'] = "Innovations List";

        return view('usermanagement::innovations.index', $data);
    }

    public function Submitted()
    {
        $data['page_title'] = "New Innovation";
        return view('usermanagement::innovations.submittedindex', $data);
    }

    public function PendingReview()
    {
        $data['page_title'] = "Pending  Review";
        return view('usermanagement::innovations.pendingindex', $data);
    }

    public function fetchSubmittedList()
    {
        $models = DB::select("SELECT innovations.id,vco_name,inno_vca_benefit,inno_contacttel,inno_contactname,innovation_status,innovation_type,inno_subcounty,inno_ward,inno_location,inno_latitude,inno_longitude,inno_name,inno_code,inno_cover_image,format(inno_cost,2) inno_cost,inno_sources,inno_male_vca,inno_female_vca,inno_youth_vca,publish_status,value_name,node_name,inno_vco_promoted,innovations.created_at FROM innovations
        left join node_types on node_types.id=innovations.node_id
        left join value_chains on  value_chains.id=innovations.value_chain_id
        where 1  
        ", [$this->sid]);
        return Datatables::of($models)
            ->rawColumns(['action', 'inno_cover_image'])

            ->editColumn('inno_cover_image', function ($model) {

                if (strlen($model->inno_cover_image) > 0) {

                    $url = asset('uploads/' . $model->inno_cover_image);
                } else {
                    $url = asset("placeholder.png");
                }


                $view_url = url('/backend/directors/view/' . $model->id);

                return '<img src=' . $url . ' data-title="View Manager-Summary View" border="0" width="120" height="100"  data-url="' . $view_url . '" class="img-rounded pop-modal" align="center" cursor="pointer"  style="cursor:pointer;border-radius:5%" title="View Details"    />';
            })

            ->addColumn('action', function ($model) {
                $edit_url = url('/System/Entities/EditDetails/' . $model->id);
                $trainee_url = url('/System/TrainingModule/AddAttendance/' . $model->id);
                $submit_url = url('/System/Innovations/Submit/' . $model->id);
                $view_url = url('/System/TrainingModule/ViewEvidence/' . $model->id);
                $gallery_url = url('/System/TrainingModule/ViewGallery/' . $model->id);
                return '

                         <div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
     


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="View Gallery" data-url="' . $gallery_url . '"><i class="icon-camera-retro"></i>Innovation Gallery</a></li>

     
    
    </ul>
</div> 
';
            })->make(true);
    }


    public function DeleteInnovation($id, Request $request)
    {
        $model = Innovation::find($id);
        $data['model'] = $model;
        $data['url'] = url()->current();
        // $user = User::find($model->created_by);
        // FacadesAuth::id();


        if ($request->isMethod("post")) {
            // return redirect()->back()->withErrors('You do not have permission to delete this innovation.');
            if (Auth::user()->hasRole("SuperAdmin") || $model->created_by == Auth::id()) {
                // Your code for authorized users
                $data = $request->all();
                if (isset($data['confirm'])) {
                    $model->delete();
                    Session::flash("success_msg", "Innovation Deleted Successfully");
                }
                return redirect()->back();
            } else {
                // Code to handle unauthorized access
                abort(403, 'You do not have permission to delete this innovation! Please contact the admin to delete the innovation.');
                return redirect()->back()->withErrors('You do not have permission to delete this innovation. Please contact the admin to delete the innovation');
            }
        }

        return view('usermanagement::innovations._delete', $data);
    }


    public function EditCategory($id, Request $request)
    {
        $data['model'] = $model = Innovation::find($id);
        $data['url'] = url()->current();
        $data['categoies'] = InnovationCategory::all();
        if ($request->isMethod("post")) {
            $data = $request->all();

            $model->innovation_type = $data['category'];
            $model->transformation_type = $data['type'];
            $model->save();
            Session::flash("success_msg", "Details Updated Successfully");
            return  redirect()->back();
        }

        return view('usermanagement::innovations._editcategoy', $data);
    }


    public function EditBeneficiary($id, Request $request)
    {

        $data['model'] = $model = Innovation::find($id);
        $data['url'] = url()->current();

        if ($request->isMethod("post")) {
            $data = $request->all();
            $model->inno_male_adultvca = $data['inno_male_adultvca'];
            $model->inno_female_adultvca = $data['inno_female_adultvca'];
            $model->inno_youth_malevca = $data['inno_youth_malevca'];
            $model->inno_youth_femalevca = $data['inno_youth_femalevca'];

            $model->inno_vca_benefit = $model->inno_male_adultvca + $model->inno_female_adultvca + $model->inno_youth_malevca + $model->inno_youth_femalevca;

            $model->inno_male_vca = $model->inno_male_adultvca + $model->inno_youth_malevca;
            $model->inno_female_vca = $model->inno_vca_benefit - $model->inno_male_vca;
            $model->inno_youth_vca = $model->inno_youth_malevca + $model->inno_youth_femalevca;
            $model->save();
            Session::flash("success_msg", "Details Updated Successfully");
            return  redirect()->back();
        }

        return view('usermanagement::innovations._editbeneficiary', $data);
    }


    public function EditCoverImage($id, Request $request)
    {
        $data['model'] = $model = Innovation::find($id);
        $data['url'] = url()->current();

        if ($request->isMethod("post")) {
            $this->updateCoverImage($id, $request);

            $data['page_title'] = "Innovations List";

            return view('usermanagement::innovations.index', $data);
        }


        return view('usermanagement::innovations._editcoverimage', $data);
    }


    public function updateCoverImage($id, Request $request)
    {
        DB::beginTransaction();

        try {

            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $innovationimage = new InnovationImage();
            $innovationimage->image_id = '/public/' . $filename;
            $innovationimage->innovation_id = $id;
            $innovationimage->save();
            $innovation = Innovation::find($id);


            $innovation->inno_cover_image = $filename;
            $innovation->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function fetchList()
    {
        $models = DB::select("SELECT innovations.id,county_name,vco_name,inno_vca_benefit,inno_contacttel,inno_contactname,innovation_status,innovation_type,inno_subcounty,inno_ward,inno_location,inno_latitude,inno_longitude,inno_name,inno_code,inno_cover_image,format(inno_cost,2) inno_cost,inno_sources,n.node_name,v.value_name,inno_male_vca,inno_female_vca,inno_youth_vca,publish_status,inno_vco_promoted,innovations.created_at FROM innovations
            left join node_types n on n.id=innovations.node_id
            left join value_chains v on v.id=innovations.value_chain_id 
            join counties c on c.id=innovations.county_id 
            where innovations.is_deleted is null ", [$this->sid, "Draft"]);
        return Datatables::of($models)
            ->rawColumns(['action', 'inno_cover_image'])

            ->editColumn('inno_cover_image', function ($model) {

                if (strlen($model->inno_cover_image) > 0) {

                    $url = asset('uploads/' . $model->inno_cover_image);
                } else {
                    $url = asset("placeholder.png");
                }


                $view_url = url('/backend/directors/view/' . $model->id);

                return '<img src=' . $url . ' data-title="View Manager-Summary View" border="0" width="120" height="100"  data-url="' . $view_url . '" class="img-rounded pop-modal" align="center" cursor="pointer"  style="cursor:pointer;border-radius:5%" title="View Details"    />';
            })

            ->addColumn('action', function ($model) {
                $edit_url = url('/System/Entities/EditDetails/' . $model->id);
                $trainee_url = url('/System/TrainingModule/AddAttendance/' . $model->id);
                $submit_url = url('/System/Innovations/Submit/' . $model->id);
                $edit_url = url('/System/Innovations/EditCategory/' . $model->id);
                $beneficiary_edit_url = url('/System/Innovations/EditBeneficiary/' . $model->id);
                $edit_ci_url = url('/System/Innovations/EditCoverImage/' . $model->id);

                $delete_url = url('/System/Innovations/DeleteInnovation/' . $model->id);
                $view_url = url('/System/TrainingModule/ViewEvidence/' . $model->id);
                $gallery_url = url('/System/TrainingModule/ViewGallery/' . $model->id);
                return '

                         <div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">

  <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit" href="/System/Innovations/edit/' . $model->id . '"><i class="icon-camera-retro"></i>Edit</a></li>

     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit Category" data-url="' . $edit_url . '"><i class="icon-camera-retro"></i>Edit Category</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit Beneficiaries" data-url="' . $beneficiary_edit_url . '"><i class="icon-camera-retro"></i>Edit Beneficiaies</a></li>

      <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit Cover Image" data-url="' . $edit_ci_url . '"><i class="icon-pencil"></i>Edit Cover Image</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Submit to NPC For Review" data-url="' . $submit_url . '"><i class="icon-camera-retro"></i>Submit to NPS</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="View Gallery" data-url="' . $gallery_url . '"><i class="icon-camera-retro"></i>Innovation Gallery</a></li>



     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Delete Innovation" data-url="' . $delete_url . '"><i class="icon-trash"></i>Delete</a></li>

     
    
    </ul>
</div> 
';
            })->make(true);
    }


    public function fetchList1()
    {
        //         $models = DB::select("SELECT innovations.id,county_name,vco_name,inno_vca_benefit,inno_contacttel,inno_contactname,innovation_status,innovation_type,inno_subcounty,inno_ward,inno_location,inno_latitude,inno_longitude,inno_name,inno_code,inno_cover_image,format(inno_cost,2) inno_cost,inno_sources,n.node_name,v.value_name,inno_male_vca,inno_female_vca,inno_youth_vca,publish_status,inno_vco_promoted,innovations.created_at FROM innovations
        // left join node_types n on n.id=innovations.node_id
        // left join value_chains v on v.id=innovations.value_chain_id 
        // join counties c on c.id=innovations.county_id 
        // where innovations.is_deleted is null ", [$this->sid, "Draft"]);
        $models = DB::table('innovations')
            ->leftJoin('node_types as n', 'n.id', '=', 'innovations.node_id')
            ->leftJoin('value_chains as v', 'v.id', '=', 'innovations.value_chain_id')
            ->join('counties as c', 'c.id', '=', 'innovations.county_id')
            ->selectRaw("innovations.id, county_name, vco_name, inno_vca_benefit, inno_contacttel, inno_contactname, innovation_status, innovation_type, inno_subcounty, inno_ward, inno_location, inno_latitude, inno_longitude, inno_name, inno_code, inno_cover_image, format(inno_cost, 2) as inno_cost, inno_sources, n.node_name, v.value_name, inno_male_vca, inno_female_vca, inno_youth_vca, publish_status, inno_vco_promoted, innovations.created_at")
            ->whereNull('innovations.is_deleted');


        if (Auth::User()->hasRole("County Co-ordinator")) {
            $models = $models->where('innovations.created_by', Auth::id());
        }
        return Datatables::of($models)
            ->rawColumns(['action', 'inno_cover_image'])

            ->editColumn('inno_cover_image', function ($model) {

                if (strlen($model->inno_cover_image) > 0) {

                    $url = asset('uploads/' . $model->inno_cover_image);
                } else {
                    $url = asset("placeholder.png");
                }


                $view_url = url('/backend/directors/view/' . $model->id);

                return '<img src=' . $url . ' data-title="View Manager-Summary View" border="0" width="120" height="100"  data-url="' . $view_url . '" class="img-rounded pop-modal" align="center" cursor="pointer"  style="cursor:pointer;border-radius:5%" title="View Details"    />';
            })

            ->addColumn('action', function ($model) {
                $edit_url = url('/System/Entities/EditDetails/' . $model->id);
                $trainee_url = url('/System/TrainingModule/AddAttendance/' . $model->id);
                $submit_url = url('/System/Innovations/Submit/' . $model->id);
                $edit_url = url('/System/Innovations/EditCategory/' . $model->id);
                $beneficiary_edit_url = url('/System/Innovations/EditBeneficiary/' . $model->id);
                $edit_ci_url = url('/System/Innovations/EditCoverImage/' . $model->id);

                $delete_url = url('/System/Innovations/DeleteInnovation/' . $model->id);
                $view_url = url('/System/TrainingModule/ViewEvidence/' . $model->id);
                $gallery_url = url('/System/TrainingModule/ViewGallery/' . $model->id);
                return '

                         <div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">

  <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit" href="/System/Innovations/edit/' . $model->id . '"><i class="icon-camera-retro"></i>Edit</a></li>

     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit Category" data-url="' . $edit_url . '"><i class="icon-camera-retro"></i>Edit Category</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit Beneficiaries" data-url="' . $beneficiary_edit_url . '"><i class="icon-camera-retro"></i>Edit Beneficiaies</a></li>

      <li><a style="cursor:pointer;" class="reject-modal"   data-title="Edit Cover Image" data-url="' . $edit_ci_url . '"><i class="icon-pencil"></i>Edit Cover Image</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Submit to NPC For Review" data-url="' . $submit_url . '"><i class="icon-camera-retro"></i>Submit to NPS</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="View Gallery" data-url="' . $gallery_url . '"><i class="icon-camera-retro"></i>Innovation Gallery</a></li>



     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Delete Innovation" data-url="' . $delete_url . '"><i class="icon-trash"></i>Delete</a></li>

     
    
    </ul>
</div> 
';
            })->make(true);
    }

    public function fetchSubmittedAdminList()
    {
        $models = DB::select("SELECT innovations.id,vco_name,inno_vca_benefit,inno_contacttel,inno_contactname,innovation_status,innovation_type,inno_subcounty,inno_ward,inno_location,inno_latitude,inno_longitude,inno_name,inno_code,inno_cover_image,format(inno_cost,2) inno_cost,inno_sources,n.node_name,v.value_name,inno_male_vca,inno_female_vca,inno_youth_vca,publish_status,county_name,inno_vco_promoted,innovations.created_at FROM innovations
join node_types n on n.id=innovations.node_id
join counties c on c.id=innovations.county_id
join value_chains v on v.id=innovations.value_chain_id  
where innovations.is_deleted is null   ", ["Submitted", "Pending"]);
        return Datatables::of($models)
            ->rawColumns(['action', 'inno_cover_image'])

            ->editColumn('inno_cover_image', function ($model) {

                if (strlen($model->inno_cover_image) > 0) {

                    $url = asset('uploads/' . $model->inno_cover_image);
                } else {
                    $url = asset("placeholder.png");
                }


                $view_url = url('/backend/directors/view/' . $model->id);

                return '<img src=' . $url . ' data-title="View Manager-Summary View" border="0" width="120" height="100"  data-url="' . $view_url . '" class="img-rounded pop-modal" align="center" cursor="pointer"  style="cursor:pointer;border-radius:5%" title="View Details"    />';
            })

            ->addColumn('action', function ($model) {
                $edit_url = url('/System/Entities/EditDetails/' . $model->id);
                $trainee_url = url('/System/TrainingModule/AddAttendance/' . $model->id);
                $submit_url = url('/System/Innovations/Submit/' . $model->id);
                $approve_url = url('/System/Innovations/MarkApprove/' . $model->id);
                $gallery_url = url('/System/TrainingModule/ViewGallery/' . $model->id);
                return '

                         <div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
     <li><a style="cursor:pointer;" class="reject-modal"   data-title="Approve /Reject Application" data-url="' . $approve_url . '"><i class="icon-camera-retro"></i>Mark Approved/Rejected</a></li>


     <li><a style="cursor:pointer;" class="reject-modal"   data-title="View Gallery" data-url="' . $gallery_url . '"><i class="icon-camera-retro"></i>Innovation Gallery</a></li>

     
    
    </ul>
</div> 
';
            })->make(true);
    }

    public function Submit(Request $request, $id)
    {
        $data = $request->all();
        $data['model'] = $model = Innovation::find($id);
        $data['url'] = url()->current();
        if ($request->isMethod("post")) {

            $model->submit_status = "Submitted";
            $model->submit_date = date("Y-m-d H:i:s");
            $model->submit_by = $this->userID;
            $model->save();

            Session::flash("success_msg", "Innovation Marked As Submitted");
            return redirect()->back();
        }

        return view('usermanagement::innovations._submit', $data);
    }


    public function Import(Request $request)
    {
        $data['url'] = url()->current();
        $data['county'] = County::pluck('county_name', 'id')->toArray();
        $data['model'] = new Innovation();

        if ($request->isMethod("post")) {
            ini_set('memory_limit', '-1');
            $data = $request->all();
            $file_name = $data['file_name'];
            $path1 = $file_name->store('temp');
            $path = storage_path('app') . '/' . $path1;
            $array =  Excel::toarray(new OrganizationImport, $path);

            array_splice($array[0], 0, 1);
            foreach ($array as $rows) {

                $countyid = $data['county_id'];

                foreach ($rows as $data) {


                    $nodename = $data[4];
                    $valuechain = $data[5];
                    $valuechain = ValueChain::where(['value_name' => $valuechain])->first();
                    $node = NodeType::where(['node_name' => $nodename])->first();



                    if (strlen($data[6]) > 0) :

                        $model = Innovation::where(['county_id' => $countyid, 'inno_name' => $data[2], 'vco_name' => $data[6]])->first();
                        if (!$model) {
                            $model = new Innovation();
                            $model->inno_name = $data[2];
                            $model->county_id = $countyid;
                        }

                        //$model->innovation_type=$data['innovation_type'];
                        $model->inno_location = $data[3];
                        $model->inno_subcounty = $data[1];

                        $model->node_id = ($node) ? $node->id : null;
                        $model->vco_name = $data[6];
                        $model->innovation_status = $data[8];
                        $model->value_chain_id = ($valuechain) ? $valuechain->id : null;
                        $model->inno_sources = $data[7];
                        $model->inno_male_adultvca = intval($data[9]);
                        $model->inno_female_adultvca = intval($data[10]);


                        $model->inno_youth_malevca = intval($data[11]);
                        $model->inno_youth_femalevca = intval($data[12]);
                        $model->innovation_output = $data[19]; //practical utility

                        $model->inno_background = $data[16];

                        $model->inno_description = $data[17];
                        $model->inno_vca_benefit = $data[18];
                        $model->inno_lesson_challenges = $data[20];
                        $model->created_by = $this->userID;
                        $model->inno_vca_benefit = $model->inno_male_adultvca + $model->inno_female_adultvca + $model->inno_youth_malevca + $model->inno_youth_femalevca;

                        $model->inno_male_vca = $model->inno_male_adultvca + $model->inno_youth_malevca;
                        $model->inno_female_vca = $model->inno_vca_benefit - $model->inno_male_vca;
                        $model->inno_youth_vca = $model->inno_youth_malevca + $model->inno_youth_femalevca;
                        $model->inno_code = Helper::generatePin(8);

                        $model->inno_contacttel = $data[15];
                        $model->inno_contactname = $data[14];


                        $model->save();

                    endif;
                }
            }


            Session::flash("success_msg", "Innpvations imported Successfully");

            return redirect('/System/Innovations/Index');
        }




        return view('usermanagement::innovations.import', $data);
    }


    public function MarkApprove($id, Request $request)
    {
        $data = $request->all();
        $data['model'] = $model = Innovation::find($id);
        $data['url'] = url()->current();
        if ($request->isMethod("post")) {
            $data = $request->all();
            $model->is_featured = $data['is_featured'];
            $model->publish_status = $data['publication_status'];
            $model->publish_date = date("Y-m-d H:i:s");
            $model->published_by = $this->userID;
            $model->approval_remarks = $data['nps_remarks'];
            $model->save();
            if ($model->is_featured == 1) {
                $featured = new FeaturedItem();
                $featured->item_type = "Innovation";
                $featured->item_title = $model->inno_name;
                $featured->cover_image = $model->inno_cover_image;
                $featured->publish_date = $model->publish_date;
                $featured->item_detailurl = url('/innovations/Details/' . $model->inno_code);
                $featured->created_by = $this->userID;
                $featured->save();
            }

            Session::flash("success_msg", "Innovation " . $model->publish_status . " Successfully");
            return redirect()->back();
        }

        return view('usermanagement::innovations._approve', $data);
    }

    public function getWards(Request $request)
    {
        $data = $request->all();
        $name = $data['name'];

        $models = Ward::where(['subcountyname' => $name])->get();
        echo '<option value="">---Select ward Name---</option>';
        foreach ($models as $model) {
            echo '<option>' . $model->wardname . '</option>';
        }
    }

    public function Coordinates(Request $request)
    {
        $data = $request->all();
        $name = $data['name'];
        $model = Ward::where(['wardname' => $name])->first();
        if ($model) {
            $data = array(
                "name" => $model->wardname,
                "lat" => $model->latitude,
                "lon" => $model->longitude
            );
        } else {
            $data = array(
                "name" => null,
                "lat" => null,
                "lon" => null
            );
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {

        $data['page_title'] = "New Innovation";
        $data['url'] = url()->current();
        $data['counties'] = County::pluck('county_name', 'id')->toArray();
        $data['nodes'] = NodeType::pluck('node_name', 'id')->toArray();
        $data['categories'] = InnovationCategory::pluck('category_name', 'category_name')->toArray();
        $data['sub_counties'] = Ward::select('subcountyname')->groupBy('subcountyname')->pluck('subcountyname', 'subcountyname')->toArray();



        if (Auth::User()->hasRole("County Co-ordinator")) {

            $data['county'] = County::where('id', $this->sid)->pluck('county_name', 'id')->toArray();
            $data['vcos'] = Organization::where(['county_id' => $this->sid])->pluck('org_name', 'org_name')->toarray();
        } else {

            $data['county'] = County::pluck('county_name', 'id')->toArray();
            $data['vcos'] = Organization::pluck('org_name', 'org_name')->toarray();
        }
        $data['status'] = InnovationStatus::pluck('status_name', 'status_name')->toArray();

        $valueschanins = CountyValueChain::join('value_chains', 'value_chains.id', '=', 'county_value_chains.value_chain_id')->where(['county_id' => $this->sid])->pluck('value_name', 'value_chains.id')->toArray();
        $data['valuechains'] = $valueschanins;
        $data['model'] = new Innovation();
        if ($request->isMethod("post")) {
            $data = $request->all();



            DB::beginTransaction();
            $upload = Upload::find($data['primary_image']);

            $filename = $upload->filename;

            $model = new Innovation();
            $model->inno_name = $data['inno_name'];
            $model->innovation_type = $data['innovation_type'];
            $model->inno_location = $data['inno_location'];
            $model->inno_longitude = $data['inno_longitude'];
            $model->inno_latitude = $data['inno_latitude'];
            $model->inno_subcounty = $data['subcounty'];
            $model->inno_ward = $data['wardname'];
            $model->node_id = $data['node_id'];
            $model->vco_name = $data['org_id'];
            $model->innovation_status = $data['innovation_status'];
            $model->value_chain_id = $data['value_chain'];
            $model->inno_sources = $data['inno_sources'];
            $model->inno_male_adultvca = $data['inno_male_adultvca'];
            $model->inno_female_adultvca = $data['inno_female_adultvca'];


            $model->inno_youth_malevca = $data['inno_youth_malevca'];
            $model->inno_youth_femalevca = $data['inno_youth_femalevca'];
            $model->innovation_output = $data['innovation_output'];

            $model->inno_background = $data['inno_background'];
            $model->inno_objective = $data['inno_objective'];
            $model->inno_description = $data['inno_description'];
            $model->inno_vca_benefit = $data['inno_vca_benefit'];
            $model->inno_lesson_challenges = $data['inno_lesson_challenges'];
            $model->created_by = $this->userID;
            $model->inno_vca_benefit = $model->inno_male_adultvca + $model->inno_female_adultvca + $model->inno_youth_malevca + $model->inno_youth_femalevca;
            $model->county_id = $data['county_id'];
            $model->inno_male_vca = $model->inno_male_adultvca + $model->inno_youth_malevca;
            $model->inno_female_vca = $model->inno_vca_benefit - $model->inno_male_vca;
            $model->inno_youth_vca = $model->inno_youth_malevca + $model->inno_youth_femalevca;
            $model->inno_code = Helper::generatePin(8);
            $model->inno_cover_image = $filename;
            $model->inno_cost = doubleval(str_replace(",", "", $data['inno_cost']));
            $model->inno_contacttel = $data['inno_contacttel'];
            $model->inno_contactname = $data['inno_contactname'];
            $model->save();

            if (isset($data['primary_images']) && is_array($data['primary_images'])) {
                $image_string = $data['primary_images'][0];
                $images = explode(",", $image_string);
                foreach ($images as $image) {
                    if (strlen($image) > 0) {
                        $innovationimage = new InnovationImage();
                        $innovationimage->image_id = $image;
                        $innovationimage->innovation_id = $model->id;
                        $innovationimage->save();
                    }
                }
            }
            DB::commit();
            Session::flash("success_msg", "Innovation added Successfully");
            return redirect('/System/Innovations/Index');
        }





        return view('usermanagement::innovations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usermanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod("post")) {
            return   $this->update($request, $id);
            return;
        } else {
        }
        $data['page_title'] = "Edit Innovation";
        $data['url'] = url()->current();
        $data['counties'] = County::pluck('county_name', 'id')->toArray();
        $data['nodes'] = NodeType::pluck('node_name', 'id')->toArray();
        $data['categories'] = InnovationCategory::pluck('category_name', 'category_name')->toArray();
        $data['sub_counties'] = Ward::select('subcountyname', 'id')->groupBy('subcountyname')->pluck('subcountyname', 'id')->toArray();



        if (Auth::User()->hasRole("County Co-ordinator")) {

            $data['county'] = County::where('id', $this->sid)->pluck('county_name', 'id')->toArray();
            $data['vcos'] = Organization::where(['county_id' => $this->sid])->pluck('org_name', 'org_name')->toarray();
        } else {

            $data['county'] = County::pluck('county_name', 'id')->toArray();
            $data['vcos'] = Organization::pluck('org_name', 'org_name')->toarray();
        }
        $data['status'] = InnovationStatus::pluck('status_name', 'status_name')->toArray();

        $valueschanins = CountyValueChain::join('value_chains', 'value_chains.id', '=', 'county_value_chains.value_chain_id')->where(['county_id' => $this->sid])->pluck('value_name', 'value_chains.id')->toArray();
        $data['valuechains'] = $valueschanins;
        $data['model'] = Innovation::find($id);


        $data;



        return view('usermanagement::innovations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();

        DB::beginTransaction();

        try {

            // $upload = Upload::find($data['primary_image']);

            // $filename = $upload->filename;

            $model = Innovation::findOrFail($id);
            $model->inno_name = $data['inno_name'];
            $model->innovation_type = $data['innovation_type'];
            $model->inno_location = $data['inno_location'];
            $model->inno_longitude = $data['inno_longitude'];
            $model->inno_latitude = $data['inno_latitude'];
            $model->inno_subcounty = (array_key_exists('subcounty', $data)) ? $data['subcounty'] : null;
            $model->inno_ward = (array_key_exists('wardname', $data)) ? $data['wardname'] : null;

            $model->node_id = $data['node_id'];
            $model->vco_name = $data['org_id'];
            $model->innovation_status = $data['innovation_status'];
            // $model->value_chain_id = $data['value_chain'];
            $model->inno_sources = $data['inno_sources'];
            $model->inno_male_adultvca = $data['inno_male_adultvca'];
            $model->inno_female_adultvca = $data['inno_female_adultvca'];


            $model->inno_youth_malevca = $data['inno_youth_malevca'];
            $model->inno_youth_femalevca = $data['inno_youth_femalevca'];
            $model->innovation_output = $data['innovation_output'];

            $model->inno_background = $data['inno_background'];
            $model->inno_objective = $data['inno_objective'];
            $model->inno_description = $data['inno_description'];
            $model->inno_vca_benefit = $data['inno_vca_benefit'];
            $model->inno_lesson_challenges = $data['inno_lesson_challenges'];
            $model->created_by = $this->userID;
            $model->inno_vca_benefit = $model->inno_male_adultvca + $model->inno_female_adultvca + $model->inno_youth_malevca + $model->inno_youth_femalevca;
            $model->county_id = $data['county_id'];
            $model->inno_male_vca = $model->inno_male_adultvca + $model->inno_youth_malevca;
            $model->inno_female_vca = $model->inno_vca_benefit - $model->inno_male_vca;
            $model->inno_youth_vca = $model->inno_youth_malevca + $model->inno_youth_femalevca;
            $model->inno_code = Helper::generatePin(8);
            // $model->inno_cover_image = $filename;
            $model->inno_cost = doubleval(str_replace(",", "", $data['inno_cost']));
            $model->inno_contacttel = $data['inno_contacttel'];
            $model->inno_contactname = $data['inno_contactname'];
            $model->save();

            if (isset($data['primary_images']) && is_array($data['primary_images'])) {
                $image_string = $data['primary_images'][0];
                $images = explode(",", $image_string);
                foreach ($images as $image) {
                    if (strlen($image) > 0) {
                        $innovationimage = new InnovationImage();
                        $innovationimage->image_id = $image;
                        $innovationimage->innovation_id = $model->id;
                        $innovationimage->save();
                    }
                }
            }
            DB::commit();
            Session::flash("success_msg", "Innovation added Successfully");
            return redirect('/System/Innovations/Index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
