@extends('front.main')
<?php 
use App\Helpers\Helper; 
?>
@section('content')
<style type="text/css">
    
    .section-container {
    padding: 15px 0;
}
</style>
<!-- BEGIN search-results -->




        <div id="search-results" class="section-container bg-silver">

            <div id="product" class="section-container pt-20px">

<div class="container">

<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="#">Products</a></li>
<li class="breadcrumb-item active"><a href="#">{{$model->product_name}}</a></li>

</ul>


<div class="product">

<div class="product-detail">

<div class="product-image">

<div class="product-thumbnail">
<ul class="product-thumbnail-list">



<?php foreach($images as $image):
       if(strlen( $image)>0):

    ?>
<li><a href="#" data-click="show-main-image" data-url="{{asset('/uploads/'.Helper::getIMage($image))}}"><img src="{{asset('/uploads/'.Helper::getIMage($image))}}" alt="" /></a></li>
  <?php  endif; endforeach;?>


</ul>
</div>


<div class="product-main-image" data-id="main-image">


  <img src="{{ asset('uploads/'.$model->coverImage->filename)}}" alt="" />
</div>

</div>


<div class="product-info">

<div class="product-info-header">
<h1 class="product-title"><span class="badge bg-success">{{$model->product_name}}</span>  {{$model->product_color}} - #{{$model->product_code}} </h1>
<ul class="product-category">
<li><a href="#">Value Chain</a></li>
<li>/</li>
<li><a href="#">{{$model->product_name}}</a></li>
<li>/</li>

</ul>
</div>


<div class="product-warranty">
<div class="pull-right"><b>Availability: In stock</b></div>
<div style="color:green">Locally Manufactured</div>
 {!!$model->product_description!!}
</div>
<div>
    Measure In:

    <span class="badge bg-warning">{{$model->product_name}}</span>

    
</div>

<hr>

<br>





<div class="product-social">
<ul>
<li><a href="javascript:;" class="facebook" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Facebook" data-bs-placement="top"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="javascript:;" class="twitter" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Twitter" data-bs-placement="top"><i class="fab fa-twitter"></i></a></li>
<li><a href="javascript:;" class="google-plus" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Google Plus" data-bs-placement="top"><i class="fab fa-google-plus-g"></i></a></li>
<li><a href="javascript:;" class="whatsapp" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Whatsapp" data-bs-placement="top"><i class="fab fa-whatsapp"></i></a></li>
<li><a href="javascript:;" class="tumblr" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="Tumblr" data-bs-placement="top"><i class="fab fa-tumblr"></i></a></li>
</ul>
</div>


<div class="product-purchase-container">

<a href="checkout_cart.html" class="btn btn-xs  btn-dark btn-theme btn-lg w-200px">Add to Favourites</a>
</div>

</div>

</div>

  <div class="col-md-12">
     <div class="product-tab" style="margin-top:-2%;">


<div class="table-responsive">

<table class="table table-bordered ">
<thead>
<tr class="success">
<th>County</th>
<th>VCO NAME</th>
<th>Contact Telephone</th>
<th>Avg Price(KES)</th>
<th>Quantity</th>
<th>Units</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php foreach($models as $seller):?>
      <tr>
        <td>{{$seller->county_name}}</td>
        <td>{{$seller->org_name}}</td>
        <td>{{$seller->org_tephone}}</td>
           <td>{{$seller->unit_price}}</td>
         
            <td>{{$seller->qty}}</td>
              <td>{{$seller->uom}}</td>
              <td><button class="btn btn-xs btn-info">Contact</button>
                <button  data-title="Add To Cart" data-url="<?=url('/ProcessCard/Add/'.$seller->org_id.'/'.$seller->product_code)?>" class="btn btn-xs btn-danger reject-modal" style="margin-left:10%;">Order Now</button></td>
        

      </tr>


    <?php endforeach;?>

</tbody>
</table>

</div>



</div>
    
  </div>



</div>


<h4 class="mb-15px mt-30px">You Might Also Like</h4>
<div class="row gx-2">

      <?php foreach($featured as $value):?>

<div class="col-lg-2 col-md-4 col-sm-6">

<div class="item item-thumbnail">
<a href="{{url('/ProductsDetails/'.$value->product_code)}}" class="item-image">
<img src="{{ asset('uploads/'.$value->filename)}}" alt="" />

</a>
<div class="item-info">
<h4 class="item-title">
<a href="#">{{$value->value_name}}<br /></a>
</h4>
<p class="item-desc">{{$value->product_name}}</p>
<div class="item-price">Ksh {{$value->product_price}} /Unit</div>

</div>
</div>

</div>
 <?php endforeach;?>
</div>

</div>

</div>
               
            
            <!-- END container -->
        </div>
        <!-- END search-results -->
@endsection