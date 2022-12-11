
<nav class="flex justify-between items-center py-2 px-5 max-w-screen-xl m-auto text-lg" x-data="{ mobileMenu: false, categoryMenu: false }">
    <div class="text-white lg:hidden block justify-self-end">
        <button x-on:click="mobileMenu = !mobileMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <a href="/">
        <img src="{{ asset('assets/logo-white.svg') }}" alt="logo" class="w-32 h-fit">
    </a>

    <ul class="hidden lg:flex gap-x-10 text-white  menu menu1">
        <li>
            <a href="/">Accueil</a>
        </li>
        <li x-on:click="categoryMenu = !categoryMenu">

            <span class="flex items-center cursor-pointer">
                Categorie
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>


            <div class="absolute bg-secondary text-white text-base py-5 px-2 rounded-lg shadow-xl z-40 ml-5 -bottom-16" x-show="categoryMenu" x-transition>
                @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category) }}" class="block hover:underline">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </li>

    </ul>


    <div class="fixed top-0 left-0  w-4/5 h-screen bg-white text-black z-50" x-show="mobileMenu" x-cloak
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
        x-on:click.outside="mobileMenu = false">
        <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-24">
        <ul class="space-y-5 mt-10 ml-5 font-bold">
            <li class="text-xl uppercase">
                <a href="/"> accueil </a>
            </li>
            <li class="text-xl  uppercase">
                <button class="hover:underline decoration-white uppercase"
                    x-on:click="categoryMenu = !categoryMenu">categories</button>
                <div class="ml-2" x-show="categoryMenu">
                    @foreach ($categories as $category)
                        <a href="{{ route('category.products', $category) }}"
                            class="text-base font-semibold uppercase block">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="text-xl uppercase">
                <a href="/#our-realisations"> réalisations </a>
            </li>
            <li class="text-xl uppercase">
                <a href="/contact-us"> contact </a>
            </li>
        </ul>
        <button class="absolute top-2 right-2" x-on:click="mobileMenu = false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>

        </button>
    </div>

    @livewire('cart-counter')

</nav>
