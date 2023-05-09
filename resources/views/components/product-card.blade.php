<a href="{{ route('product.details', [$product->category->slug, $product->slug]) }}"
    class="w-full flex flex-col justify-between snap-start border-2 rounded-xl lg:w-[270px] h-[360px] hover:shadow-lg hover:-translate-y-2 transition-all duration-300 overflow-hidden">

    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="img"
        class="w-full h-[249px] object-contain object-center overflow-hidden">

    <div class="mx-4 my-2">
        <span class="font-light text-sm">{{ $product->category->name }}</span>
        <p class="truncate font-semibold">{{ $product->name }}</p>
    </div>

    <span class="text-base mx-4">{{ number_format($product->variations[0]->price, 2, ',', ' ') }}<span
            class="align-top text-base"> Da</span></span>
    <div class="mx-4 my-4">

        <button class="rounded-md bg-primary text-white uppercase p-2 text-xs w-full">
            Achetter
        </button>

    </div>

</a>
