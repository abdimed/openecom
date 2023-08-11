<div class="relative w-full m-auto" x-data>

    <input type="text" x-model.debounce.500ms="$wire.search"
        class="w-full border-none bg-gray-200 rounded-full pl-10 pr-2 py-2 placeholder:text-sm focus:outline-dashed focus:border-primary focus:ring-4 focus:ring-primary/30"
        placeholder="Trouver votre produit">

    <div class="absolute right-2 inset-y-0 rounded-full bg-primary text-white p-1 h-fit m-auto">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>

    </div>

    <div wire:loading class="absolute w-full h-full bg-white/50 inset-0 cursor-wait z-50">

        <img src="{{ asset('assets/loading.svg') }}" alt="loading..." class="w-10">

    </div>

    <ul class="absolute mt-2 bg-white rounded-xl w-full shadow-xl z-50 max-h-[400px] overflow-y-scroll" x-show="$wire.search != '' " x-cloak>
        @if (!$products->isEmpty())
            @foreach ($products as $product)
                <li class="hover:bg-gray-200 py-2 border-b rounded-xl">
                    <a href="{{ route('product.details', [$product->category->slug, $product->slug]) }}"
                        class="grid grid-cols-4 items-center">

                        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                            class="p-2">

                        <span class="col-span-3 px-2 text-black font-semibold text-lg"> {{ $product->name }} </span>
                    </a>
                </li>
            @endforeach
        @else
            <span class="block px-4 py-2 h-20 text-sm">Aucun produit trouvé ...</span>
        @endif
    </ul>

</div>
