@extends('layouts.template')
@section('main')

    @livewire('cart-table')

    <span class="text-red-500"> {{ $total }}</span>
@endsection
