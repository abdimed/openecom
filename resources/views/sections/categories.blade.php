<div class="bg-cover bg-no-repeat bg-center" style="background-image: url('{{ asset('assets/bg-wood.png') }}')">
    <x-section id="categories">

        {{-- @livewire('product-search') --}}

        <div class="p-4 flex flex-col justify-center items-center space-y-20">

            <h2 class="text-4xl text-center">Donnez vie à vos envis !</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-fit m-auto">

                @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category) }}"

                        class="flex flex-col justify-center items-center rounded-3xl border-2 border-black p-5 overflow-hidden w-32 h-32 md:w-40 md:h-40 place-self-center  bg-white transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-2xl">

                        <img src="{{ asset('storage/' . $category->icon) }}" alt="{{$category->name}}">
                        <h3 class="text-center">{{ $category->name }}</h3>

                    </a>
                @endforeach
            </div>

            <a href="/products/samet" class="relative flex items-center bg-[#E30613] rounded-3xl shadow-xl shadow-red-500 transition-all duration-300 hover:-translate-y-2 hover:drop-shadow-2xl">
                <img src="{{asset('assets/accessory-icon.png')}}" alt="samet accessoires" class="absolute left-2">
                <span class="block text-white text-xl font-semibold px-20 py-24 lg:px-32 lg:py-20">Accessoires</span>
                <img src="{{asset('assets/logo-samet.png')}}" alt="samet logo" class="bg-white rounded-full absolute right-2 p-2 bottom-5">
            </a>

        </div>

    </x-section>

</div>
