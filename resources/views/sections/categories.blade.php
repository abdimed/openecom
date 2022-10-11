<section id="categories">

    <div class="p-4 flex flex-col justify-center items-center space-y-20"
        style="background-image: url('{{ asset('assets/bg-wood.png') }}')">

        <h2 class="text-4xl text-center">Donnez vie à vos envis !</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-fit m-auto">

            @foreach ($categories as $category)
                <a href=""
                    class="flex flex-col justify-center items-center rounded-3xl border-2 border-black p-5 overflow-hidden w-32 h-32 md:w-40 md:h-40 place-self-center shadow-lg bg-white transition-all duration-200 ease-in-out hover:scale-105">
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="">
                    <h3 class="text-center">{{ $category->name }}</h3>

                </a>
            @endforeach
        </div>
    </div>

</section>
