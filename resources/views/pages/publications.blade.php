@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')

    @include('pages.inc.banner')
    @include('pages.success-inc')


    <section class="bg-white light:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            
            <div class="grid md:grid-cols-2 gap-8">

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
                        {{-- <img class="rounded-t-lg" src="{{ $item->inno_cover_image }}" alt=""
                                                id="innovation-img" /> --}}
                        <h2 class="text-gray-900 light:text-white text-3xl font-extrabold mb-2">{{ $item->publication_title }}</h2>
                        <p class="text-lg font-normal text-gray-500 light:text-gray-400 mb-4">{!! strip_tags($item->publication_desciption) !!}</p>
                        @if ($item->resourse_path)
                        <a href="{{ $item->resourse_path }}" target="_blank"
                            class="text-green-600 light:text-green-500 hover:underline font-medium text-lg inline-flex items-center">Read
                            more
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    @endif
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    @include('pages.inc.footer')
@endsection
