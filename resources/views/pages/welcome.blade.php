@extends('layouts.template')
@section('main')

    <x-section id="productscroller">

        <x-slot:title>Produits</x-slot:title>

        @include('sections.products-grid')

    </x-section>
@endsection
