@extends('layouts.template')
@section('main')


    <form action="{{ route('order.post', [$product->brand->slug, $product->slug]) }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-gray-100 rounded-md">

            <input type="text" name="name">
            <input type="text" name="variation" value="{{ $variation }}" hidden>
            <div>
                {{ $product->name }}
            </div>
        </div>
        <button type="submit">Acheter</button>

    </form>
@endsection
