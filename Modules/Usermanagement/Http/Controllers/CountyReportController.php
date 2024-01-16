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
        $url = url()->current();
        $counties = [];


        if ($request->isMethod("post")) {
            $data = $request->all();

            DB::beginTransaction();

            try {
                $report = new CountyReport();
                if ($request->has('file')) {
                    $file = $request->file('file');
                    $path = Storage::disk('public')->put('reports', $file, 'public');
                    $report->title = $request->title;
                    $report->path = '/storage/app/public/' . $path;
                    $report->county = $request->county;
                    $report->created_by = Auth::id();
                    $report->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }
        $counties = County::pluck('county_name', 'id')->toArray();
        $reports = CountyReport::paginate();

        return view('usermanagement::reports.county-upload', compact('url', 'counties', 'reports'));
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
