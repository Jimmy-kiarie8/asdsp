<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Usermanagement\Entities\County;
use Modules\Usermanagement\Entities\Organization;
use Modules\Usermanagement\Entities\InnovationStatus;
use Modules\Usermanagement\Entities\InnovationCategory;
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
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\InnovationImage;
use Modules\Usermanagement\Entities\Publication;

class PublicationController extends Controller
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
        $data['page_title'] = "Publications";

        return view('usermanagement::publications.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        // return $request->all();
        $data['url'] = url()->current();
        $data['model'] = new Publication();
        if ($request->isMethod("post")) {
            $this->validate($request, [
                'publication_title' => 'required|unique:publications|string',
                'author_name' => 'required',
                'file' => 'required|max:20480',
                'primary_image' => 'required',
                'publication_description' => 'required'

            ]);

            try {

                $data = $request->all();
                $model = new Publication();
                $model->publication_title = $data['publication_title'];
                $model->author = $data['author_name'];
                $model->category = $data['category'];
                $model->language = $data['langauge'];
                $model->publisher = $data['publisher'];
                $model->rights = $data['rights'];
                $model->license = $data['license'];
                $model->cover_image = $data['primary_image'];
                $model->publication_desciption = $data['publication_description'];
                $model->code = Helper::generatePin(15);
                $model->url_link = url('Publications/Details/' . $model->code);
                $model->published_by = $this->userID;
                $model->created_by = $this->userID;
                $model->publish_date = date("Y-m-d H:i:s");
                if (isset($data['file'])) {

                    $photo = $data['file'];
                    $extension = $photo->getClientOriginalExtension(); // getting 
                    $fileName = $model->code . "_" . date('YmdHis') . '_publication.' . $extension; // renameing image
                    $model->resourse_path = $fileName;
                    $destinationPath = base_path() . '/public/publications/';; //
                    Input::file('file')->move($destinationPath, $fileName);
                }
                $model->save();
                Session::flash("success_msg", "Publication Uploaded Successfully");
                return redirect('/System/Publication/Index');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return view('usermanagement::publications.create', $data);
    }


    public function fetchList()
    {
        $models = Publication::whereNull('is_deleted');

        return Datatables::of($models)
            ->rawColumns(['action'])
            ->addColumn('action', function ($model) {
                $edit_url = url('/System/InnovationCategories/EditDetails/' . $model->id);
                $download_url = url('/public/publications/' . $model->resourse_path);
                return '<div class="dropdown">
  <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
   <li><a style="cursor:pointer;" target="_new"  title="Download" href="' . $download_url . '">&nbsp;&nbsp;&nbsp;&nbsp;Download</a></li>

    <li><a style="cursor:pointer;" class="reject-modal"  title="Edit Details" href="#">&nbsp;&nbsp;&nbsp;&nbsp;Edit Details</a></li>
    
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
        //
    }
}
