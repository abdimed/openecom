<ul class="grid grid-cols-1 gap-y-5 bg-gray-100 p-2">

    @foreach ($cartItems as $item)
        <li class="grid grid-cols-3 bg-white rounded-md shadow-md p-2">
            <img src="{{ asset('storage/' . $item->options['img']) }}" alt="product img" class="w-32 h-32 object-contain">
            <span class="text-xl font-bold m-auto"> {{ $item->name }}-{{ $item->options['variation'] }} </span>
            <span class="text-lg m-auto"> {{ $item->price }} <span class="text-sm align-top">DA</span> </span>


                <span>{{ $item->qty }}</span>
                <button wire:click="addQty( '{{ $item->rowId }}' )" class="font-bold text-5xl">+</button>

            <img wire:loading src="{{ asset('loading.svg') }}" alt="loading..."
                class="absolute right-0 top-0 w-16 object-contain">

        </li>
    @endforeach
</ul>
