@extends('front.main')
<?php 
use App\Helpers\Helper; 
?>
@section('breadcrum')
<div class="row">
    <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            
            <li class="active">Success Story</li>
        </ul>
    
</div>

<style type="text/css">
    .img-responsive{
        height: 200px !important;

    }
</style>



@stop
@section('content')
<div class="row">
    


  <div class="col-md-12 col-sm-12">
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-12 col-sm-12">
             
              <?php foreach($models as $story):?>
                 <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{asset('uploads/'.$story->story_cover_image)}}" class="img-responsive" alt="Berry Lace Dress"  >
                    <div>
                      <a href="{{asset('uploads/'.$story->story_cover_image)}}" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="#">  {{str_limit($story->story_title,37)}}</a></h3>
                  <div>County :{{($story->county)?$story->county->county_name:"Not Set"}}</div>
                  <div class="pi-price">{{$story->story_date}}</div>
                   <div class="row">
                    <div class="col-md-12">
                    <a href="{{url('/SuccessStories/Details/'.$story->id)}}" class="btn btn-danger form-control" style="background:#F3565D;border-color: #f13e46;color:white;padding-top: 1.2%;">View Details</a>
                       
                   </div>
                      
                  </div>
                </div>
              </div>
              <!-- PRODUCT ITEM END -->

                <?php endforeach;?>


                

                </div>
            </div>

    </div>
</div>




@stop