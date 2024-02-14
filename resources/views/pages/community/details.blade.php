@extends('pages.layout.app2')
@section('content')
    @include('pages.inc.header')


    {{-- @include('pages.inc.banner') --}}

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
                            <div>
                                <a href="#" rel="author"
                                    class="text-xl font-bold text-gray-900 light:text-white">{{ $community->name }}</a>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl light:text-white">
                        {{ $community->title }}</h1>
                </header>
                <p class="lead">{{ $community->message }}</p>

                <section class="not-format">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 light:text-white">Leave A comment</h2>
                    </div>
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
                    <form style="width: 100%;" method="POST" action="{{ route('comment-post', request('id')) }}">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 light:text-white"
                                >Name</label>
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

                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 light:bg-gray-800 light:border-gray-700">
                            <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Comment</label>                            <textarea id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 light:text-white light:placeholder-gray-400 light:bg-gray-800"
                                placeholder="Write a comment..." name="comment" required></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 light:focus:ring-green-900">
                            Post comment
                        </button>
                    </form>

                    @foreach ($community->comments as $comment)
                        <article class="p-6 mb-6 text-base bg-white rounded-lg light:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2"
                                style="background: #f1f1f1 !important;padding: 13px;">
                                <div class="flex items-center">
                                    <p
                                        class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 light:text-white">
                                        {{ $comment->name }}</p>
                                    <p class="text-sm text-gray-600 light:text-gray-400"><time pubdate datetime="2022-02-08"
                                            title="February 8th, 2022">{{ $comment->created_at }}</time></p>
                                </div>

                            </footer>
                            <p>{{ $comment->comment }}.</p>
                            {{-- <div class="flex items-center mt-4 space-x-4">
                                <button type="button"
                                    class="flex items-center font-medium text-sm text-gray-500 hover:underline light:text-gray-400">
                                    <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                                    </svg>
                                    Reply
                                </button>
                            </div> --}}
                        </article>
                    @endforeach
                </section>
            </article>
        </div>
    </main>


    @include('pages.inc.footer')
@endsection
