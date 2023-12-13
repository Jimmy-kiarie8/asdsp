@extends('pages.layout.app')
@section('content')

    <div id="wrapper">

        @include('pages.inc.header')


        <div class="main">
            <section class="bg-white light:bg-gray-900" style="border-radius: 70px 70px 0 0;">
                <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-6 lg:px-6">
                  
                    <div id="container">

                        <div id="column1">
                            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 light:text-white">ASDPS TIMPs Portal
</h2>
                        </div>
                        <div id="column2">
                            <p>The ASDSP Innovation portal is an online knowledge repository that provides a single access point for discovery, acquisition and sharing of information about innovations, technologies, and best practices. The repository offers an opportunity to promote participatory innovation development by the value chain actors by encouraging ‘VCA-led experimentation’ and the integration of farming communities into innovation systems. The idea is to foster knowledge sharing among value chain actors and other innovation actors, encouraging value chain actors to compare and share their experiences and to experiment more critically.

</p>
                        </div>
                    </div>

                    <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                      @foreach ($inovations as $item)
                          
                          <div>


                              <div
                                  class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                  <a href="#">
                                      <img class="rounded-t-lg"
                                          src="{{ $item->inno_cover_image }}"
                                          alt=""  id="innovation-img" />
                                  </a>
                                  <div class="p-5" id="hover-green">
                                      <a href="#">
                                          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"  id="line-breaks">
                                              {{$item->inno_name}}</h5>
                                      </a>
                                      <div class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="line-breaks"> {!!  $item->inno_description !!}</div>
                                      <a href="{{ route('innovationdetails', $item->id) }}"
                                          class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                          Read more
                                          <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                              fill="none" viewBox="0 0 14 10">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                          </svg>
                                      </a>
                                  </div>
                              </div>

                          </div>
                          @endforeach


<nav aria-label="Page navigation example" id="pagination">
    <ul class="inline-flex -space-x-px text-sm">
        {{-- Previous Page Link --}}
        @if ($inovations->onFirstPage())
            <li class="disabled">
                <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg opacity-50 cursor-not-allowed">Previous</span>
            </li>
        @else
            <li>
                <a href="{{ $inovations->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @for ($page = 1; $page <= $inovations->lastPage(); $page++)
            {{-- Display the first 3 pages --}}
            @if ($page <= 3 || $page >= $inovations->lastPage() - 2)
                <li>
                    <a href="{{ $inovations->url($page) }}" class="flex items-center justify-center px-3 h-8 leading-tight @if ($inovations->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                </li>
            @elseif ($page >= $inovations->currentPage() - 1 && $page <= $inovations->currentPage() + 1)
                {{-- Display a few pages before and after the current page --}}
                <li>
                    <a href="{{ $inovations->url($page) }}" class="flex items-center justify-center px-3 h-8 leading-tight @if ($inovations->currentPage() === $page) text-blue-600 bg-blue-50 @else text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif">{{ $page }}</a>
                </li>
            @elseif ($page == $inovations->currentPage() - 2 || $page == $inovations->currentPage() + 2)
                {{-- Display dots in the middle --}}
                <li><span class="flex items-center justify-center px-3 h-8 text-gray-500">...</span></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($inovations->hasMorePages())
            <li>
                <a href="{{ $inovations->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
            </li>
        @else
            <li class="disabled">
                <span class="flex items-center justify-center px-3 h-8 text-gray-500 bg-white border border-e-0 border-gray-300 rounded-e-lg opacity-50 cursor-not-allowed">Next</span>
            </li>
        @endif
    </ul>
</nav>



                    </div>
                </div>
            </section>




            <hr>
            <!-- Blog -->


        </div>
        <hr>
        @include('pages.inc.footer')
    </div>
@endsection
