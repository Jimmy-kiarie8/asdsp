<!DOCTYPE html>
<html lang="zxx">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link of CSS files -->
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/remixicon.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/owl-theme-default-min.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/odometer.min.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/fancybox.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/aos.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('/siteassets/assets/css/dark-theme.css')}}">
        <title>ASDSP Innovation Portal</title>
        <link rel="icon" type="image/png" href="{{asset('/siteassets/assets/img/gok.png')}}">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <body>

        <!--Preloader starts-->
      
        <!--Preloader ends-->

       

        <!-- Page Wrapper End -->
        <div class="page-wrapper">

           @include('frontend.menubar')  
            <!-- Header Section End -->

           
            @yield('content')
            
           

             





            

            <!-- Footer Section Start -->
             @include('frontend.footer')
            <!-- Footer Section End -->
        
        </div>
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->
         <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
        <!-- Back-to-top button End -->

        <!-- Link of JS files -->
        <script src="{{asset('/siteassets/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/form-validator.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/contact-form-script.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/aos.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/owl-thumb.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/odometer.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/circle-progressbar.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/fancybox.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/jquery.appear.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/tweenmax.min.js')}}"></script>
        <script src="{{asset('/siteassets/assets/js/main.js')}}"></script>
    </body>

</html>