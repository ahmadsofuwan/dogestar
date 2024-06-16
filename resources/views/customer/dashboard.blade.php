@extends('layout.index')
@section('content')


<div class="grid grid-cols-1 gap-4 mb-3 mt-4 mx-3 text-white">
    <div class="p-4 rounded-lg flex items-center justify-between border-yellow-500 border-2">
        <div class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Tron Logo" class="w-8 h-8 mr-2">
            <div>
                <p class="text-white">Network Matching</p>
                <p class="text-white text-xl">3.12341231232132</p>
            </div>
        </div>
        <button class="bg-yellow-500 px-3 py-1 rounded-md text-sm w-fit font-black">Claim</button>
    </div>
    <div class="p-4 rounded-lg flex items-center justify-between border-yellow-500 border-2">
        <div class="flex items-center">
            <img src="{{ asset('img/doge.png') }}" alt="Tron Logo" class="w-8 h-8 mr-2">
            <div>
                <p class="text-white">Network Boost</p>
                <p class="text-white text-xl">3.12341231232132</p>
            </div>
        </div>
        <button class="bg-yellow-500 px-3 py-1 rounded-md text-sm w-fit font-black">Claim</button>
    </div>
</div>

<div class="flex justify-center items-center w-full">
    <img src="{{ asset('img/fan.gif') }}" alt="" class="w-3/4 mx-auto">
</div>
<div class="text-center text-white mt-4 mb-4">
    <p class="text-2xl text-yellow-500"><span class=" text-white font-black">0.006537</span> Doge</p>
    <p class="text-lg">100 Hours ⚡</p>
</div>

<div class="grid grid-cols-2 gap-4 font-black text-white">
    <div>
        <button class="bg-yellow-500 px-3 py-1 rounded-md text-sm w-full h-12">Claim</button>
    </div>
    <div>
        <button class="bg-yellow-500 px-3 py-1 rounded-md text-sm w-full h-12">Detail</button>
    </div>
</div>
<div class="grid grid-cols-1 gap-4 mb-3 mt-4 mx-3 text-white ">
    <div class="p-4 rounded-lg flex items-center justify-between border-yellow-500 border-2">
        <div class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Tron Logo" class="w-8 h-8 mr-2">
            <div>
                <p class="text-white">Boost Matching</p>
                <p class="text-white text-xl">3.12341231232132</p>
            </div>
        </div>
        <button class="bg-yellow-500 px-3 py-1 rounded-md text-sm w-fit font-black">Claim</button>
    </div>


</div>

@endsection