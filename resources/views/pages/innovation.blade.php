@extends('pages.layout.app2')
@section('content')
<div id="wrapper">
@include('pages.inc.header')

<section class="bg-white dark:bg-gray-900" style="background: #f5f5f5;">
    <div class="grid max-w-full px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-5">

            <section class="bg-white light:bg-gray-900" style="border-radius: 70px 70px 0 0;">
                <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                    <div class="max-w-screen-md mb-8 lg:mb-16">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 light:text-white">
                            Designed for business
                            teams like yours</h2>
                        <p class="text-gray-500 sm:text-xl light:text-gray-400">Lorem ipsum dolor sit amet
                            consectetur, adipisicing elit. Obcaecati, consequatur culpa dolor rerum necessitatibus
                            dolorem, odit, quas temporibus amet nam similique minima accusantium itaque quo dolores.
                            Asperiores quaerat rem nisi!</p>
                    </div>
                    <div class="space-y-8 md:grid md:grid-cols-6 lg:grid-cols-2 md:gap-12 md:space-y-0">
                        @foreach($locations as $location)
                        <div class="p-5" id="hover-green" style="border: 3px solid #33333314;border-radius: 20px 20px 20px 0px;">
                                      <div style="height: 200px;">
                                      <a href="#">
                                          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" id="line-breaks">
                                              {{ $location->inno_name }}</h5>
                                      </a>
                                      <div class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks">
                                          <p id="p-breaks">{!! $location->inno_description !!}}</p>
                                      </div>
                                      </div>
                                      
                                  </div>
                        @endforeach
                        
                    </div>
                </div>
            </section>

            <nav aria-label="Page navigation example" id="pagination">
                <ul class="inline-flex -space-x-px text-sm">
                    {{-- Previous Page Link --}}
                    @if ($locations->onFirstPage())
                        <li class="disabled">
                            <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg opacity-50 cursor-not-allowed">Previous</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $locations->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                        </li>
                    @endif
            
                    {{-- Pagination Elements --}}
                    @for ($page = 1; $page <= $locations->lastPage(); $page++)
                        {{-- Display the first 3 pages --}}
                        @if ($page <= 3 || $page >= $locations->lastPage() - 2)
                            <li>
                                <a href="{{ $locations->url($page) }}" class="flex items-center justify-center px-3 h-8 leading-tight @if ($locations->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                            </li>
                        @elseif ($page >= $locations->currentPage() - 1 && $page <= $locations->currentPage() + 1)
                            {{-- Display a few pages before and after the current page --}}
                            <li>
                                <a href="{{ $locations->url($page) }}" class="flex items-center justify-center px-3 h-8 leading-tight @if ($locations->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                            </li>
                        @elseif ($page == $locations->currentPage() - 2 || $page == $locations->currentPage() + 2)
                            {{-- Display dots in the middle --}}
                            <li><span class="flex items-center justify-center px-3 h-8 text-gray-500">...</span></li>
                        @endif
                    @endfor
            
                    {{-- Next Page Link --}}
                    @if ($locations->hasMorePages())
                        <li>
                            <a href="{{ $locations->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                        </li>
                    @else
                        <li class="disabled">
                            <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-e-lg opacity-50 cursor-not-allowed">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>

        </div>
            <!--<iframe-->
            <!--    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15956.155858185879!2d36.81425975!3d-1.1324943!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1699462315844!5m2!1sen!2ske"-->
            <!--    style="height: 100%;width: 100%;" style="border:0;" allowfullscreen="" loading="lazy"-->
            <!--    referrerpolicy="no-referrer-when-downgrade"></iframe>-->
            
            <div id="map1" style="height: 500px;overflow: initial !important;width: 57vw;height: 100vh"></div>
     
    </div>
</section>
</div>



<script>
    function initMap() {
        var mapOptions = {
            zoom: 8,
            center: { lat: 0.8041, lng: 36.5355 } // Default center of the map
        };

        var map = new google.maps.Map(document.getElementById('map1'), mapOptions);

        @json($locations).forEach(function (location) {
            new google.maps.Marker({
                position: { lat: parseFloat(location.inno_longitude), lng: parseFloat(location.inno_latitude) },
                map: map
            });
        });
    }
</script>


@include('pages.inc.footer')
@endsection