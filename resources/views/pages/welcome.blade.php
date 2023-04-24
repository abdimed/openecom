@extends('layouts.template')

@section('main')

    @include('sections.hero')

    @include('sections.categories')

    <x-separation />

    @include('sections.products-grid')

@endsection
