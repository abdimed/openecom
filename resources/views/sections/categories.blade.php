<div class="relative px-4">

    <section id="categories">

        <div class="flex flex-col justify-center items-center content-center space-y-4 mt-10">

            <h2 class="text-xl lg:text-2xl text-center font-semibold">Découvrez nous accessoires!</h2>

            <div class="grid grid-cols-3 md:grid-cols-4 gap-2 lg:gap-4 lg:w-fit m-auto w-full">

                @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category) }}"
                        class="grid grid-cols-1 rounded-3xl box-border border-2 p-2 w-full bg-gray-200 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl">
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}"
                            class="w-16 h-16 md:w-20 md:h-20 mx-auto p-2">
                        <h3 class="text-center font-semibold text-sm">{{ $category->name }}</h3>

                    </a>
                @endforeach
                <a href="/products/samet"
                    class="grid grid-cols-1 rounded-3xl col-span-2 lg:col-span-1 box-border border-2 p-4 w-full bg-red-600 text-white transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl">
                    <img src="{{ asset('assets/accessory-icon.png') }}" alt="samet accessoires"
                        class="w-16 h-16 md:w-20 md:h-20 mx-auto p-2">
                    <h3 class="text-center font-semibold">Accessoire</h3>
                    <img src="{{asset('assets/logo-samet.png')}}" alt="ccbo samet" class="bg-white px-2 py-1 rounded-full mx-auto">

                </a>

            </div>

        </div>

    </section>

</div>
