@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')

    @include('pages.inc.banner')

    <!--
    Install the "flowbite-typography" NPM package to apply styles and format the article content:

    URL: https://flowbite.com/docs/components/typography/
    -->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white light:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue light:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 light:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 light:text-white">Jese
                                    Leos</a>
                                <p class="text-base text-gray-500 light:text-gray-400">Graphic Designer, educator & CEO
                                    Flowbite</p>
                                <p class="text-base text-gray-500 light:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl light:text-white">
                        Best practices for successful prototypes</h1>
                </header>
                <p class="lead">Flowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickers.</p>
                <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
                    you can think things through before committing to an actual design project.</p>
                <p>But then I found a <a href="https://flowbite.com">component library based on Tailwind CSS called
                        Flowbite</a>. It comes with the most commonly used UI components, such as buttons, navigation
                    bars, cards, form elements, and more which are conveniently built with the utility classes from
                    Tailwind CSS.</p>
                <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png"
                        alt="">
                    <figcaption>Digital art by Anonymous</figcaption>
                </figure>
                <h2>Getting started with Flowbite</h2>
                <p>First of all you need to understand how Flowbite works. This library is not another framework.
                    Rather, it is a set of components based on Tailwind CSS that you can just copy-paste from the
                    documentation.</p>
                
            </article>
        </div>
    </main>

    <section class="bg-white light:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl light:text-white">Sign up
                    for our newsletter</h2>
                <p class="mx-auto mb-8 max-w-2xl  text-gray-500 md:mb-12 sm:text-xl light:text-gray-400">Stay up to date
                    with the roadmap progress, announcements and exclusive discounts feel free to sign up with your email.
                </p>
                <form action="#">
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="email"
                                class="hidden mb-2 text-sm font-medium text-gray-900 light:text-gray-300">Email
                                address</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 light:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                            </div>
                            <input
                                class="block p-3 pl-9 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-primary-500 light:focus:border-primary-500"
                                placeholder="Enter your email" type="email" id="email" required="">
                        </div>
                        <div>
                            <button type="submit"
                                class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 light:bg-primary-600 light:hover:bg-primary-700 light:focus:ring-primary-800">Subscribe</button>
                        </div>
                    </div>
                    <div
                        class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer light:text-gray-300">
                        We care about the protection of your data. <a href="#"
                            class="font-medium text-primary-600 light:text-primary-500 hover:underline">Read our Privacy
                            Policy</a>.</div>
                </form>
            </div>
        </div>
    </section>
    @include('pages.inc.footer')
@endsection
