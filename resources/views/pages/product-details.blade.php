@extends('layouts.template')
@section('main')

    {{ $product->name }}


    @if (!empty($product->variations))
        @foreach ($product->variations as $variation)
            {{ $variation->price }}
        @endforeach
    @endif

    @if (!empty($product->specifications))
        @foreach ($product->specifications as $specification)
            {{ $specification->name }}
        @endforeach
    @endif

@endsection
