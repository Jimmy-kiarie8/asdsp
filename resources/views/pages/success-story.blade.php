@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')


    <section
        class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
            <a href="#"
                class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-green-700 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300 hover:bg-green-200 dark:hover:bg-green-800">
                <span class="text-xs bg-green-600 rounded-full text-white px-4 py-1.5 me-3">ASDSP</span> <span
                    class="text-sm font-medium">Be part of Kenya's agricultural revolution. Together, we grow.</span>
                <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
            <h1
                class="mb-4 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl lg:text-5xl dark:text-white">
                Welcome to the Agriculture Sector Development Support Programme (ASDSP)</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">At ASDSP, our
                goal is not just to change the face of Kenyan agriculture but to uplift the lives of millions of Kenyans
                through sustainable and profitable agricultural practices.</p>
            <form class="w-full max-w-md mx-auto" style="background: transparent">
                <label for="default-email" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Email
                    sign-up</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-x-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                    </div>
                    <input type="email" id="default-email"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Enter your email here..." required>
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Sign
                        up</button>
                </div>
            </form>
        </div>
        <div class="bg-gradient-to-b from-green-50 to-transparent dark:from-green-900 w-full h-full absolute top-0 left-0 z-0"
            style="height: 545px;" id="overlay">
        </div>
    </section>


    <div class="container1" id="publication">
        <div class="column1">

            <!-- Add more blog posts here -->
            <section class="bg-white light:bg-gray-900" style="background: #f0f0f0;">
                <div class="py-8 px-4 mx-auto max-w-full lg:py-16 lg:px-12">
                    <div class="text-center">
                        <a href="#"
                            class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full light:bg-gray-800 light:text-white hover:bg-gray-200 light:hover:bg-gray-700"
                            role="alert">
                            <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span>
                            <span class="text-sm font-medium">Publications! See what's new</span>
                            <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <h1
                            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl light:text-white">
                            Featured News</h1>
                        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 light:text-gray-400">
                            We transform Kenya's agricultural landscape by fostering food and nutrition security and
                            promoting innovative agricultural practices.</p>
                    </div>
                    <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                        @foreach ($publications as $item)
                            <div>


                                <div
                                    class="bg-white border border-gray-200 rounded-lg shadow light:bg-gray-800 light:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg" src="/uploads/{{ $item->story_cover_image }}"
                                            alt="" />
                                    </a>
                                    <div class="p-5" id="hover-green">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 light:text-white">
                                                {{ $item->vco_name }}</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 light:text-gray-400">
                                            {{ $item->strory_description }}</p>
                                        <a href="#"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 light:bg-green-600 light:hover:bg-green-700 light:focus:ring-green-800">
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
                </div>
            </section>
        </div>
        <div class="column2">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 light:text-white">
                    LATEST NEWS
                </h2>
                <p class="text-gray-500 sm:text-xl light:text-gray-400">The programme is implemented by the Government of Kenya (National and 47 county governments) with strong participation of the private sector as direct beneficiaries or service providers. It is financed by the Government of Kenya, Sida and EU for a period of five years (2017-2022).</p>
            </div>
            <hr>


            <ol class="relative border-s border-gray-200 light:border-gray-700">
                @foreach ($publications as $item)
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white light:ring-gray-900 light:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 light:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </span>
                    <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 light:text-white">{{$item->vco_name}}<span
                            class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded light:bg-blue-900 light:text-blue-300 ms-3">Latest</span>
                    </h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 light:text-gray-500">Released on
                        {{ Carbon\Carbon::parse($item->created_at)->format('D M d Y') }}</time>
                    <p class="mb-4 text-base font-normal text-gray-500 light:text-gray-400">{{$item->strory_description}}</p>
                </li>
                
                @endforeach
            </ol>




        </div>
    </div>


    @include('pages.inc.footer')
@endsection
