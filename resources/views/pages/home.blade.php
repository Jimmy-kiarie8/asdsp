@extends('pages.layout.app')
@section('content')
    <div id="wrapper">

        @include('pages.inc.header')


        <div style="">
            <section class="showcase">
                <div class="video-container">
                    <video src="https://mag.co.ke/apps/public/media/background.mp4" autoplay muted loop></video>
                </div>
                {{-- <div class="content">
                    <div class="max-w-screen-xl px-4 mx-auto lg:px-12 w-full">
                        <!-- Start coding here -->
                        <div class="relative bg-white shadow-md light:bg-gray-800 sm:rounded-lg" id="form1">
                            <div
                                class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                                <div class="w-full md:w-1/2">
                                    <form class="flex items-center">
                                        <label for="simple-search" class="sr-only">Search</label>
                                        <div class="relative w-full" id="header-input">
                                            <input type="text" id="simple-search"
                                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-primary-500 light:focus:border-primary-500"
                                                placeholder="Search" required="">
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                                    <div class="flex items-center w-full space-x-3 md:w-auto">
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected="">Categories</option>
                                            <option value="US">Bananas</option>
                                            <option value="CA">Cutton</option>
                                        </select>
                                        <select id="countries"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected="">Locations</option>
                                            <option value="US">Baringo</option>
                                            <option value="CA">Embu</option>
                                        </select>
                                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 light:focus:ring-gray-700 light:bg-gray-800 light:text-gray-400 light:border-gray-600 light:hover:text-white light:hover:bg-gray-700"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                class="w-4 h-4 mr-2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </section>
        </div>




        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">

            <form class="w-full max-w-md mx-auto" style="background: transparent" id="search-form" method="GET"
                action="{{ route('innovation-list') }}">
                <label for="default-email"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search...</label>
                <div class="relative">

                    <input type="text" id="default-email"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Search..." required name="search">
                    <button type="submit" style="margin-left: 22%;margin-bottom: -1px;"
                        class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                </div>
            </form>
        </div>
        <div class="main">
            <section class="bg-white light:bg-gray-900" style="border-radius: 70px 70px 0 0;">
                <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-6 lg:px-6">
                    <div id="header-line"></div>

                    <div id="container">

                        <div id="column1">
                            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 light:text-white">ASDPS
                                TIMPs Portal</h2>
                        </div>
                        <div id="column2">
                            <p>The ASDSP Innovation portal is an online knowledge repository that provides a single access
                                point for discovery, acquisition and sharing of information about innovations, technologies,
                                and best practices.
                                The repository offers an opportunity to promote participatory innovation development by the
                                value chain actors by encouraging ‘VCA-led experimentation’ and the integration of farming
                                communities into innovation systems.
                                The idea is to foster knowledge sharing among value chain actors and other innovation
                                actors, encouraging value chain actors to compare and share their experiences and to
                                experiment more critically.</p>
                        </div>
                    </div>



                    <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                        @foreach ($inovations as $item)
                            <div>


                                <div
                                    class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                    <a href="#">
                                        <img class="rounded-t-lg" src="{{ $item->inno_cover_image }}" alt=""
                                            id="innovation-img" />
                                    </a>
                                    <div class="p-5" id="hover-green">
                                        <div style="height: 200px;">
                                            <a href="#">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                                                    id="line-breaks">
                                                    {{ $item->inno_name }}</h5>
                                            </a>
                                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks">
                                                <p id="p-breaks">{{!! strip_tags($item->inno_description) !!}}</p>
                                            </div>
                                        </div>

                                        <a href="{{ route('innovationdetails', $item->id) }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Read more
                                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    <div style="height: 30px;"></div>
                    <div id="header-line"></div>

                    <a href="{{ route('innovation-list') }}" style="margin-left: 45%;"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Load more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </section>


            {{-- 
            <div id="animation-carousel" class="relative container" data-carousel="static">
                <h3 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 light:text-white text-center">
                    We invest in Kenyans potential</h3>
                <div style="height: 3px; background: #348a21; width: 121px; margin: auto; margin-bottom: 15px; margin-top: -10px;">
                </div>

                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96" id="counties">
                    <!-- Item 1 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                        <div class="grid grid-cols-6 grid-cols-2 md:grid-cols-6 sm:grid-cols-2">
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://www.shutterstock.com/shutterstock/photos/1811041534/display_1500/stock-vector-this-is-logo-of-county-in-republic-of-kenya-1811041534.jpg"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://seeklogo.com/images/N/nyeri-county-logo-CD6A94CBC7-seeklogo.com.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://keproba-bucket.s3.eu-central-1.amazonaws.com/counties/1646128161261639891.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://keproba-bucket.s3.eu-central-1.amazonaws.com/counties/16461338001430511872.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://upload.wikimedia.org/wikipedia/commons/0/06/Coat_of_Arms_of_Bomet_County.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://e7.pngegg.com/pngimages/545/465/png-clipart-taita-taveta-county-kilifi-county-nyeri-county-county-government-of-kwale-county-treasury-narok-county-court-of-arms-kenya-logo-brand.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                        <div class="grid grid-cols-6 grid-cols-2 md:grid-cols-6 sm:grid-cols-2">
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://www.shutterstock.com/shutterstock/photos/1811041534/display_1500/stock-vector-this-is-logo-of-county-in-republic-of-kenya-1811041534.jpg"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://seeklogo.com/images/N/nyeri-county-logo-CD6A94CBC7-seeklogo.com.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://keproba-bucket.s3.eu-central-1.amazonaws.com/counties/1646128161261639891.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://keproba-bucket.s3.eu-central-1.amazonaws.com/counties/16461338001430511872.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://upload.wikimedia.org/wikipedia/commons/0/06/Coat_of_Arms_of_Bomet_County.png"
                                    alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://e7.pngegg.com/pngimages/545/465/png-clipart-taita-taveta-county-kilifi-county-nyeri-county-county-government-of-kwale-county-treasury-narok-county-court-of-arms-kenya-logo-brand.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 light:bg-gray-800/30 group-hover:bg-white/50 light:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white light:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white light:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 light:bg-gray-800/30 group-hover:bg-white/50 light:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white light:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white light:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div> --}}



            <div class="grid grid-cols-2 md:grid-cols-3 gap-4" id="counties">
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.shutterstock.com/shutterstock/photos/1811041534/display_1500/stock-vector-this-is-logo-of-county-in-republic-of-kenya-1811041534.jpg"
                        alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://seeklogo.com/images/N/nyeri-county-logo-CD6A94CBC7-seeklogo.com.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://keproba-bucket.s3.eu-central-1.amazonaws.com/counties/1646128161261639891.png"
                        alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://keproba-bucket.s3.eu-central-1.amazonaws.com/counties/16461338001430511872.png"
                        alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://upload.wikimedia.org/wikipedia/commons/0/06/Coat_of_Arms_of_Bomet_County.png"
                        alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://e7.pngegg.com/pngimages/545/465/png-clipart-taita-taveta-county-kilifi-county-nyeri-county-county-government-of-kwale-county-treasury-narok-county-court-of-arms-kenya-logo-brand.png"
                        alt="">
                </div>
            </div>

            <div style="height: 30px"></div>











            <section class="bg-white light:bg-gray-900" id="section3">
                <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                    <div class="font-light text-gray-500 sm:text-lg light:text-gray-400">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">Welcome to
                            ASDPS TIMPs Portal</h2>
                        <p class="mb-4">Agriculture Sector Development Support Programme Phase Two (ASDSP II) is one of
                            the key programmes designed by the Ministry of Agriculture, Livestock, Fisheries and
                            Cooperatives and 47 county governments to contribute to addressing food and nutrition security
                            and promote manufacturing. It is primarily designed to enhance the capacity of different
                            Priority Value Chain Actors at different levels to tackle the problems that hinder
                            commercialization of Agriculture.</p>
                        <p>The programme is implemented by the Government of Kenya (National and 47 county governments) with
                            strong participation of the private sector as direct beneficiaries or service providers. It is
                            financed by the Government of Kenya, Sida and EU for a period of five years (2017-2022).</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <img class="w-full rounded-lg" src="{{ asset('/media/1.jpeg') }}" alt="office content 1"
                            style="    height: 310px;">
                        <img class="mt-4 w-full lg:mt-10 rounded-lg" src="{{ asset('/media/3.jpeg') }}"
                            alt="office content 2" style="    height: 310px;">
                    </div>
                </div>
            </section>


            <!-- Partners -->

            <section class="bg-white dark:bg-gray-900" id="partners">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                    <a href="#"
                        class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                        role="alert">
                        <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                            class="text-sm font-medium">ASDSP portal! See what's new</span>
                        <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <h4 style="    font-size: 38px;
            font-weight: bold;">
                        We invest in Kenyans potential</h4>
                    <br>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
                        style="color: #000">ASDSP II is operating under a devolved system of government. The Agriculture
                        sector recognized this and developed a consultation and cooperation mechanism to promote good
                        working relationship between the two levels.</p>
                    <div
                        class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">

                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                </path>
                            </svg>
                            Watch video
                        </a>
                    </div>









                    <span class="font-semibold text-gray-400 uppercase">OUR PARTNERS</span>
                    <div class="slideshow-container">
                        <!-- Slides -->
                        <div class="mySlides">
                            <div class="logo-container">
                                <img src="https://selfhelpafrica.org/ie/wp-content/uploads/sites/4/2023/08/Self-Help-Africa_Logo_small-web.png"
                                    alt="Logo 1" class="logo">
                                <img src="https://viagroforestry.org/app/themes/main/frontend/assets/svg/viagroforestry-logo-bg.svg"
                                    alt="Logo 2" class="logo">
                                <img src="https://wofaakenya.org/wp-content/uploads/2021/11/resized-150x146.png"
                                    alt="Logo 3" class="logo">
                            </div>
                        </div>

                        <div class="mySlides">
                            <div class="logo-container">
                                <img src="https://plantprotection.kilimo.go.ke/wp-content/uploads/2023/04/igad.jpg"
                                    alt="Logo 5" class="logo">
                                <img src="http://kaaa.co.ke/wp-content/uploads/2016/03/KAAA_logo_site.png" alt="Logo 6"
                                    class="logo">
                                <img src="https://assets.accessagriculture.org/s3fs-public/Access_Agr_RGB.png"
                                    alt="Logo 7" class="logo">
                            </div>
                        </div>

                        <!-- Navigation dots -->
                        <div style="text-align:center">
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>





                    <!--<div class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">-->
                    <!--  <span class="font-semibold text-gray-400 uppercase">OUR PARTNERS</span>-->
                    <!--  <div class="flex flex-wrap justify-center items-center mt-8 text-gray-500 sm:justify-between">-->
                    <!--    <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">-->
                    <!--      <img src="https://plantprotection.kilimo.go.ke/wp-content/uploads/2023/04/igad.jpg" alt="">-->
                    <!--    </a>-->
                    <!--    <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">-->
                    <!--      <img src="https://plantprotection.kilimo.go.ke/wp-content/uploads/2023/04/ifad-1.jpg" alt="">-->
                    <!--    </a>-->
                    <!--    <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">-->
                    <!--      <img src="https://plantprotection.kilimo.go.ke/wp-content/uploads/2023/04/DLCOEA.jpg" alt="">-->
                    <!--    </a>-->
                    <!--  </div>-->
                    <!--</div>-->
                </div>
            </section>



            <hr>
            <!-- Blog -->



            <section class="bg-white dark:bg-gray-900" style="background: #f0f0f0;">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
                    <div class="text-center">
                        <a href="#"
                            class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                            role="alert">
                            <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                                class="text-sm font-medium">Blogs! See what's new</span>
                            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <h4 style=" font-size: 38px;
            font-weight: bold;">
                            Success Stories</h4>
                        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400"
                            style="    text-align: center !important;">Get the
                            latest news, success stories and testimonial from around the country.

                        </p>
                    </div>
                    <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:space-y-0" style="    gap: 0.5rem">
                        @foreach ($successStories as $item)
                            <div>
                                <div
                                    class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg"
                                            src="http://197.156.140.250:1080/sites/default/files/styles/height/public/2023-06/solar%20%281%29.jpg?itok=HWAobr5t"
                                            alt="" />
                                    </a>
                                    <div class="p-5" id="hover-green">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $item->vco_name }}</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ $item->strory_description }}</p>
                                        <small>{{ $item->created_at->diffForHumans() }}</small>
                                        <a href="#"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Read more
                                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

        </div>
        <hr>
        @include('pages.inc.footer')
    </div>
@endsection
