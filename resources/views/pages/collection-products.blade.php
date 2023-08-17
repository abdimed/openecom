@extends('layouts.template')
@section('main')
<x-section id="{{$collection}}">
    <x-title>{{ $collection }}</x-title>
    <div class="grid lg:grid-cols-4 grid-cols-2 gap-4">
        @foreach ($products as $product)
        @if ($product->visible)
        <x-product-card :$product />
        @endif
        @endforeach
    </div>

</x-section>
@endsection
