@extends('pages.layout.app')
@section('content')
<div id="wrapper">

    @include('pages.inc.header')


    <div class="container1">
        <div class="column1">
  
          <!-- Add more blog posts here -->
          <section class="bg-white dark:bg-gray-900" style="background: #f0f0f0;">
            <div class="py-8 px-4 mx-auto max-w-full lg:py-16 lg:px-12">
              <div class="text-center">
                <a href="#"
                  class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                  role="alert">
                  <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                    class="text-sm font-medium">Publications! See what's new</span>
                  <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"></path>
                  </svg>
                </a>
                <h1
                  class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                  Featured News</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Lorem,
                  ipsum dolor sit amet consectetur adipisicing elit. Dolores est placeat delectus deleniti dicta iste
                  ratione ullam eius, minima ad corrupti explicabo odit.</p>
              </div>
              <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
  
  
                  <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg"
                        src="http://197.156.140.250:1080/sites/default/files/styles/height/public/2023-06/solar%20%281%29.jpg?itok=HWAobr5t"
                        alt="" />
                    </a>
                    <div class="p-5" id="hover-green">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Blog Title</h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. Ea obcaecati voluptates facilis maiores dolore ullam, cupiditate nesciunt.
                        Minima amet suscipit consequuntur sit harum, ut fugiat nulla rerum, vero magnam aspernatur.</p>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Read more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                      </a>
                    </div>
                  </div>
  
                </div>
                <div>
  
  
                  <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg"
                        src="http://197.156.140.250:1080/sites/default/files/styles/height/public/2023-06/nyeri%20%281%29.jpg?itok=p2cRWfo3"
                        alt="" />
                    </a>
                    <div class="p-5" id="hover-green">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Blog Title</h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. Ea obcaecati voluptates facilis maiores dolore ullam, cupiditate nesciunt.
                        Minima amet suscipit consequuntur sit harum, ut fugiat nulla rerum, vero magnam aspernatur.</p>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Read more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div>
  
  
                  <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg"
                        src="http://197.156.140.250:1080/sites/default/files/styles/height/public/2023-06/homabay.png?itok=Ktdh2Y2H"
                        alt="" />
                    </a>
                    <div class="p-5" id="hover-green">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Blog Title</h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. Ea obcaecati voluptates facilis maiores dolore ullam, cupiditate nesciunt.
                        Minima amet suscipit consequuntur sit harum, ut fugiat nulla rerum, vero magnam aspernatur.</p>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Read more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
                <div>
  
  
                  <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg"
                        src="http://197.156.140.250:1080/sites/default/files/styles/height/public/2023-06/homabay.png?itok=Ktdh2Y2H"
                        alt="" />
                    </a>
                    <div class="p-5" id="hover-green">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Blog Title</h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur,
                        adipisicing elit. Ea obcaecati voluptates facilis maiores dolore ullam, cupiditate nesciunt.
                        Minima amet suscipit consequuntur sit harum, ut fugiat nulla rerum, vero magnam aspernatur.</p>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Read more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 14 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="column2">
          <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 light:text-white">
              LATEST NEWS
            </h2>
            <p class="text-gray-500 sm:text-xl light:text-gray-400">Lorem ipsum dolor sit amet
              consectetur, adipisicing elit. Obcaecati, consequatur culpa dolor rerum necessitatibus
              dolorem, odit, quas temporibus amet nam similique minima accusantium itaque quo dolores.
              Asperiores quaerat rem nisi!</p>
          </div>
          <hr>
          <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
              src="/docs/images/blog/image-4.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                acquisitions 2021</h5>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
          </a>
  
  
          <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
              src="/docs/images/blog/image-4.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                acquisitions 2021</h5>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
          </a>
  
  
          <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
              src="/docs/images/blog/image-4.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                acquisitions 2021</h5>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
          </a>
  
  
        </div>
      </div>

</div>

@include('pages.inc.footer')
@endsection