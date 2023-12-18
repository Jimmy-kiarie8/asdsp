@extends('pages.layout.app')
@section('content')
    <div id="wrapper">

        @include('pages.inc.header')



        <div class="flex container1" id="innovation-list">
            <!-- Sidebar -->


            <!-- Main Content -->
            <div class="column1 p-4">
                <!-- Individual blog posts -->


                <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased" id="innovations">
                    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                        <article
                            class="mx-auto w-full max-w-full format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                            <header class="mb-4 lg:mb-6 not-format">
                                <address class="flex items-center mb-6 not-italic">
                                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                        </svg>
                                        <div style="margin-left:5px;">
                                            <a href="#" rel="author"
                                                class="text-xl font-bold text-gray-900 dark:text-white">{{ $innovation->inno_contactname }}</a>
                                            <p class="text-base text-gray-500 dark:text-gray-400">Editor</p>
                                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-08"
                                                    title="November 8th, 2022">{{ $innovation->created_at->diffForHumans() }}</time>
                                            </p>
                                        </div>
                                    </div>
                                </address>
                                <h1
                                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                                    {{ $innovation->inno_name }}</h1>
                            </header>




                            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                    data-tabs-toggle="#default-tab-content" role="tablist">
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                            data-tabs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">Background</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="objective-tab" data-tabs-target="#objective" type="button" role="tab"
                                            aria-controls="objective" aria-selected="false">Objective</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                            aria-controls="dashboard" aria-selected="false">Description</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                            aria-controls="settings" aria-selected="false">Lesson Challenges</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                                            aria-controls="contacts" aria-selected="false">Meta Data</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="practical-tab" data-tabs-target="#practical" type="button" role="tab"
                                            aria-controls="practical" aria-selected="false">Practical utility of
                                            Innovation</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="output-tab" data-tabs-target="#output" type="button" role="tab"
                                            aria-controls="output" aria-selected="false">Results and Impacts</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                            id="maps-tab" data-tabs-target="#maps" type="button" role="tab"
                                            aria-controls="maps" aria-selected="false">Maps</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="default-tab-content">
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile"
                                    role="tabpanel" aria-labelledby="profile-tab">
                                    {!! $innovation->inno_background !!}
                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard"
                                    role="tabpanel" aria-labelledby="dashboard-tab">
                                    {!! $innovation->inno_description !!}
                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="objective"
                                    role="tabpanel" aria-labelledby="objective-tab">
                                    {!! $innovation->inno_objective !!}
                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings"
                                    role="tabpanel" aria-labelledby="settings-tab">
                                    {!! $innovation->inno_lesson_challenges !!}
                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts"
                                    role="tabpanel" aria-labelledby="contacts-tab">

                                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Meta Data</h2>
                                    <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Contact person: <b> {{ $innovation->inno_contactname }}</b>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Location: <b> {{ $innovation->inno_location }}</b>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Ward: <b> {{ $innovation->inno_ward }}</b>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Type: <b> {!! $innovation->innovation_type !!}</b>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Source: <b> {!! $innovation->inno_sources !!}</b>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Cost: <b> {{ $innovation->inno_cost }}</b>
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            Status: <b> {{ $innovation->innovation_status }}</b>
                                        </li>
                                    </ul>

                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="practical"
                                    role="tabpanel" aria-labelledby="practical-tab">
                                    {!! $innovation->innovation_output !!}

                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="output"
                                    role="tabpanel" aria-labelledby="output-tab">
                                    {!! $innovation->innovation_status !!}

                                </div>

                                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="maps"
                                    role="tabpanel" aria-labelledby="maps-tab">
                                    <div id="map" style="height: 400px;"></div>

                                </div>
                            </div>



                        </article>
                        </section>
                        </article>
                    </div>
                </main>




                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                            <a href="#"
                                class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 14">
                                    <path
                                        d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                                </svg>
                                Tutorial
                            </a>
                            <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Related Stories</h1>
                            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Static websites are now
                                used to bootstrap lots of websites and are becoming the basis for a variety of tools that
                                even influence both web designers and developers.</p>
                           
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">

                        <div
                        class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                        <a href="#"
                            class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                            </svg>
                            ASDSP
                        </a>
                        <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Success Stories</h2>
                        <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">“Better opportunities and tools to enable poor
                            people to improve their living conditions” The programme aims at transforming crop, livestock and fishery
                            production into commercially oriented enterprises that ensure sustainable food and nutrition security by
                            developing value chains that are environmentally resilient and socially inclusive.
                        
                            The stories briefly describe the groups
                            and in some cases the individuals, the challenges they faced, the key programme interventions and the
                            resulting changes that the beneficiaries groups experienced that improved their livelihoods.</p>
                        <a href="/media/docs/NEWSLETTER_12.pdf" target="_blank"
                            class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                            more
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>

                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                                
                                {{-- <img class="rounded-t-lg"
                                    src="https://scontent.fmba5-1.fna.fbcdn.net/v/t39.30808-6/411417745_664223892559927_8480095982472557992_n.jpg?stp=dst-jpg_p180x540&_nc_cat=103&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeELaMNOL3NA1AawY9NN08EmK43E1l_MfbErjcTWX8x9sYEhMynl2q7c2O9FfCcpuzYBhuDatJDGSTayxwHS_7Dz&_nc_ohc=rGaZs3Xko2wAX_4G0gZ&_nc_ht=scontent.fmba5-1.fna&oh=00_AfDk0AXjZBR4eG86fhPnuuWy4ytOvgWjd2GYcyYtlv96rg&oe=6585B48E"
                                    alt="" id="innovation-img" /> --}}
                                <a href="#"
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 18">
                                        <path
                                            d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                                    </svg>
                                    ASDSP
                                </a>
                                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Kenya News Agency - KNA</h2>
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">The government has announced plans to compensate farmers who have lost crops and livestock due to the ongoing floods in the country. Agriculture Principal Secretary Dr. Paul Rono stated that most farmers in arid and semi-arid areas (ASLs) lost over 70% of their livelihoods to the rains. The Ministry is working with the private sector to secure funds for the compensation exercise and implement necessary mitigation measures. The PS is also encouraging farmers in affected areas to consider growing tuber crops that thrive during heavy rains to reduce losses.</p>
                                <a href="https://www.facebook.com/story.php?story_fbid=pfbid023uZk2Cd95bqFWbTuybERoSY56uxSKrB76AJVPRWV3S3KXpj8AYdAiNxLB4wAYyHQl&id=100069169660599&sfnsn=mo&mibextid=6aamW6&refsrc=deprecated&paipv=0&eav=Afan9ABJ0ahI9wt1_Wv1Qq3tNsveEA44l6QvJtaSnJlebbPndKeJfQor6MUob6OaYLU&_rdr" target="_blank"
                                    class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                                    more
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>

                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                                <a href="#"
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                                    </svg>
                                    ASDSP
                                </a>
                                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Towards Commercial Transformation of Agriculture in Narok County-Final</h2>
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Agriculture is a major economic activity in Narok County, accounting for about 67% of the county’s Gross Domestic
                                    Product (GDP). The majority of the county’s 1.3 million people depend on agriculture for livelihood, with nearly half
                                    (46%) of the working population directly engaged in agricultural activities, mainly crops, livestock and fisheries
                                    production. Thus, increased productivity of the sector would go a long way to boost the county’s economy and
                                    improve the livelihood of the people.</p>
                                <a href="/media/docs/Towards Commercial Transformation of Agriculture in Narok County-Final (1).pdf" target="_blank"
                                    class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                                    more
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>


                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                                <a href="#"
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                                    </svg>
                                    ASDSP
                                </a>
                                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">ASDSP Programme - A game
                                    changer for Nyeri farmers</h2>
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Nyeri County is predominantly an agricultural County with the potential to produce enough food for subsistence and commercial pur- poses. The County is well endowed with fertile and deep soils, mainly loam and sandy loam soils, which support growing crops, pastures, and trees. The County’s area is 3,337.1 km2, of which 987.5 Km2 and 758.5 Km2 are arable and non-arable land areas, respective- ly. The more significant part of the land is used for food crops, while the rest is used for cash crop farm- ing, livestock rearing, and farm for-</p>
                                <a href="/media/docs/Issue 128 - Nyeri County Weekly Newsletter (1) (1).pdf" target="_blank"
                                    class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                                    more
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>


                            <div
                                class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                                <a href="#"
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                                    </svg>
                                    ASDSP
                                </a>
                                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Kenya School of Agriculture, Songa Mbele and Nyeri Cumpus</h2>
                                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">ASDSP II Tree planting Event graced by the Principal Secretary, State Department for Agriculture Dr. Paul K. Ronoh PHD.</p>
                                <a href="/media/docs/ASDSP II TREE PLANTING POSTER 2.pdf" target="_blank"
                                    class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read
                                    more
                                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>


                </div>
                    </div>
                </section>


                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                    <div>


                        {{-- <div
                            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg"
                                    src="https://scontent.fmba5-1.fna.fbcdn.net/v/t39.30808-6/411417745_664223892559927_8480095982472557992_n.jpg?stp=dst-jpg_p180x540&_nc_cat=103&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeELaMNOL3NA1AawY9NN08EmK43E1l_MfbErjcTWX8x9sYEhMynl2q7c2O9FfCcpuzYBhuDatJDGSTayxwHS_7Dz&_nc_ohc=rGaZs3Xko2wAX_4G0gZ&_nc_ht=scontent.fmba5-1.fna&oh=00_AfDk0AXjZBR4eG86fhPnuuWy4ytOvgWjd2GYcyYtlv96rg&oe=6585B48E"
                                    alt="" id="innovation-img" />
                            </a>
                            <div class="p-5" id="hover-green">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Kenya News Agency - KNA </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks">
                                    The government has announced plans to compensate farmers who have lost crops and
                                    livestock due to the ongoing floods in the country. Agriculture Principal Secretary Dr.
                                    Paul Rono stated that most farmers in arid and semi-arid areas (ASLs) lost over 70% of
                                    their livelihoods to the rains. The Ministry is working with the private sector to
                                    secure funds for the compensation exercise and implement necessary mitigation measures.
                                    The PS is also encouraging farmers in affected areas to consider growing tuber crops
                                    that thrive during heavy rains to reduce losses. The government's subsidised fertiliser
                                    programme has increased maize production from 25 million bags last year to almost 61
                                    million bags this year. If the distribution is streamlined and distributed on time, the
                                    country could produce more than 72 million bags of maize by 2027, enough for export.
                                </p>
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

                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg"
                                    src="https://scontent.fmba5-1.fna.fbcdn.net/v/t39.30808-6/411417745_664223892559927_8480095982472557992_n.jpg?stp=dst-jpg_p180x540&_nc_cat=103&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeELaMNOL3NA1AawY9NN08EmK43E1l_MfbErjcTWX8x9sYEhMynl2q7c2O9FfCcpuzYBhuDatJDGSTayxwHS_7Dz&_nc_ohc=rGaZs3Xko2wAX_4G0gZ&_nc_ht=scontent.fmba5-1.fna&oh=00_AfDk0AXjZBR4eG86fhPnuuWy4ytOvgWjd2GYcyYtlv96rg&oe=6585B48E"
                                    alt="" id="innovation-img" />
                            </a>
                            <div class="p-5" id="hover-green">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Kenya News Agency - KNA </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks">
                                    The government has announced plans to compensate farmers who have lost crops and
                                    livestock due to the ongoing floods in the country. Agriculture Principal Secretary Dr.
                                    Paul Rono stated that most farmers in arid and semi-arid areas (ASLs) lost over 70% of
                                    their livelihoods to the rains. The Ministry is working with the private sector to
                                    secure funds for the compensation exercise and implement necessary mitigation measures.
                                    The PS is also encouraging farmers in affected areas to consider growing tuber crops
                                    that thrive during heavy rains to reduce losses. The government's subsidised fertiliser
                                    programme has increased maize production from 25 million bags last year to almost 61
                                    million bags this year. If the distribution is streamlined and distributed on time, the
                                    country could produce more than 72 million bags of maize by 2027, enough for export.
                                </p>
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
                        </div> --}}

                    </div>

                    {{-- @foreach ($innovations as $item)
                        <div>


                            <div
                                class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="{{ $item->inno_cover_image }}" alt=""
                                        id="innovation-img" />
                                </a>
                                <div class="p-5" id="hover-green">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $item->inno_name }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks">
                                        {!! $item->inno_description !!}</p>
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
                    @endforeach --}}

                </div>

            </div>
            {{-- <div class="column2">

                <div class="search-section">
                    <div class="container-fluid container-xl">
                        <div class="row main-content ml-md-0">
                            <div class="sidebar col-md-3 px-0">

                                <div class="sidebar__inner ">
                                    <div class="filter-body">
                                        <div>
                                            <h2 class="border-bottom filter-title">Categories</h2>
                                            <div class="mb-30 filter-options">
                                                <form action="{{ route('innovation-list') }}" method="get"
                                                    style="width: 100%;">
                                                    @foreach ($categories as $category)
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" name="categories[]"
                                                                value="{{ $category->id }}" class="custom-control-input"
                                                                id="category_{{ $category->id }}">
                                                            <label class="custom-control-label"
                                                                for="category_{{ $category->id }}">{{ $category->category_name }}</label>
                                                        </div>
                                                    @endforeach

                                                    <button type="submit"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Filter</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

        </div>


    </div>
    <script>
        function initMap() {
            var center = {
                lat: {{ $innovation->inno_longitude }},
                lng: {{ $innovation->inno_latitude }}
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: center,
                mapTypeId: google.maps.MapTypeId.HYBRID // Set the default map type to
            });
            var marker = new google.maps.Marker({
                position: center,
                map: map,
                title: '{{ $innovation->inno_name }}'
            });
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>

    @include('pages.inc.footer')
@endsection
