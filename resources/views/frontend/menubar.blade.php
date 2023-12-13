 <!-- Header Section Start -->
 <header class="header-wrap">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8">
                    <div class="header-top-left">
                        <ul class="contact-info list-style">
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <a href="tel:+254724256157">+254724256157</a>
                            </li>
                            <li>
                                <i class="flaticon-email-2"></i>
                                <a href="mailto:info@clim.com">
                                info.asdsp@kilimo.go.ke</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="header-top-right">
                        <div class="select-lang">
                            <i class="ri-earth-fill"></i>
                            <div class="navbar-option-item navbar-language dropdown language-option">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="lang-name"></span>
                            </button>
                            <div class="dropdown-menu language-dropdown-menu">
                                <a class="dropdown-item" href="#">

                                    My Account
                                </a>
                                <a class="dropdown-item" href="{{url('/login')}}">
                                    <img src="{{asset('/siteassets/assets/img/key.png')}}" alt="flag">
                                    Log in
                                </a>
                                <a class="dropdown-item" href="{{url('login')}}">
                                    <img src="{{asset('/siteassets/assets/img/registered.png')}}" alt="flag">
                                    Register
                                </a>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
         <a class="navbar-brand" href="{{url('/')}}">
            <img class="logo-light" src="{{asset('/siteassets/assets/img/logo.png')}}" alt="logo">
            <img class="logo-dark" src="{{asset('/siteassets/assets/img/logowhite.png')}}" alt="logo">
        </a>
        <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
            <div class="menu-close d-lg-none">
                <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
            </div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link active">
                        Home
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="{{url('aboutus')}}" class="nav-link">About Us</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{url('partners')}}" class="nav-link">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('faqs')}}" class="nav-link">FAQs</a>
                        </li>


                    </ul>
                </li>


               

                 <li class="nav-item">
                    <a href="{{url('/innovations')}}" class="nav-link">
                        Innovations

                    </a>

                </li>


                <li class="nav-item">
                    <a href="{{url('/successstories')}}" class="nav-link">
                        Success Stories

                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Dashboard
                        
                    </a>
                    
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Resources
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="{{url('publications')}}" class="nav-link">Publications</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">County Strategic Plans</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">KIAMIS</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Guidelines</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Video Library</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Image Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Related Portals</a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a href="{{url('contactus')}}" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="#" class="nav-link btn style1">&nbsp;</a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="search-area">
        <input type="search" placeholder="Search Here..">
        <button type="submit"><i class="ri-search-line"></i></button>
    </div>
    <div class="mobile-bar-wrap">
        <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>
        <div class="mobile-menu d-lg-none">
            <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
        </div>
    </div>
</div>
</div>
</header>  