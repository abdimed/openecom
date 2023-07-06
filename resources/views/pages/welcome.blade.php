@extends('layouts.template')

@section('main')
    <div class="relative px-4 bg-cover">
    </div>
    {{-- <section class="bg-cover text-primary py-16"  style="background-image: url('{{ asset('assets/bg-wood.png') }}')">
        <div class="container mx-auto px-4">
          <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2">
              <h1 class="text-4xl lg:text-6xl font-bold mb-6">Welcome to Our Website</h1>
              <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna mauris.</p>
              <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded">
                Get Started
              </a>
            </div>
            <div class="lg:w-1/2">
              <img src="{{asset('assets/logo-wood.png')}}" alt="Hero Image" class="w-3/5 h-auto rounded-lg">
            </div>
          </div>
        </div>
      </section> --}}
      <section class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-4">
          <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2">
              <h1 class="text-4xl lg:text-6xl font-bold mb-6">Welcome to Our Website</h1>
              <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu urna mauris.</p>
              <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded">
                Get Started
              </a>
            </div>
            <div class="lg:w-1/2">
              <img src="hero-image.jpg" alt="Hero Image" class="w-full h-auto rounded-lg">
            </div>
          </div>
        </div>
      </section>

    @include('sections.categories')

    <img src="{{ asset('assets/banners/1.png') }}" alt="ccbo" class="lg:w-1/2 mt-10 px-2 lg:max-w-screen-xl mx-auto">

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
