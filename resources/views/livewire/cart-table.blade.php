<div>
    @if ($cartItems->count() > 0)

        <h2 class="lg:col-span-2 text-3xl font-bold my-10 flex items-center gap-x-3">Panier <svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </h2>
        <ul class="grid grid-cols-1 bg-gray-100 gap-y-5 lg:p-6 rounded-2xl">

            @foreach ($cartItems as $item)
                <li class="grid grid-cols-3 lg:grid-cols-6 bg-white rounded-md shadow-md p-2">

                    <img src="{{ asset('storage/' . $item->options['img']) }}" alt="product img"
                        class="w-32 h-32 object-contain">

                    <span class="text-xl font-semibold my-auto col-span-2 p-2 justify-self-start">
                        {{ $item->name }}-{{ $item->options['variation'] }} </span>
                    <div class="grid grid-cols-3 col-span-3">

                        <div class="flex flex-col justify-center items-center">
                            <span class="text-sm text-gray-400">Prix unitaire</span>
                            <span class="text-2xl"> {{ number_format($item->price, 2, ',', '.') }} <span
                                    class="text-sm align-top">DA</span>
                            </span>
                        </div>

                        <div class="flex flex-col justify-center items-center">
                            <span class="text-sm text-gray-400">Qty</span>
                            <div class="relative bg-gray-100 rounded-md flex items-center gap-x-5 px-2">

                                <button wire:click="minusQty( '{{ $item->rowId }}' )"
                                    class="font-semibold text-3xl">-</button>

                                <span class="text-2xl font-semibold">{{ $item->qty }}</span>

                                <button wire:click="addQty( '{{ $item->rowId }}' )"
                                    class="font-semibold text-3xl">+</button>

                                <div wire:loading
                                    class="absolute inset-0 w-full h-full bg-white/60 rounded-md cursor-wait">

                                </div>

                            </div>

                        </div>

                        <button wire:click="removeFromCart( '{{ $item->rowId }}' )" class="text-red-500 m-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                        </button>
                    </div>

                </li>
            @endforeach

            <div class="flex flex-col mt-16 text-gray-600">

                <span class="text-xl font-semibold">Total:</span>

                <span class="text-3xl font-semibold"> {{ $totalPrice }} <span
                        class="text-3xl align-top">Da</span></span>

            </div>

        </ul>

        @livewire('order-form')

    @elseif (session()->has('orderPosted'))
        <div class="flex flex-col justify-center items-center my-10">

            <span class="text-center text-2xl font-bold">
                {{ session('orderPosted') }}
            </span>
            <img src="{{ asset('build/assets/checkmark.png') }}" alt="checkmark" class="w-48">

        </div>

    @endif
</div>
