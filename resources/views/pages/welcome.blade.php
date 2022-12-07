@extends('layouts.template')

@section('main')
    @include('sections.hero')

    @include('sections.categories')

    <div class="w-full bg-black">

        <div
            class="max-w-screen-xl px-2 m-auto text-white font-bold text-4xl text-center flex flex-col lg:flex-row items-center py-2   ">
            <img src="{{ asset('assets/logo-white.svg') }}" alt="logo-white" class="w-32 h-fit">
            <span class="w-full">La Qualité est notre objectif !</span>
        </div>

    </div>

    @include('sections.products-swiper')
@endsection
