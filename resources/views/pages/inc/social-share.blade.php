<section class="bg-grey dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1
            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Share our Innovations on social media</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
            Contribute to the Transformation of crop, livestock and fisheries production into commercially oriented
            enterprises that ensure sustainable food and nutrition security in Kenya.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="https://www.facebook.com/sharer.php?u={{ request()->url() }}"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900"
                style="margin-left: 4px">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ request()->url() }}&text=@if ($innovation)
            {{ $innovation->inno_name }}"@else env('APP_NAME') @endif
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900"
                style="margin-left: 4px">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->url() }}" target="_blank"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900"
                style="margin-left: 4px">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="mailto:?subject=
            @if ($innovation)
            {{ $innovation->inno_name }}"
            @else env('APP_NAME') 
            @endif&body=
            @if ($innovation)
            {{ $innovation->inno_description }}@else env('APP_NAME')@endif"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900"
                style="margin-left: 4px">
                <i class="fa fa-envelope"></i>
            </a>
            <a href="https://wa.me/?text=Check%20out%20this%20awesome%20website%3A%20{{ request()->url() }}"
                target="_blank"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900"
                style="margin-left: 4px">
                <i class="fa fa-whatsapp"></i>
            </a>

        </div>
    </div>
</section>
