<div>
    @if ($cartItems->count() > 0)
        <x-title>
            Panier
        </x-title>

        <ul class="grid grid-cols-1 bg-gray-100 gap-y-5 lg:p-6 rounded-2xl">

            @foreach ($cartItems as $item)
                <li class="relative grid grid-cols-3 lg:grid-cols-6 bg-white rounded-md shadow-md p-2">

                    <img src="{{ asset('storage/' . $item->options['img']) }}" alt="product img"
                        class="w-32 h-32 object-contain">

                    <span class="w-full text-xl truncate font-semibold my-auto col-span-2 p-2 justify-self-start ">
                        {{ $item->name }}-{{ $item->options['variation'] }} </span>


                    <div class="flex flex-col justify-center items-center">
                        <span class="text-sm text-gray-400">Prix unitaire</span>
                        <span class="text-xl lg:text-2xl"> {{ number_format($item->price, 2, ',', '.') }} <span
                                class="text-sm align-top">DA</span>
                        </span>
                    </div>

                    <div
                        class="flex flex-col justify-center items-center col-span-2 justify-self-end lg:justify-self-center">
                        <span class="text-sm text-gray-400">Qty</span>
                        <div class="relative bg-gray-100 rounded-md flex items-center gap-x-5 px-2"
                            wire:loading.class="opacity-50">

                            <button wire:click="minusQty( '{{ $item->rowId }}' )" wire:loading.attr="disabled"
                                class="font-semibold text-3xl">-</button>

                            <span class="text-2xl font-semibold">{{ $item->qty }}</span>

                            <button wire:click="addQty( '{{ $item->rowId }}' )" wire:loading.attr="disabled"
                                class="font-semibold text-3xl">+</button>

                        </div>

                    </div>

                    <button wire:click="removeFromCart( '{{ $item->rowId }}' )"
                        class="text-primary m-auto absolute top-3  right-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>

                    </button>


                </li>
            @endforeach

            <div class="flex flex-col mt-16 text-gray-600 p-4">

                <span class="text-xl font-semibold">Total:</span>

                <span class="text-3xl font-semibold"> {{ $totalPrice }}<span class="text-3xl align-top">Da</span>
                </span>

            </div>

        </ul>

        {{-- Order Form --}}
        @livewire('order-form')

    @elseif (session()->has('orderPosted'))
        <div class="flex flex-col justify-center items-center my-10">

            <span class="text-center text-2xl font-bold">
                {{ session('orderPosted') }}
            </span>
            <img src="{{ asset('assets/success.png') }}" alt="success" class="w-48">

            <a href="/" class="bg-primary text-white font-semibold px-4 py-2 rounded-full">Retour à la page
                d'accueil </a>

        </div>

    @else

    <div class="flex flex-col justify-center items-center my-10">

        <span class="text-center text-2xl font-bold">
           Le panier est vide.
        </span>
        <img src="{{ asset('assets/empty.png') }}" alt="success" class="w-48">

        <a href="/" class="bg-primary text-white font-semibold px-4 py-2 rounded-full">Retour à la page
            d'accueil </a>

    </div>

    @endif
</div>
