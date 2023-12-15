<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Innovation Listings</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="ASDSP II Innovations" name="description">
  <meta content="List of Innovations in Kenya agricultural sector" name="keywords">
  <meta content="isanya hillary" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="{{asset('myassets/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="{{asset('myassets/assets/pages/css/animate.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="{{asset('myassets/assets/pages/css/components.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/pages/css/slider.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/pages/css/style-shop.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('myassets/assets/corporate/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/corporate/css/style-responsive.css')}}" rel="stylesheet">
  <link href="{{asset('myassets/assets/corporate/css/themes/red.css')}}" rel="stylesheet" id="style-color">
  <link href="{{asset('myassets/assets/corporate/css/custom.css')}}" rel="stylesheet">
    <style type="text/css">
      .carousel-slider .item {
  width: 100%;
  height: 60%;
  min-height: 360px !important;
}

.pre-header {
  color: white;
  border-bottom: 1px solid #eee;
  padding-top: 10px;
  line-height: 1.2;
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  background: #51b335;
}

.header {
  box-shadow: 0 1px 3px #774242;
  background: #fff;
  border-radius: 0;
  margin-bottom: 23px;
  z-index: 999;
  position: relative;
  height: 75Px;
}

    </style>
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
   

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+254724256157</span></li>
                        <!-- BEGIN CURRENCIES -->
                         <li><i class="fa fa-envelope"></i><span>info@asdsp.kilimo.go.ke</span></li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block" >
                            <a href="javascript:void(0);" class="current" style="color:white;" >English </a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              
                              <a href="javascript:void(0);">English</a>
                            </div></div>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right" style="color:white;">
                        <li><a href="{{url('/home')}}"  style="color:white;">My Account</a></li>
                       
                        <li><a href="{{url('/login')}}" style="color:white;">Log In</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="{{url('/')}}"><img src="{{asset('myassets/img/KenyaInnovation.gif')}}" alt="Innovations" width="58px;">AGRITECH Innovation Portal</a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>




        
        

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
           
             <li class="active"><a href="{{url('/')}}">Home</a></li>

             <li><a href="{{url('/about')}}">About</a></li>
             <li><a href="{{url('/innovation')}}">Innovations</a></li>
             <li><a href="#">Entrepreneurship</a></li>

             <li><a href="{{url('/SuccessStories')}}">Success Stories</a></li>

             
            

           
            
          
            <!-- BEGIN TOP SEARCH -->
            
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

   



    <div class="main">
      

      <div class="container">
           @yield('breadcrum')


        
        <!-- BEGIN SIDEBAR & CONTENT -->

        <div class="row margin-bottom-40 ">
          @yield('content')
        
    </div>
</div>

   




    <!-- BEGIN STEPS -->
    <div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>Account Creation</h2>
              <em>Contact ASDSP Team For creatio  of account </em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>Innovation Details</h2>
              <em>Add Innovation details based on prescribed format</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>Production</h2>
              <em>Publish your innovation on the platform once ready</em>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer" style="background: #4d923e;">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
            <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Nodes</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Input Supply</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Production</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Transport</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Trade</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Processing</a></li>
              
            </ul>
          </div>
          <!-- END INFO BLOCK -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Latest Tweets</h2>
            <a class="twitter-timeline" href="#" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @asdsp</a>      
          </div>
          <!-- END TWITTER BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              Hill Plaza Building Ngong Road , Nairobi, Kenya<br>
              Phone: 300 323 3456<br>
              P. O. Box 30028-00100 Kenya<br>
              Email: <a href="mailto:info@asdsp.go.ke">info@asdsp.go.ke</a><br>
              website: <a href="#">www.asdsp.kilimo.go.ke</a>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
              <li><a class="rss" data-original-title="rss" href="javascript:;"></a></li>
              <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
              <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
              <li><a class="linkedin" data-original-title="linkedin" href="javascript:;"></a></li>
              <li><a class="youtube" data-original-title="youtube" href="javascript:;"></a></li>
              <li><a class="vimeo" data-original-title="vimeo" href="javascript:;"></a></li>
              <li><a class="skype" data-original-title="skype" href="javascript:;"></a></li>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
          <!-- BEGIN NEWLETTER -->
          <div class="col-md-6 col-sm-6">
            <div class="pre-footer-subscribe-box pull-right">
              <h2>Newsletter</h2>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="youremail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                </div>
              </form>
            </div> 
          </div>
          <!-- END NEWLETTER -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-4 col-sm-4 padding-top-10">
            <?=date('Y')?> © ASDSP. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-4 col-sm-4">
            <ul class="list-unstyled list-inline pull-right">
              <li><img src="assets/corporate/img/payments/western-union.jpg" alt="Agriculture Sector Development Support Programme Phase Two (ASDSP II)" title="We accept Western Union"></li>
            
            </ul>
          </div>
          <!-- END PAYMENTS -->
          <!-- BEGIN POWERED -->
          <div class="col-md-4 col-sm-4 text-right">
            <p class="powered">Powered by: <a href="#">ASDSP</a></p>
          </div>
          <!-- END POWERED -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

   
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
    <script src="{{asset('myassets/assets/plugins/jquery.min.js')}}" type="text/javascript')}}"></script>
    <script src="{{asset('myassets/assets/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myassets/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>      
    <script src="{{asset('myassets/assets/corporate/scripts/back-to-top.js')}}" type="text/javascript"></script>
    <script src="{{asset('myassets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{asset('myassets/assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
    <script src="{{asset('myassets/assets/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->
    <script src="{{asset('myassets/assets/plugins/zoom/jquery.zoom.min.js')}}" type="text/javascript"></script><!-- product zoom -->
    <script src="{{asset('myassets/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->

    <script src="{{asset('myassets/assets/corporate/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{asset('myassets/assets/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
            
            Layout.initFixHeaderWithPreHeader();
            Layout.initNavScrolling();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>