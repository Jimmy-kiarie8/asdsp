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
                        <div>

                            <div
                                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Fingerlings</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit,
                                    amet consectetur adipisicing elit. Iste blanditiis aliquid, possimus inventore
                                    voluptas ea. Obcaecati fugiat quas blanditiis recusandae sequi voluptates
                                    provident laudantium? Maiores cupiditate officia quod vero blanditiis.</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                    See our guideline
                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                        <div>
                            <div
                                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Fingerlings</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit,
                                    amet consectetur adipisicing elit. Iste blanditiis aliquid, possimus inventore
                                    voluptas ea. Obcaecati fugiat quas blanditiis recusandae sequi voluptates
                                    provident laudantium? Maiores cupiditate officia quod vero blanditiis.</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                    See our guideline
                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div
                                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Fingerlings</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit,
                                    amet consectetur adipisicing elit. Iste blanditiis aliquid, possimus inventore
                                    voluptas ea. Obcaecati fugiat quas blanditiis recusandae sequi voluptates
                                    provident laudantium? Maiores cupiditate officia quod vero blanditiis.</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                    See our guideline
                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div
                                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Fingerlings</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit,
                                    amet consectetur adipisicing elit. Iste blanditiis aliquid, possimus inventore
                                    voluptas ea. Obcaecati fugiat quas blanditiis recusandae sequi voluptates
                                    provident laudantium? Maiores cupiditate officia quod vero blanditiis.</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                    See our guideline
                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div
                                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Fingerlings</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit,
                                    amet consectetur adipisicing elit. Iste blanditiis aliquid, possimus inventore
                                    voluptas ea. Obcaecati fugiat quas blanditiis recusandae sequi voluptates
                                    provident laudantium? Maiores cupiditate officia quod vero blanditiis.</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                    See our guideline
                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div
                                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Fingerlings</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit,
                                    amet consectetur adipisicing elit. Iste blanditiis aliquid, possimus inventore
                                    voluptas ea. Obcaecati fugiat quas blanditiis recusandae sequi voluptates
                                    provident laudantium? Maiores cupiditate officia quod vero blanditiis.</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                    See our guideline
                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-7 lg:flex">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15956.155858185879!2d36.81425975!3d-1.1324943!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1699462315844!5m2!1sen!2ske"
                style="height: 100%;width: 100%;" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
</div>

@include('pages.inc.footer')
@endsection