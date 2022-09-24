<form wire:submit.prevent="addToCart" class="grid lg:items-start gap-y-10 content-between" x-data>

    @if (!empty($product->variations))
        <div class="">

            <span class="font-bold">Choisissez les caractérestique</span>

            <ul class="flex flex-wrap gap-3 mt-5">
                @foreach ($product->variations as $variation)
                    <li class="flex">

                        <input type="radio" x-model="$wire.variation_id" value="{{ $variation->id }}"
                            id="{{ $variation->id }}" class="peer hidden">
                        <label for="{{ $variation->id }}"
                            class="rounded-md p-4 border-2 bg-gray-100 peer-checked:border-red-500 peer-checked:text-red-500 peer-checked:font-semibold hover:cursor-pointer">{{ $variation->name }}</label>

                    </li>
                @endforeach
            </ul>

        </div>


        <div
            class="relative grid grid-cols-1 lg:grid-cols-2 p-4 gap-5 items-center rounded-md bg-gray-100 w-full lg:w-3/4">

            <img wire:loading src="{{ asset('loading.svg') }}" alt="loading..." class="absolute right-0 top-0 w-16 object-contain">


            <div class="lg:col-span-2 flex justify-center">

                <strong class="text-2xl font-bold" x-text="$wire.price"></strong><span
                    class="align-top font-bold">DA</span>


            </div>

            @if ($isInCart)
                <span class="underline text-center">

                    Déja ajouté au panier

                </span>
            @else
                <button value="addToCart" name="action" wire:loading.class="flex items-center justify-center bg-gray-500 text-white text-xl py-1 px-10 rounded-md"
                    class="flex items-center justify-center  bg-red-500 text-white hover:bg-red-600 hover:scale-105 hover:-translate-y-2 transition-all duration-200 text-xl py-1 px-10 rounded-md">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Ajouter <br> au panier
                </button>
            @endif

            <button value="order" name="action" wire:loading.class="flex items-center justify-center bg-gray-500 text-white text-xl py-1 px-10 rounded-md"
                class="bg-red-500 text-white hover:bg-red-600 hover:scale-105 hover:-translate-y-2 transition-all duration-200 text-xl py-1 px-10 rounded-md">
                Acheter <br> Maintenant
            </button>

        </div>

    @endif

</form>
