<x-section id="products">

    @foreach ($collections as $collection)
        <div class="">

            <x-title>{{ $collection->name }}</x-title>

            <div class="grid lg:grid-cols-4 grid-cols-2 gap-4 justify-items-center">

                @foreach ($collection->products->take(8) as $product)
                    @if ($product->visible && $product->variations != null)
                        <x-product-card :$product />
                    @endif
                @endforeach

            </div>

            <a href="{{ route('collection.products', $collection) }}" class="flex justify-center my-10">
                <button class="text-xl bg-gray-200 rounded-2xl py-2 px-6">
                    Afficher plus de produit
                </button>
            </a>

        </div>
    @endforeach

</x-section>
