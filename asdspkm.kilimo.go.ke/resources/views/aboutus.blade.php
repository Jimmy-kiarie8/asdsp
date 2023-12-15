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


 <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">

            <div class="panel panel-default">
  <div class="panel-heading">Portal Login</div>
  <div class="panel-body">

    <div class="row">
                <form  action="{{url('/login')}}" method="post">
                     <?=csrf_field();?>
                     <div class="col-md-12 form-group">
                        <label>Email/Username</label>
                        <input type="text" name="username" class="form-control" required>
                         

                     </div>

                     <div class="col-md-12 form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                         

                     </div>


                      <div class="col-md-12 form-group">
                        <button class="btn btn-default">Log in</button>
                      </div>
                    

                </form>
                  
              </div>
      


  </div>
</div>



            <ul class="list-group margin-bottom-25 sidebar-menu">
              
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>About us</h1>
            <div class="content-page">
              <p><img src="{{asset('myassets/img/coverone.jpeg')}}" alt="About us" class="img-responsive"></p> 

              <p>Agritech Innovation hub is a product of the Agricultural Sector Development Support
Programme (ASDSP II) created in 2022 to support knowledge sharing of innovation,
technology and best practices promoted by the programme to enhance value chain
productivity and participation of women and youths. The Agriculture Sector Development
Support Programme Phase Two (ASDSP II) is one of the key programmes designed by the
Ministry of Agriculture, Livestock, Fisheries and Cooperatives and 47 county governments to
contribute to addressing food and nutrition security and promote manufacturing. It is
primarily designed to enhance the capacity of different Priority Value Chain Actors at
different levels to tackle the problems that hinder commercialization of Agriculture.
<p>
The Agritech Innovation hub was created to promote and enhance knowledge sharing of the
innovations and technologies and its anchored under the Monitoring, Evaluation and
communication unit of the programme.<p>
The Knowledge management and Communication model that guides the work of the Agritech
innovation hub can be summarized as follows:</p>
  <ol>
    <li>Knowledge Identification &amp; Capturing</li>
    <li>Packaging (short stories, photos, videos);</li>
    <li>Sharing (digital platform, media)</li>
    <li>Monitoring benefits of sharing;</li>
    <li>Adoption;</li>
  </ol>

  <p>
    Follow us on Twitter @agritechinnovationhub and share some of the innovations and
technologies, and best practices that are geared to enhance agricultural productivity and
improve participation of women and youth.
  </p>


              

             

              

              
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
 





@stop