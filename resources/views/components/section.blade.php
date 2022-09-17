<section id="{{ $id }}" class="container m-auto py-10">

    <div class="flex items-center">

        <h2 class="text-4xl font-bold">
            {{ $title }}
        </h2>

        <hr class="h-1 w-full ml-10 bg-gray-200">

    </div>

    <div class="mt-20">
        {{ $slot }}
    </div>

</section>
