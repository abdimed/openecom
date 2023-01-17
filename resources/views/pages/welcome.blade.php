@extends('layouts.template')

@section('main')

    @include('sections.hero')

    @include('sections.categories')

    <x-separation />

    @include('sections.products-swiper')


    <x-section id="img">
        <img src="" alt="">
    </x-section>

@endsection
