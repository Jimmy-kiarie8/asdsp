@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')

    @include('pages.inc.banner')


    <section class="bg-white light:bg-gray-900">
        <div class="py-8 px-4 lg:py-16">
            <div
                class="bg-gray-50 light:bg-gray-800 border border-gray-200 light:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <a href="#"
                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md light:bg-gray-700 light:text-green-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    TIMPs Portal
                </a>
                <h1 class="text-gray-900 light:text-white text-3xl md:text-5xl font-extrabold mb-2">Success Stories</h1>
                <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-6">The programme is implemented by the Government of Kenya (National and 47 county governments) with strong participation of the private sector as direct beneficiaries or service providers. It is financed by the Government of Kenya, Sida and EU for a period of five years (2017-2022).</p>
    
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($publications as $item)
                    
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
                    <img class="rounded-t-lg" src="/uploads/{{ $item->story_cover_image }}" style="height: 350px" alt="" />

                    {{-- <div id="hover-green"></div> --}}
                    <h2 class="text-gray-900 light:text-white text-3xl font-extrabold mb-2">{{$item->vco_name}}</h2>

                    <div style="    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;">
                    <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-4">{{$item->strory_description}}</p>
                </div>
                    <a href="/media/docs/NEWSLETTER_12.pdf" target="_blank"
                        class="text-green-600 light:text-green-500 hover:underline font-medium text-lg inline-flex items-center">Read
                        more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" /> 
                        </svg>
                    </a>

                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 light:text-gray-500">Released on
                        {{ Carbon\Carbon::parse($item->created_at)->format('D M d Y') }}</time>
                </div>
                @endforeach 

            </div>
        
                <nav aria-label="Page navigation example" id="pagination">
                    <ul class="inline-flex -space-x-px text-sm">
                        {{-- Previous Page Link --}}
                        @if ($publications->onFirstPage())
                            <li class="disabled">
                                <span
                                    class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg opacity-50 cursor-not-allowed">Previous</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $publications->previousPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @for ($page = 1; $page <= $publications->lastPage(); $page++)
                            {{-- Display the first 3 pages --}}
                            @if ($page <= 3 || $page >= $publications->lastPage() - 2)
                                <li>
                                    <a href="{{ $publications->url($page) }}"
                                        class="flex items-center justify-center px-3 h-8 leading-tight @if ($publications->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                                </li>
                            @elseif ($page >= $publications->currentPage() - 1 && $page <= $publications->currentPage() + 1)
                                {{-- Display a few pages before and after the current page --}}
                                <li>
                                    <a href="{{ $publications->url($page) }}"
                                        class="flex items-center justify-center px-3 h-8 leading-tight @if ($publications->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                                </li>
                            @elseif ($page == $publications->currentPage() - 2 || $page == $publications->currentPage() + 2)
                                {{-- Display dots in the middle --}}
                                <li><span
                                        class="flex items-center justify-center px-3 h-8 text-gray-500">...</span>
                                </li>
                            @endif
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($publications->hasMorePages())
                            <li>
                                <a href="{{ $publications->nextPageUrl() }}"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        @else
                            <li class="disabled">
                                <span
                                    class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-e-lg opacity-50 cursor-not-allowed">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
    
        </div>
    </section>

    @include('pages.inc.social-share')
    @include('pages.inc.footer')
@endsection
