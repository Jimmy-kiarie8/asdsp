@extends('pages.layout.app2')
@section('content')
    <div id="wrapper">
        @include('pages.inc.header')
        {{-- @include('pages.inc.banner') --}}

        <section class="bg-white dark:bg-gray-900" style="background: #f5f5f5;">
            <div class="grid max-w-full px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-5">

                    <section class="bg-white light:bg-gray-900" style="border-radius: 0 70px 0 0;">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                            <div class="max-w-screen-md mb-8 lg:mb-16">
                                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">
                                    Improved access to markets</h2>
                                <p class="text-gray-500 sm:text-xl light:text-gray-400">We support value chain actors with
                                    “soft” market access interventions by identifying and accelerating breakthrough
                                    solutions, ideas and conversations through partners who facilite market linkages,
                                    linkages market information and financial services.</p>


                                <form class="w-full max-w-md mx-auto" style="background: transparent" id="search-form"
                                    method="GET" action="{{ route('innovations') }}">
                                    <label for="default-email"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only light:text-white">Search...</label>
                                    <div class="relative">

                                        <input type="text" id="default-email"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-green-500 focus:border-green-500 light:bg-gray-800 light:border-gray-700 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                        placeholder="Search..." required>
                                        <button type="submit" style="margin-left: 22%;margin-bottom: -1px;"
                                            class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 light:bg-green-600 light:hover:bg-green-700 light:focus:ring-green-800">Search</button>
                                    </div>
                                </form>
                            </div>

                            <div class="space-y-8 md:grid md:grid-cols-6 lg:grid-cols-2 md:gap-12 md:space-y-0">
                                @foreach ($locations as $location)
                                    <div class="p-5 hover-green" id="hover-green"
                                        style="border: 3px solid #33333314;border-radius: 20px 20px 20px 0px;">
                                        <div style="height: 200px;">
                                            <a href="#">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                                                    id="line-breaks">
                                                    {{ $location->inno_name }}</h5>
                                            </a>
                                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks">
                                                <p id="p-breaks">{!! strip_tags($location->inno_description) !!}</p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            <br>
                            <nav aria-label="Page navigation example" id="pagination">
                                <ul class="inline-flex -space-x-px text-sm">
                                    {{-- Previous Page Link --}}
                                    @if ($locations->onFirstPage())
                                        <li class="disabled">
                                            <span
                                                class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg opacity-50 cursor-not-allowed">Previous</span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $locations->previousPageUrl() }}"
                                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @for ($page = 1; $page <= $locations->lastPage(); $page++)
                                        {{-- Display the first 3 pages --}}
                                        @if ($page <= 3 || $page >= $locations->lastPage() - 2)
                                            <li>
                                                <a href="{{ $locations->url($page) }}"
                                                    class="flex items-center justify-center px-3 h-8 leading-tight @if ($locations->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                                            </li>
                                        @elseif ($page >= $locations->currentPage() - 1 && $page <= $locations->currentPage() + 1)
                                            {{-- Display a few pages before and after the current page --}}
                                            <li>
                                                <a href="{{ $locations->url($page) }}"
                                                    class="flex items-center justify-center px-3 h-8 leading-tight @if ($locations->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                                            </li>
                                        @elseif ($page == $locations->currentPage() - 2 || $page == $locations->currentPage() + 2)
                                            {{-- Display dots in the middle --}}
                                            <li><span
                                                    class="flex items-center justify-center px-3 h-8 text-gray-500">...</span>
                                            </li>
                                        @endif
                                    @endfor

                                    {{-- Next Page Link --}}
                                    @if ($locations->hasMorePages())
                                        <li>
                                            <a href="{{ $locations->nextPageUrl() }}"
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

                </div>


                <div id="map-container">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white"
                        style="width: 50vw;
                ">ASDSP Project Locator</h2>
                    <div
                        style="height: 3px;background: #348a21;width: 229px;margin-left: 35%;margin-bottom: 15px;margin-top: -10px;">
                    </div>
                    <div id="map" style="height: 500px;overflow: initial !important;width: 57vw;height: 100vh"></div>
                </div>
            </div>
        </section>
    </div>

    @include('pages.inc.footer')

    <script>
        function initMap() {
            var mapOptions = {
                zoom: 8,
                center: {
                    lat: 0.8041,
                    lng: 36.5355
                },
                mapTypeId: google.maps.MapTypeId.HYBRID
            };

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var locations = @json($locations);
            var markers = []; // Array to hold your markers

            locations.data.forEach(function(location, index) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(location.inno_latitude),
                        lng: parseFloat(location.inno_longitude)
                    },
                    map: map,
                    title: location.inno_name
                });

                markers.push(marker); // Store the marker

                // Add click event listener for each location element
                document.querySelectorAll('.hover-green')[index].addEventListener('click', function() {
                    // Zoom out then zoom in
                    smoothZoom(map, 5, map.getZoom(), function() {
                        smoothZoom(map, 13, map.getZoom(), marker);
                    });
                });
            });
        }

        // Smooth Zoom Function
        function smoothZoom(map, targetZoom, currentZoom, markerOrCallback) {
            if (currentZoom !== targetZoom) {
                google.maps.event.addListenerOnce(map, 'zoom_changed', function(event) {
                    smoothZoom(map, targetZoom, map.getZoom(), markerOrCallback);
                });
                setTimeout(function() {
                    map.setZoom(currentZoom + (targetZoom > currentZoom ? 1 : -1));
                }, 80);
            } else if (typeof markerOrCallback === 'function') {
                markerOrCallback();
            } else if (markerOrCallback) {
                map.setCenter(markerOrCallback.getPosition());
            }
        }
    </script>


    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>
    <style>
        #map-container {
            position: fixed !important;
            top: 100px !important;
            right: 10px !important;
            height: 87vh !important;
            z-index: 10 !important;
            overflow: hidden !important;
            border-radius: 0 20px 20px 20px;
            text-align: center;
        }

        #footer {
            position: relative !important;
            z-index: 10;
        }
    </style>
@endsection
