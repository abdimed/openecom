<div class="flex flex-wrap justify-between items-center py-4 px-5 max-w-screen-xl m-auto text-lg"
    x-data="{ mobileMenu: false, categoryMenu: false }">
    <div class="text-primary lg:hidden block justify-self-end">
        <button x-on:click="mobileMenu = !mobileMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <a href="/" class="block order-1">
        <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-24 h-fit">
    </a>

    <div class="order-last lg:order-2 w-full lg:w-2/4 mt-5 lg:mt-0">

        @livewire('product-search')

    </div>

    <div class="flex lg:space-x-5 items-center text-primary order-3">

        <a href="tel:+213560236871" class="lg:flex items-center space-x-2 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="36" height="36"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="#7f5345" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
            </svg>

            <div class="flex flex-col">
                <span class="text-gray-400 text-xs">Appellez nous sur :</span>
                <span class="font-bold text-base">
                    0560 236 871
                </span>
            </div>
        </a>

        @livewire('cart-counter')

    </div>
    <div class="fixed top-0 left-0  w-4/5 h-screen bg-white shadow-xl text-black z-50" x-show="mobileMenu" x-cloak
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
        x-on:click.outside="mobileMenu = false">
        <img src="{{ asset('assets/logo.png') }}" alt="logo" class="p-5">
        <ul class="space-y-5 mt-10 ml-5 font-bold">
            <li class="text-xl uppercase">
                <a href="/"> accueil </a>
            </li>
            <li class="text-xl uppercase">
                <button class="hover:underline decoration-white uppercase"
                    x-on:click="categoryMenu = !categoryMenu">categories</button>
                <div class="ml-2" x-show="categoryMenu">
                    @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category) }}"
                        class="text-base font-semibold uppercase block py-2">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </li>
        </ul>
        <button class="absolute top-2 right-2" x-on:click="mobileMenu = false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>

        </button>
    </div>

</div>
