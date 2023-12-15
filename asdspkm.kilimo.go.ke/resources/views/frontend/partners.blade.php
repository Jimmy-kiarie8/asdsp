@extends('frontend.main')
@section('content')
<div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap"  style="background-color: darkgreen;">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Partners</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{url('/')}}">Home </a></li>
                                <li>Partners</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Project Section Start -->
                <section class="project-details-wrap ptb-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="project-card style1">
                                    <div class="project-img">
                                        <img src="{{asset('/siteassets/assets/img/gok.png')}}" alt="GoK" width="420px" height="565px" style="border: 5px solid #2ad243;">
                                    </div>
                                    <div class="project-info">
                                        <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                        <h3><a href="#">Ministry of Agriculture and Livestock Development</a></h3>
                                        <p>&nbsp;</p>
                                        <a href="https://kilimo.go.ke/" target="_blank" class="link style1">Official Website <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="project-card style1">
                                    <div class="project-img">
                                        <img src="{{asset('/siteassets/assets/img/partners/cog.png')}}" alt="CoG"  width="420px" height="565px" style="border: 5px solid #2ad243;">
                                    </div>
                                    <div class="project-info">
                                        <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                        <h3><a href="#">47 County Governments in Kenya</a></h3>
                                        <p>&nbsp;</p>
                                        <a href="https://www.cog.go.ke/" target="_blank" class="link style1">Official Website <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="project-card style1">
                                    <div class="project-img">
                                        <img src="{{asset('/siteassets/assets/img/asdsplogo.png')}}" alt="ASDSP"  width="420px" height="565px" style="border: 5px solid #2ad243;">
                                    </div>
                                    <div class="project-info">
                                        <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                        <h3><a href="#">ASDSP II</a></h3>
                                        <p>&nbsp;</p>
                                        <a href="https://asdsp.kilimo.go.ke/" target="_blank" class="link style1">Official Website <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="project-card style1">
                                    <div class="project-img">
                                        <img src="{{asset('/siteassets/assets/img/partners/eu_flag.jpg')}}" alt="EU"  width="420px" height="565px" style="border: 5px solid #2ad243;">
                                    </div>
                                    <div class="project-info">
                                        <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                        <h3><a href="#">The European Union</a></h3>
                                        <p>&nbsp;</p>
                                        <a href="https://european-union.europa.eu/index_en" target="_blank" class="link style1">Official Website <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="project-card style1">
                                    <div class="project-img">
                                        <img src="{{asset('/siteassets/assets/img/partners/embassyofsweden.jpg')}}" alt="The Embassy of Sweden"  width="420px" height="565px" style="border: 5px solid #2ad243;">
                                    </div>
                                    <div class="project-info">
                                        <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                        <h3><a href="#">The Embassy of Sweden</a></h3>
                                        <p>&nbsp;</p>
                                        <a href="https://www.swedenabroad.se/en/embassies/kenya-nairobi/" target="_blank" class="link style1">Official Website <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                      
                    </div>
                </section>
                <!-- Project Details Section End -->

            </div>


@stop