@extends('layouts.template')
@section('main')
    <section id="hero">
        <img src="{{ asset('assets/banner.png') }}" alt="" class="w-full bg-cover bg-center">
    </section>

    <x-section id="categories">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 lg:w-3/4 m-auto">

            @foreach ($categories as $category)
                <a href="" class="flex flex-col justify-center items-center rounded-xl border-2 border-black p-5 overflow-hidden w-40 h-40 place-self-center shadow-lg">
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="">
                    <h3 class="text-center">{{ $category->name }}</h3>

                </a>
            @endforeach
        </div>
    </x-section>

    <x-section id="productscroller">
        <x-title>Produits</x-title>

        @include('sections.products-grid')

    </x-section>

    <section id="panel1">
        <img src="{{asset('storage/'.$panel1->path)}}" alt="">
    </section>
@endsection
