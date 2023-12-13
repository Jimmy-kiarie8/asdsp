@extends('front.main')
<?php 
use App\Helpers\Helper; 
?>
@section('breadcrum')

<ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            
            <li class="active">About Us</li>
        </ul>


@stop
@section('content')

<div class="row">
  


 <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">

            <div class="panel panel-default">
  
  <div class="panel-body">

    <div class="row">
              
                     <div class="col-md-12 form-group">
                        <label>County</label>
                        <select name="county_id" class="form-control">
                           <option value="0">--All Counties---</option>

                          <?php foreach($counties as $county):?>
                            <option>{{$county->county_name}}</option>
                          <?php endforeach;?>
                          
                        </select>
                         

                     </div>
                     <div class="col-md-12 form-group">
                        <button class="btn btn-danger form-control">Filter
                        <span class="fa fa-search"></span>
                        </button>
                      </div>
              </div>
      </div>
</div>


         <div class="panel panel-default">

  
  <div class="panel-body">
           <button class="btn btn-danger form-control" style="background:purple">Download <span class="fa fa-download"></span> </button>
      </div>
    </div>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>{{$model->story_title}}</h1>
            <h2>Location: {{$model->story_location}}, {{$model->county->county_name}} </h2>

            <div class="content-page">


              <p><img src="{{asset('uploads/'.$model->story_cover_image)}}" alt="Story Detail" class="img-responsive"></p> 

              <p>{!!$model->strory_description!!}</p>

             

             
             

              

           </div>
          </div>
          <!-- END CONTENT -->
        </div>




@stop