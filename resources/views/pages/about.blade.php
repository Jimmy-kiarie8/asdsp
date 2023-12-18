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
            style="height: 800px;" id="overlay">
        </div>
    </section>




    <section class="bg-white light:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div
                class="bg-gray-50 light:bg-gray-800 border border-gray-200 light:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <a href="#"
                    class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md light:bg-gray-700 light:text-blue-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    TIMPs
                </a>
                <h1 class="text-gray-900 light:text-white text-3xl md:text-5xl font-extrabold mb-2">Our Partnerships</h1>
                <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-6">We proudly collaborate with the
                    Ministry of Agriculture, Livestock, Fisheries, and Cooperatives, and county governments. Our initiatives
                    are supported by the Kenyan government, Sida, and the European Union, reflecting a strong commitment to
                    agricultural development.</p>
                <a href="{{ route('contact-us') }}"
                    class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 light:focus:ring-green-900">
                    Contact Us
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div
                    class="bg-gray-50 light:bg-gray-800 border border-gray-200 light:border-gray-700 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md light:bg-gray-700 light:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        ASDSP
                    </a>
                    <h2 class="text-gray-900 light:text-white text-3xl font-extrabold mb-2">Our Impact</h2>
                    <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-4">ASDSP is dedicated to uplifting
                        smallholder farmers, strengthening agri-businesses, and fostering a community-centric approach for a
                        greener future.</p>
                    <a href="#"
                        class="text-blue-600 light:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                        more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div
                    class="bg-gray-50 light:bg-gray-800 border border-gray-200 light:border-gray-700 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md light:bg-gray-700 light:text-green-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                        </svg>
                        ASDSP
                    </a>
                    <h2 class="text-gray-900 light:text-white text-3xl font-extrabold mb-2">Our Mission</h2>
                    <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-4">To transform Kenya's agricultural
                        landscape by fostering food and nutrition security and promoting innovative agricultural practices.
                    </p>
                    <a href="#"
                        class="text-blue-600 light:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                        more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div
                    class="bg-gray-50 light:bg-gray-800 border border-gray-200 light:border-gray-700 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md light:bg-gray-700 light:text-purple-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                        </svg>
                        ASDSP
                    </a>
                    <h2 class="text-gray-900 light:text-white text-3xl font-extrabold mb-2">Community Engagement</h2>
                    <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-4">Central to our mission is the
                        empowerment of local communities through knowledge sharing, training programs, and support networks.
                    </p>
                    <a href="#"
                        class="text-blue-600 light:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                        more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div
                    class="bg-gray-50 light:bg-gray-800 border border-gray-200 light:border-gray-700 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md light:bg-gray-700 light:text-purple-400 mb-2">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                        </svg>
                        ASDSP
                    </a>
                    <h2 class="text-gray-900 light:text-white text-3xl font-extrabold mb-2">Innovation in Agriculture</h2>
                    <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-4">We embrace technological
                        advancements and innovative approaches to solve traditional farming challenges.</p>
                    <a href="#"
                        class="text-blue-600 light:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                        more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>


    @include('pages.inc.footer')
@endsection
