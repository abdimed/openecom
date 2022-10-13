<a href="{{ route('product.view', [$product->category->slug, $product->slug]) }}"
    class="shrink-0 flex flex-col justify-between snap-start border rounded-xl w-[270px] h-[360px] hover:shadow-lg hover:-translate-y-2 transition-all duration-300 overflow-hidden">

    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="img"
        class="w-full h-[249px] object-contain object-center overflow-hidden">

    <div class="mx-4 my-2">
        <span class="font-light text-sm">{{ $product->category->name }}</span>
        <p class="truncate font-semibold">{{ $product->name }}</p>
    </div>

    <div class="flex justify-between mx-4 my-4">
        <span class="text-2xl">{{ number_format($product->variations[0]->price, 2, ',', ' ') }}<span
                class="align-top text-base">Da</span></span>

        <button class="rounded-md bg-primary text-white uppercase p-2 text-sm">
            Achetter
        </button>

    </div>

</a>
