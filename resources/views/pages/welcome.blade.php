@extends('layouts.template')
@section('main')
    <x-section id="productscroller">
        <x-title>Produits</x-title>

        @include('sections.products-grid')

    </x-section>
@endsection
