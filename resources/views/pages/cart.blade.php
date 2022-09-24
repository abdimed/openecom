@extends('layouts.template')
@section('main')
@dump($imgs)
    <ul class="grid grid-cols-1 gap-y-5 bg-gray-100 p-2">
        @foreach ($cartItems as $item)
            <li class="grid grid-cols-3 bg-white rounded-md shadow-md p-2">
                <span class="text-xl font-bold"> {{ $item->name }}-{{ $item->options['variation'] }} </span>
                <span class="text-lg"> {{ $item->price }} <span class="text-sm align-top">DA</span> </span>
                {{ $item->qty }}
            </li>
        @endforeach
    </ul>

    <span class="text-red-500"> {{ $total }}</span>
@endsection
