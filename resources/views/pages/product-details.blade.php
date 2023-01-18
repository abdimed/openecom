@extends('layouts.template')
@section('main')
    @if ($product->visible)

        <div x-data="{ imgPrincipale: '/storage/{{ $product->images[0] }}' }">

            <x-section id="product">

                <span class="text-gray-400"> Category - <a
                        href="{{ route('category.products', $category) }}">{{ $category->name }}</a></span>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                    <div class="lg:col-span-2">

                        <x-title>

                            {{ $product->name }}

                        </x-title>
                    </div>


                    <div class="grid grid-cols-1 lg:grid-cols-5 overflow-hidden">

                        <div class="flex flex-row lg:flex-col justify-between items-center p-2 lg:order-1 order-2">
                            @foreach ($product->images as $image)
                                <img x-on:click.self="imgPrincipale = '/storage/{{ $image }}'"
                                    src="{{ asset('storage/' . $image) }}" alt="att"
                                    class="w-20 h-20 object-cover object-center rounded-md border p-1">
                            @endforeach
                        </div>

                        <img :src="imgPrincipale" alt="product-img"
                            class="w-full h-96 object-contain p-2 object-center col-span-4 lg:order-2 order-1 rounded-md border">

                    </div>

                    @livewire('cart-form', ['product' => $product, 'variations' => $product->variations])

                </div>
            </x-section>

            <x-section id="description">

                <x-title> Description</x-title>


                <p class="mt-5">
                    <x-markdown>
                        {{ $product->description }}
                    </x-markdown>

                </p>


                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-5">

                    <div class="bg-gray-100 rounded-lg p-4">

                        <h3 class="text-center text-xl font-bold py-2 text-gray-600">Caractéristiques</h3>

                        @if (!empty($product->specifications))
                            <ul class="px-4">
                                @foreach ($product->specifications as $specification)
                                    <li class="flex justify-between items-center">
                                        <span class="text-gray-400"> {{ $specification->name }} </span>
                                        <span class="bg-gray-400 h-[1px] flex-grow mx-2"></span>
                                        <span class="font-semibold"> {{ $specification->value }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                    <div class="bg-gray-100 rounded-lg p-4">
                        @if (!is_null($product->document))
                            <h3 class="text-center text-xl font-bold py-2 text-gray-600">Catalogue Numérique</h3>
                            <a href="/storage/{{ $product->document }}" download="{{ $product->name }} "
                                class="text-center flex justify-center p-4 flex-col">
                                <span
                                    class="block bg-red-500 text-white border-2 border-red-500 hover:bg-red-600 hover:-translate-y-1 hover:shadow hover:shadow-red-500 transition-all duration-200 text-xl py-1 rounded-md">
                                    Télécharger <br> format PDF</span>
                                <img src="{{ asset('assets/download.png') }}" alt="" class="m-auto mt-5">
                            </a>
                        @else
                            <h3 class="text-center text-xl font-bold py-2 text-gray-600">Catalogue Numérique</h3>
                            <a href="/storage/{{ $product->document }}" download="{{ $product->name }} "
                                class="text-center flex justify-center p-4 flex-col pointer-events-none grayscale">
                                <span
                                    class="block bg-red-500 text-white border-2 border-red-500 hover:bg-red-600 hover:-translate-y-1 hover:shadow hover:shadow-red-500 transition-all duration-200 text-xl py-1 rounded-md">
                                    Télécharger <br> format PDF</span>
                                <img src="{{ asset('assets/download.png') }}" alt="" class="m-auto mt-5">
                            </a>
                        @endif


                    </div>

                    <div class="bg-gray-100 rounded-lg p-4 flex flex-col items-center">
                        <h3 class="text-center text-xl font-bold py-2 text-gray-600">Marque</h3>

                        <img src="{{ asset('storage/' . $product->brand->logo) }}" alt="brand-logo"
                            class="w-52 h-52 object-contain">

                    </div>
                </div>
                @if (!$otherProducts->isEmpty())
                    <div class="relative" x-data>

                        <x-title>d'Autres {{ $category->name }}</x-title>

                        <div class="flex justify-between w-full flex-nowrap space-x-5">

                            <div class="my-auto" @click="$refs.carossel.scrollBy({left:-200, behavior: 'smooth'})">
                                <x-scroll-left-btn />
                            </div>

                            <div class="flex grow gap-10 overflow-x-scroll snap-x py-5" x-ref="carossel">

                                @foreach ($otherProducts as $product)
                                    @if ($product->visible)
                                        <x-product-card :$product />
                                    @endif
                                @endforeach

                            </div>

                            <div class="my-auto" @click="$refs.carossel.scrollBy({left:200, behavior: 'smooth'})">
                                <x-scroll-right-btn />
                            </div>

                        </div>
                @endif
            </x-section>

        </div>

    @endif
@endsection
