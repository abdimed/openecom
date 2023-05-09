@extends('layouts.template')

@section('main')
    {{-- @include('sections.hero') --}}

    @include('sections.categories')



    {{-- <x-separation /> --}}

    <img src="{{ asset('assets/banners/1.png') }}" alt="ccbo" class="lg:w-1/2 px-2 lg:max-w-screen-xl m-auto">

    @include('sections.products-grid')

    <img src="{{ asset('assets/banners/2.png') }}" alt="ccbo" class="w-full px-2 lg:max-w-screen-xl m-auto">

    <x-section id="info">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-5">
            <x-info-card src="{{ asset('assets/svg1.svg') }}" header="Livraison 58 Wilayas"
                paragraph="CCBO vous met à votre
            disposition un service de
            livraison Rapide" />

            <x-info-card src="{{ asset('assets/svg2.svg') }}" header="Paiement à
            la Livraison"
                paragraph="Vous payez l’orsque vous
                recevez votre commande" />

            <x-info-card src="{{ asset('assets/svg3.svg') }}" header="Meilleure Qualité"
                paragraph="Nous vous assurons
                la qualité optimal de nos
                produits" />

            <x-info-card src="{{ asset('assets/svg4.svg') }}" header="Service après vente"
                paragraph="Une équipe professionelle
                et qualifiée est a votre
                service avant et après l’achat" />
        </div>
    </x-section>
@endsection
