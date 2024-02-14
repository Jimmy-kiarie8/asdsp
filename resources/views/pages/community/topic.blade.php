@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')

    {{-- @include('pages.inc.banner') --}}

    <br>
    <br>

    <section class="mb-32">


        <section class="bg-gray-50 light:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
                <div class="flex flex-col justify-center">
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl light:text-white">
                        Agriculture Sector Development Support Programme (ASDSP) </h1>
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl light:text-gray-400">We welcome you to visit
                        our office for any in-person inquiries. Please schedule an appointment through our customer support.
                    </p>

                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl light:text-gray-400">
                        We have dedicated support for farmers, Fill in the form and we will contact you.
                    </p>
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl light:text-gray-400">
                        For inquiries, support, and feedback, please email us at <a
                            href="mailto:info.asdsp@kilimo.go.ke">info.asdsp@kilimo.go.ke</a> or call us at <a
                            href="tel:+254724256157">+254724256157</a>.
                    </p>
                    
                    <a href="{{ route('community') }}"
                        class="text-green-600 light:text-green-500 hover:underline font-medium text-lg inline-flex items-center">Posts
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div>
                    <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl light:bg-gray-800">
                        <h2 class="text-2xl font-bold text-gray-900 light:text-white">
                            Agriculture Sector Development Support Programme (ASDSP)
                        </h2>

                        @if (session('success'))
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        <form class="mt-8 space-y-6" style="width: 100%" action="{{ route('community-post') }}"
                            method="POST">
                            @csrf
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Name</label>
                                <input type="text" name="name" id="name" placeholder="John ..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    required value="{{ isset($session['name']) ? $session['name'] : '' }}">
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    placeholder="name@company.com" required value="{{ isset($session['email']) ? $session['email'] : '' }}">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Topic</label>
                                <input type="text" name="title" id="title" placeholder="..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    required>
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Message</label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    placeholder="" name="message"></textarea>

                            </div>

                            <button type="submit"
                                class="w-full px-5 py-3 text-base font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 sm:w-auto light:bg-green-600 light:hover:bg-green-700 light:focus:ring-green-800">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>





    @include('pages.inc.footer')
@endsection
