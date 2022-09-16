@extends('layouts.template')
@section('main')
    @foreach ($products as $product)
        <a href="{{ route('product.view',[$product->brand->slug, $product->slug]) }}"> {{ $product->name }} </a>
    @endforeach
@endsection
