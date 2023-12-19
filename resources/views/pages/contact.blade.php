@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')

    @include('pages.inc.banner')

    <br>
    <br>

    <section class="mb-32">
        <div class="container px-6 md:px-12">
            <div
                class="block rounded-lg bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] light:bg-[hsla(0,0%,5%,0.7)] light:shadow-black/20 md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px]">
                <div style="text-align: center; margin-bottom: 30px">
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-black">
                        National Programme Secretariate</h1>
                    <p>The National Programme Secretariate (NPS) is responsible for management of the Programme taking
                        cognizance of the Ministry of Agriculture and Livestock Development (MoA&amp;LD) context but also
                        reaching out to other Sector stakeholders. NPS works in close liaison with JAS-TWGs/SWAGs; the
                        narrow Sector Departments, research, training and extension agencies; other Sector programmes and a
                        wide range of partners including NGOs; the private sector and cooperatives; CSOs, CBOs and FBOs.

                    </p>
                </div>
                <hr>
                <br>
                <br>
                <div class="flex flex-wrap">

                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                        <div class="flex flex-wrap">
                            <div
                                class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-4/12 md:px-3 lg:w-full lg:px-6 xl:w-6/12">
                                <div class="flex items-start">
                                    <div class="shrink-0">
                                        <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-6 grow">
                                        <p class="mb-2 font-bold light:text-white">
                                            Our Address
                                        </p>
                                        <p class="text-neutral-500 light:text-neutral-200">
                                            6th Floor, Hill Plaza Building Ngong Road ,
                                        </p>
                                        <p class="text-neutral-500 light:text-neutral-200">
                                            Nairobi, Kenya
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-4/12 md:px-3 lg:w-full lg:px-6 xl:w-6/12">
                                <div class="flex items-start">
                                    <div class="shrink-0">
                                        <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-6 grow">
                                        <p class="mb-2 font-bold light:text-white">
                                            Postal Address
                                        </p>
                                        <p class="text-neutral-500 light:text-neutral-200">
                                            P.O. Box 30028-00100 Kenya
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div
                                class="mb-12 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-4/12 md:px-3 lg:mb-12 lg:w-full lg:px-6 xl:w-6/12">
                                <div class="align-start flex">
                                    <div class="shrink-0">
                                        <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-6 grow">
                                        <p class="mb-2 font-bold light:text-white">Email</p>
                                        <p class="text-neutral-500 light:text-neutral-200">
                                            info.asdsp@kilimo.go.ke
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="w-full shrink-0 grow-0 basis-auto md:w-4/12 md:px-3 lg:w-full lg:px-6 xl:mb-12 xl:w-6/12">
                                <div class="align-start flex">
                                    <div class="shrink-0">
                                        <div class="inline-block rounded-md bg-primary-100 p-4 text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-6 grow">
                                        <p class="mb-2 font-bold light:text-white">Call</p>

                                        <p class="text-neutral-500 light:text-neutral-200">
                                            +254724256157
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                    <a href="https://asdsp.kilimo.go.ke/" target="_blank"
                        class="text-green-600 light:text-green-500 hover:underline font-medium text-lg inline-flex items-center">Visit
                        Our Website
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

                        <form class="mt-8 space-y-6" style="width: 100%" action="{{ route('contact-mail') }}"
                            method="POST">
                            @csrf
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Name</label>
                                <input type="text" name="name" id="name" placeholder="John ..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    required>
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    placeholder="name@company.com" required>
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Phone No.
                                </label>
                                <input type="text" name="phone" id="phone" placeholder="254 ..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    required>
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Message</label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500"
                                    placeholder="Leave a comment..." name="message"></textarea>

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
