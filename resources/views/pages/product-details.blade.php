@extends('layouts.template')
@section('main')


    {{$product->name}}

    @foreach ($product->variations as $variation)
        {{$variation->price}}
    @endforeach

@dump($product->specifications['robust'])
    @foreach ($product->specifications as $specification)
        {{$specification}}
    @endforeach

@endsection
