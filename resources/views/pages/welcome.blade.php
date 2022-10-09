@extends('layouts.template')
@section('main')

    <section id="hero">
        <img src="{{ asset('assets/banner.png') }}" alt="" class="w-full bg-cover bg-center">
    </section>

    <section id="categories">

        <div class="p-4 flex flex-col justify-center items-center space-y-20"
            style="background-image: url('{{ asset('assets/bg-wood.png') }}')">

            <h2 class="text-4xl text-center">Donnez vie à vos envis !</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 lg:w-2/4 m-auto">

                @foreach ($categories as $category)
                    <a href=""
                        class="flex flex-col justify-center items-center rounded-3xl border-2 border-black p-5 overflow-hidden w-40 h-40 place-self-center shadow-lg bg-white transition-all duration-300 hover:scale-110">
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="">
                        <h3 class="text-center">{{ $category->name }}</h3>

                    </a>
                @endforeach
            </div>
        </div>

    </section>

    <x-section id="productscroller">

        <x-title>Produits</x-title>

        @include('sections.products-grid')

    </x-section>

    <section id="panel1">
        {{-- <img src="{{asset('storage/'.$panel1->path)}}" alt=""> --}}
    </section>

@endsection
