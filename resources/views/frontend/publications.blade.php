@extends('frontend.main')
@section('content')

<div class="content-wrapper">
                <!-- Breadcrumb Start -->
              <div class="breadcrumb-wrap" style="background-color: darkgreen;">
                <div class="container">
                    <div class="breadcrumb-title">
                        <h2>Publications</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="{{url('/')}}">Home </a></li>
                            <li><a href="{{url()->current()}}">Success Stories</a></li>
                         
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb End -->

           

                <!-- Blog Details Section Start -->
                <div class="blog-details-wrap ptb-100">
                    
                    <br>
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-4 col-lg-12 order-xl-1 order-lg-2 order-md-2 order-2">
                                <div class="sidebar">
                                    <div class="sidebar-widget">
                                        <h4>Search</h4>
                                        <div class="search-box">
                                            <div class="form-group">
                                                <input type="search" placeholder="Search">
                                                <button type="submit"> 
                                                    <i class="flaticon-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sidebar-widget categories">
                                        <h4>Nodes</h4>
                                        <ul class="category-box list-style">
                                            <li>
                                                <a href="#">
                                                    <i class="ri-checkbox-line"></i>
                                                    Trade
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ri-checkbox-line"></i>
                                                    Transport
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ri-checkbox-line"></i>
                                                    Category 2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ri-checkbox-line"></i>
                                                    Category 2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ri-checkbox-line"></i>
                                                    Category 2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ri-checkbox-line"></i>
                                                    Category 2
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-widget tags">
                                        <h4>Popular Tags </h4>
                                        <ul class="tag-list list-style">
                                            <li><a href="posts-by-tag.html">Input Suppliers</a></li>
                                            <li><a href="posts-by-tag.html">Transporters</a></li>
                                            <li><a href="posts-by-tag.html">Marketing</a></li>
                                            <li><a href="posts-by-tag.html">Traders</a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="sidebar-widget style2">
                                        <div class="contact-widget bg-f">
                                            <h3>Get in Touch</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio illo tenetur sed quidem. Suscipit, doloribus?</p>
                                            <a href="contact.html" class="btn style1">Contact Us</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-12 order-xl-2 order-lg-1 order-md-1 order-1">
                                <div class="row justify-content-center">
                                    <!-- Event  section Start -->
                <section >
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-xl-12">
                                <form action="#" class="event-search-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="event_type">Value Chain</label>
                                                <select name="event_type" id="event_type">
                                                    <option value="1">Tomatoes</option>
                                                    <option value="2">Maize</option>
                                                    <option value="2">Camel Milk</option>
                                                    <option value="2">Dairy Cattle</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="event_type">Node</label>
                                                <select name="event_type" id="event_type">
                                                    <option value="1">Input Suppliers</option>
                                                    <option value="2">Producers</option>
                                                    <option value="2">Processors</option>
                                                    <option value="2">Transporters</option>
                                                    <option value="2">Traders</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="event_type">County</label>
                                                <select name="event_type" id="event_type">
                                                    <option value="1">Mombasa</option>
                                                    <option value="2">Kwale</option>
                                                    <option value="2">Kilifi</option>
                                                    <option value="2">Lamu</option>
                                                    <option value="2">Taita-Taveta</option>
                                                    <option value="2">Nairobi</option>
                                                    <option value="2">Uasin-Gishu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn style1 w-100 d-block">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Tomatoes</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="#">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="#"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Processing</a></li>
                                                </ul>
                                                <a href="#" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="#">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-card style5">
                                            <div class="event-img">
                                                <img src="{{asset('/siteassets/assets/img/project/project-1.jpg')}}" alt="Image">
                                                <span class="event-date">Value Chain</span>
                                            </div>
                                            <div class="event-info">
                                                <h3><a href="event-details.html">Innovation Title</a></h3>
                                                <p>Short Description long text maximum character size </p>
                                                <ul class="event-metainfo list-style">
                                                    <li><a href="event.html"><i class="ri-map-pin-line"></i>County location</a></li>
                                                    <li><a href="event.html"><i class="ri-time-line"></i>Node</a></li>
                                                </ul>
                                                <a href="event-details.html" class="link style1">Read More <i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                  














                                </div>
                                <ul class="page-nav list-style">
                                    <li><a href="event.html"><i class="flaticon-left-arrow"></i></a></li>
                                    <li><a class="active" href="event.html">1</a></li>
                                    <li><a href="event.html">2</a></li>
                                    <li><a href="event.html">3</a></li>
                                    <li><a href="event.html"><i class="flaticon-right-arrow"></i></a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </section>
                <!-- Event  section End -->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Details Section End -->

            </div>



@stop