@extends('template.master')

@section('content')

<div class="text-3xl text-orange-500 animate-pulse">Swap</div>
<div class="grid grid-cols-1 gap-8 mt-4">
    <div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex justify-start gap-4">
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-8 h-fit">
                <div>PoodlePet</div>
                <img src="{{ asset('img/copy.png') }}" alt="" class="w-5 h-fit">
                <img src="{{ asset('img/shield.png') }}" alt="" class="w-5 h-fit">
            </div>
            <div class="text-right">
                Balance : loading
            </div>
        </div>

    </div>
    <div class="">
        <textarea rows="3" disabled class="w-full bg-gray-600 rounded-3xl text-white p-3 text-xl text-right">0.0</textarea>
        <div class="flex justify-end">
            <div class="flex justify-end bg-gray-500 px-3 rounded-2xl">Unknown Risk <img src="{{ asset('img/information.png') }}" alt="" class="w-5 h-fit my-1 ml-1"></div>
        </div>
    </div>
    <div class="flex justify-center mt-3">
        <img src="{{ asset("img/down.png") }}" alt="" class="w-10 h-fit mx-auto animate-bounce bg-gray-500 p-2 border-2 rounded-full">
    </div>
    <div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex justify-start gap-4">
                <img src="{{ asset('img/usdt.png') }}" alt="" class="w-8 h-fit">
                <div>USDT</div>
                <img src="{{ asset('img/copy.png') }}" alt="" class="w-5 h-fit">
                <img src="{{ asset('img/shield.png') }}" alt="" class="w-5 h-fit">
            </div>
            <div class="text-right">
                Balance : loading
            </div>
        </div>
    </div>
    <div class="">
        <textarea rows="3" disabled class="w-full bg-gray-600 rounded-3xl text-white p-3 text-xl text-right">0.0</textarea>
    </div>
    <div>
        <button class="bg-orange-500 w-full rounded-3xl py-2.5">Swap</button>
    </div>

</div>




@endsection