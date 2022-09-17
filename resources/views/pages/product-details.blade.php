@extends('layouts.template')
@section('main')

    <section class="container m-auto">
        <div class="grid grid-cols-2 gap-10">

            <h1 class="col-span-2 text-4xl font-bold">
                {{ $product->name }}
            </h1>

            <div class="">

                <img src="{{ asset('storage/' . $product->img) }}" alt=""
                    class="w-full h-full object-contain object-center rounded-md border">

            </div>

            <div class="flex flex-col gap-y-10" x-data ="{price:''}">
                @if (!empty($product->variations))
                    <span class="font-bold">Choisissez les caractérestique</span>

                    <ul class="flex gap-3">
                        @foreach ($product->variations as $variation)
                            <li>

                                <input type="radio" name="variation" id="{{ $variation->id }}"
                                    value="{{ $variation->id }}" class="peer hidden" checked>

                                <label for="{{ $variation->id }}" :change = "price = {{$variation->price}}" @click = "price = {{$variation->price}}"
                                    class="rounded-md p-4 border bg-gray-300 peer-checked:bg-red-500 peer-checked:text-white">{{ $variation->name }}</label>

                            </li>
                        @endforeach
                    </ul>
                    <span x-text="price"></span>
                @endif
            </div>

        </div>

    </section>




    @if (!empty($product->specifications))
        @foreach ($product->specifications as $specification)
            {{ $specification->name }}
        @endforeach
    @endif

@endsection
