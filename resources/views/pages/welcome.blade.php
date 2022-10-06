@extends('layouts.template')
@section('main')


    <section id="hero" style="background-image: url('{{asset('storage/'.)}}')">

    </section>

    <x-section id="productscroller">

        <x-slot:title>Produits</x-slot:title>

        @include('sections.products-grid')

    </x-section>
@endsection
