<div class="relative px-4">

    <section id="categories">

        <div class="flex flex-col justify-center items-center content-center mt-5 lg:mt-10">

            <h2 class="text-xl lg:text-2xl text-center font-semibold mb-10">Découvrez nous accessoires!</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 lg:gap-4 lg:w-fit m-auto w-full">

                @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category) }}"
                        class="relative block w-full h-full rounded-lg overflow-hidden group">
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}"
                            class="w-[200px] h-[200px] rounde-lg object-cover object-center group-hover:scale-125 duration-500 transition-all">
                        <h3
                            class="absolute bottom-0 text-white font-semibold text-lg z-20 p-2 group-hover:text-2xl transition-all duration-500">
                            {{ $category->name }} </h3>
                        <div
                            class="pointer-events-none bg-gradient-to-t from-black via-primary/50 h-full w-full absolute bottom-0 z-10">
                        </div>
                    </a>
                @endforeach

                <a href="/products/samet"
                    class="grid grid-cols-1 rounded-lg col-span-2 lg:col-span-1 box-border border-2 p-4 w-full bg-red-600 text-white transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl">
                    <img src="{{ asset('assets/accessory-icon.png') }}" alt="samet accessoires"
                        class="w-16 h-16 md:w-20 md:h-20 mx-auto p-2">
                    <h3 class="text-center font-semibold">Accessoire</h3>
                    <img src="{{ asset('assets/logo-samet.png') }}" alt="ccbo samet"
                        class="bg-white px-2 py-1 rounded-full mx-auto">
                </a>

            </div>

        </div>

    </section>

</div>
