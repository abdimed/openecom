<x-section id="products">
    <div class="relative" x-data>

        <x-title>Produits</x-title>

        <div class="flex gap-10 overflow-x-scroll snap-x py-5" x-ref="carossel">

            @foreach ($products as $product)
                @if ($product->visible)
                    <a href="{{ route('product.view', [$product->category->slug, $product->slug]) }}"
                        class="shrink-0 flex m-auto flex-col justify-between snap-start border rounded-xl w-[270px] h-[360px] hover:shadow-lg hover:-translate-y-2 transition-all duration-300 overflow-hidden">

                        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="img"
                            class="w-full h-[249px] object-contain object-center overflow-hidden">

                        <div class="mx-4 my-2">
                            <span class="font-light text-sm">{{ $product->category->name }}</span>
                            <p class="truncate font-semibold">{{ $product->name }}</p>
                        </div>

                        <div class="flex justify-between mx-4 my-4">
                            <span class="text-2xl">{{ number_format($product->variations[0]->price, 2, ',', ' ') }}<span
                                    class="align-top text-base">Da</span></span>
                            <x-button-buy>Acheter</x-button-buy>
                        </div>

                    </a>
                @endif
            @endforeach


        </div>

        <div class="absolute left-0 inset-y-0 m-auto h-fit p-1 bg-primary rounded-full hover:cursor-pointer hidden lg:block"
            @click="$refs.carossel.scrollBy({left:-200, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="48"
                height="48" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="15 6 9 12 15 18" />
            </svg>
        </div>


        <div class="absolute right-0 inset-y-0 m-auto h-fit p-1 bg-primary rounded-full hover:cursor-pointer hidden lg:block"
            @click="$refs.carossel.scrollBy({left:200, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="48"
                height="48" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="9 6 15 12 9 18" />
            </svg>
        </div>

        <div>
            <img src="{{asset('storage/'. $medias[1]->path)}}" alt="">
        </div>

    </div>

</x-section>
