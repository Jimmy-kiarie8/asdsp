<?php

use Illuminate\Support\Facades\Route;
use Modules\Usermanagement\Entities\County;
use Modules\Usermanagement\Entities\ValueChain;
use Modules\Usermanagement\Entities\ProductName;
use Modules\Usermanagement\Entities\FeaturedItem;
use Modules\Usermanagement\Entities\InnovationCategory;
use Modules\Usermanagement\Entities\Innovation;
use Modules\Usermanagement\Entities\SuccessStory;
use Modules\Usermanagement\Entities\Publication;
use App\Helpers\KraHelper;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider witfetchListhin a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	 // $data=KraHelper::getData();
	 //   dd($data);

	
    $data['featured_items']=FeaturedItem::inRandomOrder()->take(6)->get();

     $totalAdverts=InnovationCategory::count();
        $users=Innovation::whereNull('is_deleted')->count();
        $applicants=SuccessStory::whereNull('is_deleted')->count();
        $applications=Publication::whereNull('is_deleted')->count();

       $data['categories']=$totalAdverts;
       $data['innovations']=$users;
       $data['successstories']=$applicants;
       $data['publications']=$applications;
        
     
     $successStories = SuccessStory::take(4)->get();
$inovations = Innovation::select(
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
->orderBy('innovations.created_at', 'desc') // Order by created_at column in descending order
->take(6)
->get();

    
    $inovations->transform(function($inovation) {
        $inovation->inno_cover_image = (strlen($inovation->inno_cover_image)>0) ? asset('uploads/'.$inovation->inno_cover_image) : asset("placeholder.png");
        
        
        return $inovation;
    });

    return view('pages.home', compact('data', 'inovations', 'successStories'));

	  
    return  view('frontend.home',$data);
})->name('homepage');



Route::get('/innovation-list_', function () {
	 // $data=KraHelper::getData();
	 //   dd($data);

	
    $data['featured_items']=FeaturedItem::inRandomOrder()->take(6)->get();

     $totalAdverts=InnovationCategory::count();
        $users=Innovation::whereNull('is_deleted')->count();
        $applicants=SuccessStory::whereNull('is_deleted')->count();
        $applications=Publication::whereNull('is_deleted')->count();

       $data['categories']=$totalAdverts;
       $data['innovations']=$users;
       $data['successstories']=$applicants;
       $data['publications']=$applications;
        
    //  $inovations = Innovation::paginate(12);
     $inovations = Innovation::select(
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
->orderBy('innovations.created_at', 'desc') // Order by created_at column in descending order
->paginate(12);
    
    $inovations->transform(function($inovation) {
        $inovation->inno_cover_image = (strlen($inovation->inno_cover_image)>0) ? asset('uploads/'.$inovation->inno_cover_image) : asset("placeholder.png");
        
        
        return $inovation;
    });
    
    return view('pages.innovation-list', compact('inovations'));

	  
    return  view('frontend.home',$data);
})->name('innovation-list_');

Route::any('/aboutus','\App\Http\Controllers\AboutUs@Index')->name('about-us');
Route::any('/partners','\App\Http\Controllers\AboutUs@Partners');
Route::any('/faqs','\App\Http\Controllers\AboutUs@faqs');
Route::any('/innovations','\App\Http\Controllers\AboutUs@innovations')->name('innovations');
Route::any('/successstories','\App\Http\Controllers\AboutUs@successstories');
Route::any('/SuccessStories/Details/{id}','InnovationController@Details');
Route::any('/publications','\App\Http\Controllers\AboutUs@publications');
Route::any('/contactus','\App\Http\Controllers\AboutUs@contactus');
Route::any('/innovationdetails/{id}','\App\Http\Controllers\AboutUs@innovationdetails')->name('innovationdetails');


Route::any('/innovation-list','\App\Http\Controllers\AboutUs@innovation_list')->name('innovation-list');

Route::any('/Successstorydetails/{id}','\App\Http\Controllers\AboutUs@Successstorydetails');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/upload', '\App\Http\Controllers\UploadController@getUploadTestPage');
Route::any('/System/file/upload','UploadController@uploadFile');
Route::any('/System/file/fetch','UploadController@fetchFiles');



