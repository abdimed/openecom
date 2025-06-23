<div class="w-full border-b">

    <nav class="flex justify-between items-center py-2 px-5 max-w-screen-xl m-auto text-lg" x-data="{ mobileMenu: false, categoryMenu: false }">


        <span class="text-sm text-gray-400 font-semibold uppercase">Welcome </span>

        <ul class="hidden lg:flex gap-x-10 text-gray-600 text-sm">
            <li class="p-2 hover:underline underline-offset-4">
                <a href="/">Accueil</a>
            </li>

            <li class="relative p-2">

                <span class="flex items-center cursor-pointer hover:underline underline-offset-4 peer">
                    Categorie
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>

                <div
                    class="absolute bg-white text-black text-base py-5 px-2 shadow-2xl z-40 ml-5 left-0 w-52 hover:grid peer-hover:grid grid-cols-1 gap-2 hidden">
                    @foreach ($categories as $category)
                        <a href="{{ route('category.products', $category) }}" class="block hover:underline">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </li>

        </ul>


    </nav>

</div>
