<?php

namespace Modules\Usermanagement\Http\Controllers;

use App\CountyReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Usermanagement\Entities\County;

class CountyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all(); 


        $url = url()->current();
        $counties = [];
        $successMessage = "";

        if ($request->isMethod("post")) {

            $validatedData = $request->validate([
                'type' => 'required|string',
                'title' => 'required|string',
                'file' => 'required|file|mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation',
            ]);

            if ($request->type ===  "County" && !$request->county) {
                // In a controller or route handler
                return redirect()->back()->withErrors('County is required.');
            }
            $data = $request->all();

            DB::beginTransaction();

            try {
                $report = new CountyReport();
                if ($request->has('file')) {
                    $file = $request->file('file');
                    $path = Storage::disk('public')->put('reports', $file, 'public');
                    $report->title = $request->title;
                    $report->path = '/storage/app/public/' . $path;
                    $report->county = ($request->county) ? $request->county : 'National';
                    $report->created_by = Auth::id();
                    $report->save();
                }
                DB::commit();
                $successMessage =  'File uploded';
            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        $counties = County::pluck('county_name', 'id')->toArray();
        $searchTerm = $request->search;

        if ($searchTerm) {
            // $reports = CountyReport::where('county', 'like', "%{$request->search}%")->orWhere('title', 'like', "%{$request->search}%");

            $reports = CountyReport::when(strcasecmp($searchTerm, 'national') === 0, function ($query) {
                // When the search term is "national," return records with a null county
                return $query->where('county', 'like', '%national%')
                             ->orWhere('title', 'like', '%national%')
                             ->orWhereNull('county');
            }, function ($query) use ($searchTerm) {
                // For other search terms, use the original conditions
                return $query->where('county', 'like', "%$searchTerm%")
                             ->orWhere('title', 'like', "%$searchTerm%");
            });
        } else {
            $reports = new CountyReport;
        }
        $reports = $reports->paginate();
        // return view('usermanagement::reports.county-upload', compact('url', 'counties', 'reports'))->with('success', 'File uploaded successfully!');
        return view('usermanagement::reports.county-upload', compact('url', 'counties', 'reports', 'successMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CountyReport  $countyReport
     * @return \Illuminate\Http\Response
     */
    public function show(CountyReport $countyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CountyReport  $countyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(CountyReport $countyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CountyReport  $countyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountyReport $countyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CountyReport  $countyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountyReport $countyReport)
    {
        //
    }
}
