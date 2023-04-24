<div class="bg-white">

    <x-section id="categories">

        @livewire('product-search')

        <div class="p-4 flex flex-col justify-center items-center content-center space-y-4 mt-10">

            <h2 class="text-2xl text-center font-semibold">Découvrez nous accessoires!</h2>

            <div class="grid grid-cols-3 md:grid-cols-4 gap-4 lg:w-fit m-auto w-full">

                @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category) }}"
                        class="grid grid-cols-1 rounded-3xl box-border border-2 p-4 w-full bg-gray-200 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl">
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}"
                            class="w-20 h-20 md:w-32 md:h-32 mx-auto p-2">
                        <h3 class="text-center font-semibold">{{ $category->name }}</h3>

                    </a>
                @endforeach
                <a href="/products/samet"
                    class="grid grid-cols-1 rounded-3xl box-border border-2 p-4 w-full bg-gray-200 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl">
                    <img src="{{ asset('assets/accessory-icon.png') }}" alt="samet accessoires"
                        class="w-20 h-20 md:w-32 md:h-32 mx-auto p-2">
                    <h3 class="text-center font-semibold">{{ $category->name }}</h3>

                </a>

            </div>

        </div>

    </x-section>

</div>
