@extends('layouts.template')

@section('main')


    @include('sections.categories')


    @include('sections.products-grid')

    <img src="{{ asset('assets/banners/2.webp') }}" alt="ccbo" class="w-full px-2 lg:max-w-screen-xl mx-auto">

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
