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
use Modules\Usermanagement\Entities\TrainingPhoto;
use Modules\Usermanagement\Entities\ProductMetaData;
use Modules\Usermanagement\Entities\CountyValueChain;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use App\User;
use Input;
use Validator;
use Redirect;
use App\Helpers\SystemAudit;
use Excel;
use App\Upload;
use App\Imports\MemberImport;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Usermanagement\Entities\UnitOfMeasure;
use Modules\Usermanagement\Entities\Training;
use Modules\Usermanagement\Entities\TrainingAttendance;
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\SuccessStoryImage;
use Modules\Usermanagement\Entities\SuccessStory;


class SuccessStoryController extends Controller
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
    $data['page_title'] = "Success Stories";

    return view('usermanagement::successstories.index', $data);
  }


  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create(Request $request)
  {
    // return SuccessStory::latest()->first();

    $data['page_title'] = "New Innovation";
    $data['url'] = url()->current();
    $data['nodes'] = NodeType::pluck('node_name', 'id')->toArray();
    $data['innovations'] = Innovation::where(['county_id' => $this->sid])->pluck('inno_name', 'id')->toArray();

    $data['counties'] = County::pluck('county_name', 'id')->toArray();


    if (Auth::User()->hasRole("County Co-ordinator")) {
      $data['county'] = County::where('id', $this->sid)->pluck('county_name', 'id')->toArray();
    } else {

      $data['county'] = County::pluck('county_name', 'id')->toArray();
    }

    $valueschanins = CountyValueChain::join('value_chains', 'value_chains.id', '=', 'county_value_chains.value_chain_id')->where(['county_id' => $this->sid])->pluck('value_name', 'value_chains.id')->toArray();
    $data['valuechains'] = $valueschanins;
    $data['model'] = new SuccessStory();

    if ($request->isMethod("post")) {
      $this->validate($request, [
        'story_title' => 'required',
        'group_name' => 'required',
        'inno_description' => 'required',



      ]);
      $data = $request->all();


      DB::beginTransaction();
      // $innovation = Innovation::find($data['innovation_id']);

      $upload = Upload::find($data['primary_image']);

      $filename = $upload->filename;


      $model = new SuccessStory();
      $model->story_title = $data['story_title'];
      $model->node_id = $model->node_id;
      // $model->innovation_id = $data['innovation_id'];
      $model->vco_name = $data['group_name'];
      // $model->value_chain_id = $innovation->value_chain_id;
      $model->story_cover_image = $filename;
      $model->story_date = date("Y-m-d");
      $model->strory_description = $data['inno_description'];
      $model->county_id = $data['county_id'];
      $model->created_by = $this->userID;
      $model->story_location = $data['location'];
      $model->story_longitude = null;
      $model->story_latitude = null;
      $model->publish_status = "Published";
      $model->publish_date = date('Y-m-d H:i:s');
      $model->published_by = $this->userID;

      if($request->has('document')) {
        $file = $request->file('document');

        $originalFileName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $fileName = $originalFileName . '.' . $extension;

        // $path = Storage::disk('public')->put('documents', $file, 'public');
        $path = Storage::disk('public')->putFileAs('documents', $file, $fileName, 'public');

        $model->document = '/storage/app/public/' . $path;
      }
  
      $model->save();


      if (isset($data['primary_images']) && is_array($data['primary_images'])) {
        $image_string = $data['primary_images'][0];
        $images = explode(",", $image_string);
        foreach ($images as $image) {
          if (strlen($image) > 0) {
            $innovationimage = new SuccessStoryImage();
            $innovationimage->image_id = $image;
            $innovationimage->story_id = $model->id;
            $innovationimage->save();
          }
        }
      }
      DB::commit();

      Session::flash("success_msg", "Story Added Successfully");
      return redirect('/System/SuccessStories/Index');
    }
    return view('usermanagement::successstories.create', $data);
  }


  public function fetchList()
  {
    $models = SuccessStory::whereNull('is_deleted');


    return Datatables::of($models)
      ->rawColumns(['action', 'story_cover_image'])

      ->editColumn('story_cover_image', function ($model) {

        if (strlen($model->story_cover_image) > 0) {

          $url = asset('uploads/' . $model->story_cover_image);
        } else {
          $url = asset("placeholder.png");
        }


        $view_url = url('/backend/directors/view/' . $model->id);

        return '<img src=' . $url . ' data-title="View Manager-Summary View" border="0" width="120" height="100"  data-url="' . $view_url . '" class="img-rounded pop-modal" align="center" cursor="pointer"  style="cursor:pointer;border-radius:5%" title="View Details"    />';
      })

      ->addColumn('action', function ($model) {
        $edit_url = url('/System/SuccessStories/EditDetails/' . $model->id);
        $trainee_url = url('/System/TrainingModule/AddAttendance/' . $model->id);

        $view_url = url('/System/SuccessStories/Submit/' . $model->id);
        $gallery_url = url('/System/TrainingModule/ViewGallery/' . $model->id);
        return '

                         <div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">

   <li><a style="cursor:pointer;" class="reject-modal"  data-title="View Attendace Sign Sheet" data-url="' . $view_url . '"><i class="icol-font"></i>Submit For Publication</a></li>
   
  
  
   

     <li><a style="cursor:pointer;" class="reject-modal"   data-title="View Gallery" data-url="' . $gallery_url . '"><i class="icon-camera-retro"></i>View Gallery</a></li>

    </ul>
</div> 
';
      })->make(true);
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
  public function edit($id)
  {
    return view('usermanagement::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    SuccessStory::find($id)->delete();
  }
}
