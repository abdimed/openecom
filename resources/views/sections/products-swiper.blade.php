<x-section id="products">

    @foreach ($collections as $collection)
        <div class="relative" x-data>

            <x-title>{{ $collection->name }}</x-title>

            <div class="flex justify-between w-full flex-nowrap space-x-5">

                <div class="my-auto" @click="$refs.carossel.scrollBy({left:-200, behavior: 'smooth'})">
                    <x-scroll-left-btn />
                </div>

                <div class="flex grow gap-10 overflow-x-scroll snap-x py-5" x-ref="carossel">

                    @foreach ($collection->products as $product)
                        @if ($product->visible)
                            <x-product-card :$product />
                        @endif
                    @endforeach

                </div>

                <div class="my-auto" @click="$refs.carossel.scrollBy({left:200, behavior: 'smooth'})">
                    <x-scroll-right-btn />
                </div>

            </div>

        </div>
    @endforeach

</x-section>
