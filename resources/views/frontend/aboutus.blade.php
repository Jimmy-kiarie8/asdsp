@extends('frontend.main')
@section('content')

  <!-- Content Wrapper Start -->
            <div class="content-wrapper">
                <!-- Breadcrumb Start -->
              <div class="breadcrumb-wrap" style="background-color: darkgreen;">
                <div class="container">
                    <div class="breadcrumb-title">
                        <h2>About the Portal</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="{{url('/')}}">Home </a></li>
                            <li><a href="{{url('aboutus')}}">About us</a></li>
                         
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb End -->

                

                <!-- About Section Start -->
                <section class="about-wrap style1 ptb-100">
                    <img src="{{asset('/siteassets/assets/img/about/about-shape-2.png')}}" alt="Image" class="about-shape-one">
                        <div class="container">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-6">
                                <div class="about-img-wrap bg-f">
                                    <div class="about-quote">
                                        <i class="flaticon-right-quote"></i>
                                        <p>Enhancing the capacity of different Priority Value Chain Actors at different levels to tackle the problems that hinder commercialization of Agriculture.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-content">
                                    <div class="content-title style1">
                                        <span>About The ASDSP Innovation Portal<img src="{{asset('/siteassets/assets/img/section-shape.png')}}" alt="Image"></span>
                                        <h2>An Online Knowledge Repository</h2>
                                        <p>
                                            The ASDSP Innovation portal is an online knowledge repository that provides a single access point for discovery, 
                                            acquisition and sharing of information about innovations, technologies, and best practices. The repository offers an opportunity to promote participatory innovation development by the value chain actors by
    encouraging ‘VCA-led experimentation’ and the integration of farming communities into innovation systems. The idea is to foster knowledge sharing among value chain actors and other innovation actors,
    encouraging value chain actors to compare and share their experiences and to experiment more critically.
    </p>
    <p>
    The repository also integrates projects inventory and other partner projects which had been leveraged
    for partnership with other collaborators. The system allows for identification and tracking of the
    projects through integrated co-ordinates. Additionally, it will also support ‘Farmer Led Documentation’
    in which rural communities express their own knowledge, experiences, and practices in their own words.
    
                                            
                                        </p>
                                        <p>Objectives of the portal include:</p>
                                    </div>
                                    <ul class="content-feature-list list-style mb-0">
                                        <li><i class="ri-checkbox-circle-line"></i>Facilitate timely and open access to ASDSP II information and literature. 
                                        </li>
                                        <li><i class="ri-checkbox-circle-line"></i>Provide a long-term preservation of resources and provide perpetual access, re-use, generation and dissemination of knowledge
                                        </li>
                                        <li><i class="ri-checkbox-circle-line"></i>To bring knowledge to people who can use and apply it, to contribute to the ASDSP II success.
                                        </li>
                                        <li><i class="ri-checkbox-circle-line"></i>To be a preferred point of reference on ASDSP II literature, activities, and information </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- About Section End -->

                




               

               
            </div>


@stop