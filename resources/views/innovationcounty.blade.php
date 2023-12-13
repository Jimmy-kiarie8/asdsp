@extends('front.main')
<?php 
use App\Helpers\Helper; 
?>
@section('breadcrum')
<div class="row">
    <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            
            <li class="active">Innovations</li>
        </ul>
    
</div>



@stop
@section('content')

 <div class="row margin-bottom-40">
      <?php foreach($models as $model):?>
        <div class="col-md-3">
            <div class="panel panel-default">
  <div class="panel-heading">{{$model->county_name}} : {{$model->id}}</div>
  <div class="panel-body">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
        <img src="{{asset('myassets/img/Countylogo/'.$model->county_name.'.png')}}" style="width:100%;height:85px;">
    </div>

        
    </div>
    <div class="row">
        <div class="col-md-12">

        <h4>No of Innovation:45</h4>
       <h4>No of VCO:45</h4>
            
        </div>
        
        
    </div>

     <div class="row">
         <div class="col-md-12">
        <a href="" class="btn btn-danger form-control">Explore</a>
    </div>

     </div>


  </div>
</div>
            
        </div>

      <?php endforeach;?>


    </div>



@stop