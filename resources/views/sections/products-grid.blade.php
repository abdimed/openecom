<div x-data class="relative">

    <div class="flex gap-10 overflow-x-scroll snap-x py-5" x-ref="carossel">

        @foreach ($products as $product)
            @if ($product->visible)
                <a href="{{ route('product.view', [$product->category->slug, $product->slug]) }}"
                    class="shrink-0 flex m-auto flex-col justify-between snap-start border rounded-md w-[264px] h-[360px] hover:shadow-lg transition-all duration-300">

                    <img src="{{ asset('storage/' . $product->attachments[0]) }}" alt="img"
                        class="w-full h-[249px] object-cover object-center">

                    <div class="p-2">
                        <span>{{ $product->brand->name }}</span>
                        <span>{{ $product->name }}</span>
                    </div>

                    <div class="flex justify-between p-2">
                        <span></span>
                        <x-button-buy>Acheter</x-button-buy>
                    </div>

                </a>
            @endif
        @endforeach


    </div>

    <div class="absolute left-0 inset-y-0 m-auto h-fit p-1 bg-primary rounded-full hover:cursor-pointer"
        @click="$refs.carossel.scrollBy({left:-200, behavior: 'smooth'})">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="48"
            height="48" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <polyline points="15 6 9 12 15 18" />
        </svg>
    </div>


    <div class="absolute right-0 inset-y-0 m-auto h-fit p-1 bg-primary rounded-full hover:cursor-pointer"
        @click="$refs.carossel.scrollBy({left:200, behavior: 'smooth'})">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="48"
            height="48" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <polyline points="9 6 15 12 9 18" />
        </svg>
    </div>

</div>
