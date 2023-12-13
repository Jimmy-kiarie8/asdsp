@extends('frontend.main')
@section('content')

 <!-- Hero Section Start -->
            <section class="hero-wrap ">              
                
            </section>
            <!-- Hero Section End -->

            <div class="breadcrumb-wrap bg-f br-1">
                <div class="container">
                    <div class="breadcrumb-title">
                        <h2>&nbsp;</h2>
                       
                    </div>
                </div>
            </div>


<!-- About Section Start -->
             <section class="about-wrap style2 ptb-100 bg-sand" >
                <img src="{{asset('/siteassets/assets/img/about/about-shape-1.png')}}" alt="Image" class="about-shape-one moveHorizontal">
                <div class="container">
                    <div class="row align-items-center gx-5">
                        
                        <div class="col-lg-12"  style="align-items: center;">
                            <div class="about-content">
                                <div class="content-title style3">
                                    
                                    <center> <h2>An Online Knowledge Repository</h2> </center>
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
                                </div>
                                
                                <a href="{{url('/aboutus')}}" class="btn style2">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Section End -->

            

            <!-- Counter Section Start -->
            <div class="counter-wrap style2 bg-lochi pt-100 pb-75">
                <img src="{{asset('/siteassets/assets/img/bg-shape-2.png')}}" alt="Image" class="counter-shape-one">
                <div class="container">
                    <div class="counter-card-wrap style2">
                        <div class="counter-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="counter-icon">
                                <i class="flaticon-coin"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="{{$innovations}}"></span>
                                </h2>
                                <p>Transformative Innovations </p>
                            </div>
                        </div>
                        <div class="counter-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                            <div class="counter-icon">
                                <i class="flaticon-volunteer"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="{{$categories}}"></span>
                                </h2>
                                <p>Innovation Categories</p>
                            </div>
                        </div>
                        <div class="counter-card style2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            <div class="counter-icon">
                                <i class="flaticon-campaign"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="{{$successstories}}"></span>
                                </h2>
                                <p>Success Stories</p>
                            </div>
                        </div>
                        <div class="counter-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <div class="counter-icon">
                                <i class="flaticon-money-box"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="{{$publications}}"></span>
                                </h2>
                                <p>Publications</p>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <!-- Counter Section End -->

           

           <!-- Team Section Start -->
            <section class="team-wrap ptb-100 bg-sand">
                <img src="{{asset('/siteassets/assets/img/shape-11.png')}}" alt="Image" class="team-shape-one">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <span>Priority Value Chains <img src="{{asset('/siteassets/assets/img/section-shape.png')}}" alt="Image"></span>
                        <h2>Innovations</h2>
                    </div>
                    <div class="team-slider-two owl-carousel">
                        <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="team-info-wrap">
                             
                               <div class="team-info">
                                   <h3><a href="{{url('/innovations')}}"> 
                                       <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_chilli.png')}}" alt="African Bird Eye Chilli" > African Bird Eye Chilli 
                                   </a></h3>
                                   <span>x Innovations</span>
                               </div>
                               <div class="social-link">
                                   <span><i class="ri-arrow-down-s-line"></i></span>
                                  
                               </div>
                           </div>
                       </div>
                        <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                             <div class="team-info-wrap">
                              
                                <div class="team-info">
                                    <h3><a href="{{url('/innovations')}}"> 
                                        <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_banana.png')}}" alt="Bananas" > Bananas 
                                    </a></h3>
                                    <span>x Innovations</span>
                                </div>
                                <div class="social-link">
                                    <span><i class="ri-arrow-down-s-line"></i></span>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="team-info-wrap">
                             
                               <div class="team-info">
                                   <h3><a href="{{url('/innovations')}}"> 
                                       <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_beef.png')}}" alt="Beef" > Beef 
                                   </a></h3>
                                   <span>x Innovations</span>
                               </div>
                               <div class="social-link">
                                   <span><i class="ri-arrow-down-s-line"></i></span>
                                  
                               </div>
                           </div>
                       </div>


                       <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                        <div class="team-info-wrap">
                         
                           <div class="team-info">
                               <h3><a href="{{url('/innovations')}}"> 
                                   <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_broiler.png')}}" alt="Broilers" > Broilers 
                               </a></h3>
                               <span>x Innovations</span>
                           </div>
                           <div class="social-link">
                               <span><i class="ri-arrow-down-s-line"></i></span>
                              
                           </div>
                       </div>
                   </div>


                   <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                    <div class="team-info-wrap">
                     
                       <div class="team-info">
                           <h3><a href="{{url('/innovations')}}"> 
                               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_camel.png')}}" alt="Innovations" > Camel Milk 
                           </a></h3>
                           <span>x Innovations</span>
                       </div>
                       <div class="social-link">
                           <span><i class="ri-arrow-down-s-line"></i></span>
                          
                       </div>
                   </div>
               </div>

               <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                <div class="team-info-wrap">
                 
                   <div class="team-info">
                       <h3><a href="{{url('/innovations')}}"> 
                           <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_cashewnut.png')}}" alt="Cashew Nuts" > Cashew Nuts 
                       </a></h3>
                       <span>x Innovations</span>
                   </div>
                   <div class="social-link">
                       <span><i class="ri-arrow-down-s-line"></i></span>
                      
                   </div>
               </div>
           </div>


           <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
            <div class="team-info-wrap">
             
               <div class="team-info">
                   <h3><a href="{{url('/innovations')}}"> 
                       <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_cassava.png')}}" alt="Cassava" > Cassava 
                   </a></h3>
                   <span>x Innovations</span>
               </div>
               <div class="social-link">
                   <span><i class="ri-arrow-down-s-line"></i></span>
                  
               </div>
           </div>
       </div>

      

   <div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_cow_milk.png')}}" alt="Cow Milk " > Cow Milk 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>


<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_fish.png')}}" alt="Fish" > Fish 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_french_beans.png')}}" alt="French Beans" > French Beans 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_green_grams.png')}}" alt="Green Grams " > Green Grams 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_groundnut.png')}}" alt=" Ground Nuts " > Ground Nuts 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_honey.png')}}" alt="Honey" > Honey 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_indigenous_chicken.png')}}" alt="Indigenous chicken" >  Indigenous chicken 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_irish_potatoes.png')}}" alt="Irish Potatoes " > Irish Potatoes 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_kales.png')}}" alt="Kales" > Kales 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_maize.png')}}" alt="Maize" > Maize 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_mango.png')}}" alt="Mangoes" > Mangoes 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_meat_goat.png')}}" alt="Meat Goat " > Meat Goat 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_passion.png')}}" alt="Passion Fruits" > Passion Fruits
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_pyrethrum.png')}}" alt="Pyrethrum" > Pyrethrum 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_rice.png')}}" alt="Rice" > Rice 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_sheep.png')}}" alt="Sheep" > Sheep 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_sorghum.png')}}" alt="Sorghum" > Sorghum 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_sweet_potato.png')}}" alt="Sweet Potatoes" > Sweet Potatoes 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_tomato.png')}}" alt="Innovations" > Tomatoes 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_vegetables.png')}}" alt="Vegetables" > Vegetables 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vc_watermelon.png')}}" alt="Water Melon" > Water Melon 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>

<div class="team-card style2" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
    <div class="team-info-wrap">
     
       <div class="team-info">
           <h3><a href="{{url('/innovations')}}"> 
               <img src="{{asset('/siteassets/assets/img/innovations/pvc/vs_cotton.png')}}" alt="Cotton" > Cotton 
           </a></h3>
           <span>x Innovations</span>
       </div>
       <div class="social-link">
           <span><i class="ri-arrow-down-s-line"></i></span>
          
       </div>
   </div>
</div>



           
                    </div>
                </div>
            </section>
            <!-- Team Section End -->
            <!-- Team Section End -->


 <!-- Project Section Start -->
            <section class="project-wrap ptb-100">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <span>Latest Updates<img src="{{asset('/siteassets/assets/img/section-shape.png')}}" alt="Image" /></span>
                        <h2>Featured</h2>
                    </div>
                    <div class="project-slider-one owl-carousel">
                        <div class="project-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="project-img">
                                <img src="{{asset('/siteassets/assets/img/latest/homabay.png')}}" alt="Image">
                            </div>
                            <div class="project-info">
                                <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                <h3><a href="project-details.html">Community Sensitization at Homa-Bay County</a></h3>
                                <p>Success Story</p>
                                <a href="project-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="project-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                            <div class="project-img">
                                <img src="{{asset('/siteassets/assets/img/latest/kirinyaga.png')}}" alt="Image">
                            </div>
                            <div class="project-info">
                                <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                <h3><a href="project-details.html">Improving Food Security in Kirinyaga County</a></h3>
                                <p>Success Story</p>
                                <a href="project-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                     

                        <div class="project-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="500">
                            <div class="project-img">
                                <img src="{{asset('/siteassets/assets/img/latest/compedium.png')}}" alt="Image">
                            </div>
                            <div class="project-info">
                                <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                <h3><a href="project-details.html">County Innovations And Best Practices</a></h3>
                                <p>Publications</p>
                                <a href="project-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>

                        <div class="project-card style1" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="500">
                            <div class="project-img">
                                <img src="{{asset('/siteassets/assets/img/latest/solardam.png')}}" alt="Image">
                            </div>
                            <div class="project-info">
                                <img src="{{asset('/siteassets/assets/img/shape-1.png')}}" alt="Image" class="project-shape">
                                <h3><a href="project-details.html">Solar Energy Water Project at Kaimosi Vihiga</a></h3>
                                <p>Success Story</p>
                                <a href="project-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
            <!-- Project Section End -->



@stop