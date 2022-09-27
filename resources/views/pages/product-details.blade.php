@extends('layouts.template')
@section('main')

    @if ($product->visible)
        <div class="container m-auto grid grid-cols-1 gap-y-10" x-data="{ imgPrincipale: '/storage/{{ $product->attachments[0] }}' }">

            <section class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                <h1 class="lg:col-span-2 text-4xl font-bold">
                    {{ $product->name }}
                </h1>

                <div class="grid grid-cols-1 lg:grid-cols-5 overflow-hidden">

                    <div class="flex flex-row lg:flex-col justify-between items-center p-2 lg:order-1 order-2">
                        @foreach ($product->attachments as $attachment)
                            <img x-on:click.self="imgPrincipale = '/storage/{{ $attachment }}'"
                                src="{{ asset('storage/' . $attachment) }}" alt="att"
                                class="w-20 h-20 object-cover object-center rounded-md">
                        @endforeach
                    </div>

                    <img :src="imgPrincipale" alt="product-img"
                        class="w-full h-96 object-contain p-2 object-center col-span-4 lg:order-2 order-1 rounded-md border">

                </div>

                @livewire('cart-form', ['product' => $product, 'variations' => $product->variations])

            </section>

            <section>

                <h2 class="text-xl font-bold flex items-center w-full">
                    Description

                    <hr class="h-1 w-full ml-10 bg-gray-200">

                </h2>

                <p class="mt-5">
                    <x-markdown>
                        {{ $product->description }}
                    </x-markdown>

                </p>

            </section>

            <section class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <div class="bg-gray-100 rounded-lg p-4">

                    <h3 class="text-center text-xl font-bold py-2">Specifications</h3>

                    @if (!empty($product->specifications))
                        <ul>
                            @foreach ($product->specifications as $specification)
                                <li class="flex justify-between">
                                    <span class="text-gray-600"> {{ $specification->name }} </span>
                                    <span> {{ $specification->value }} </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                <div class="bg-gray-100 rounded-lg p-4">
                    <h3 class="text-center text-xl font-bold py-2">Catalogue Numérique</h3>

                    <a href="{{asset('storage/'.$product->file)}}" download="{{$product->name}}"
                        class="text-center bg-red-500 text-white border-2 border-red-500 hover:bg-red-600 hover:-translate-y-1 hover:shadow hover:shadow-red-500 transition-all duration-200 text-xl py-1 rounded-md">
                        Télécharger <br> format PDF
                    </a>

                </div>

                <div class="bg-gray-100 rounded-lg p-4 flex flex-col items-center">
                    <h3 class="text-center text-xl font-bold py-2">Marque</h3>

                    <img src="{{ asset('storage/' . $product->brand->logo) }}" alt="brand-logo" class="w-52 h-52">

                </div>
            </section>

        </div>

    @endif
@endsection
