@extends('template.master')

@section('content')
@php
use App\Http\Controllers\Helper\Help;
use Illuminate\Support\Facades\Crypt;
@endphp


<span class="mx-auto text-4xl font-medium text-purple-500">
    Dogechain(DRC20) create a new lifestyle in future
</span>
<div class="mt-2 text-base">
    Dogechain technology is getting ahead and our community will enjoy this system with Poodle Token,
    DRC-20 With the largest Dogecoin community.
</div>

<div class="mt-3 mx-auto flex justify-center">
    <img src="{{ asset('img/giphy.gif') }}" alt="bankersdex" class="w-full">
</div>

<div class="mb-3 bg-zinc-700 py-3 rounded-2xl px-1 gap-3">
    <div class="mx-auto text-center text-lg font-black text-red-500 uppercase">Presale</div>
    <div class="flex justify-center gap-2 text-lg">
        <img src="{{ asset('img/coin.png') }}" alt="bankersdex" class="w-14">
        <div> 1 $POODLE = $0.0005</div>
        <img src="{{ asset('img/usdt.png') }}" alt="usdt" class="w-14">
    </div>
    <div class="mx-auto text-center text-lg font-black text-green-500 uppercase">Target Price</div>
    <div class="flex justify-center gap-2 text-lg">
        <img src="{{ asset('img/coin.png') }}" alt="bankersdex" class="w-14">
        <div> 1 $POODLE = 1 DOGE</div>
        <img src="{{ asset('img/doge.png') }}" alt="usdt" class="w-14">
    </div>
    {{-- <div class="text-center">Small Packages $1</div> --}}
    <div class="text-center text-purple-500 uppercase">create your future with $POODLE </div>
    <div class="p-2 w-full">
        <div class="w-full bg-gray-100 rounded-full">
            {{-- <div class="bg-purple-600 text-xs font-medium text-white text-center p-0.5 leading-none rounded-full h-5" style="width: 75%"></div> --}}
        </div>
    </div>
    <div class="text-center text-lg font-semibold text-purple-500">Deploy By</div>
    <div class="text-center text-base font-semibold text-purple-500">DUDqhsWXvioz9TrWjC82UT4iYfmsZCct1U</div>
    <button class="w-full px-5 bg-green-500 py-2 rounded-full font-black stake"> 100% COMPLETED (Minted)</button>
    <div class="bg-purple-500 rounded-full mt-3 p-0.5">
        <button class="w-full px-5 bg-purple-500 py-2 rounded-full font-black stake">Staking (Small Packages $1) </button>
    </div>
    <div class="text-center mt-3 text-red-500 font-black">Target Exchanges (Dex/Cex)</div>
    <div class="grid grid-cols-4 gap-4 px-2 mt-3">
        <div class="text-center">
            <img src="{{ asset('img/unielon.svg') }}" alt="Unielon" class="w-14">
            <span class="font-bold capitalize">Unielon</span>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/gate.io.png') }}" alt="Gate.io" class="w-14">
            <span class="font-bold capitalize">Gate.io</span>
        </div>

        <div class="text-center">
            <img src="{{ asset('img/hayperpay.png') }}" alt="Hyperpay" class="w-14">
            <span class="font-bold capitalize ">Hyperpay</span>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/huobi.png') }}" alt="Huobi" class="w-14">
            <span class="font-bold capitalize ">Huobi</span>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/indodax.jpg') }}" alt="Indodax" class="w-14">
            <span class="font-bold capitalize ">Indodax</span>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/baybit.png') }}" alt="monero" class="w-14">
            <span class="font-bold capitalize ">Baybit</span>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/lbank.png') }}" alt="Lbank" class="w-14">
            <span class="font-bold capitalize ">Lbank</span>
        </div>
        <div class="text-center">
            <img src="{{ asset('img/orbix.png') }}" alt="orbix" class="w-14">
            <span class="font-bold capitalize ">Orbix</span>
        </div>

    </div>
</div>
<div class="mb-3 bg-zinc-700 py-3 rounded-2xl px-1 p-3">
    <div class="grid grid-cols-3 gap-4">
        <img src="{{ asset('img/airdrop.png') }}" alt="mendali" class="w-28 h-fit">
        <div class="col-span-2">
            <span class="text-lg font-semibold">Special Airdrop <span class="text-orange-500"> POODLE</span> Token.</span>
            <span>Special for lucky users who comply with the conditions to claim this airdrop, limited token for the lucky ones. <span class="text-red-500">(stake $1 & get the airdrop)</span> 
            </span>
        </div>
    </div>
    <button class="w-full px-5 bg-purple-500 py-2 rounded-full font-black mt-3"><span class="text-green-500"> {{ number_format(99000) }}</span> POODLE</button>
</div>
<div class="text-xl text-center font-medium mb-3 text-green-500 font-black">100% Trusted</div>

<div class="mb-3 bg-gray-300 rounded-2xl p-0.5">
    <div class="bg-[#444c54] rounded-2xl py-1 px-2">
        <img src="{{ asset('img/coin.png') }}" alt="logo" class="w-20 mx-auto mt-3">
        <div class="text-lg text-center">Token Name</div>
        <div class="text-xl text-center text-purple-500">POODLE </div>
        <div class="text-lg text-center">Max Supply</div>
        <div class="text-xl text-center text-purple-500">99,000,000,000 </div>
        <div class="text-lg text-center">Network</div>
        <div class="text-xl text-center text-purple-500">DogeChain/DRC-20</div>
        <div class="text-lg text-center">Explorer</div>
        <div class="text-xl text-center text-purple-500">www.dogechain.info</div>
    </div>
</div>
<div class="mb-3 bg-gray-300 rounded-2xl p-0.5">
    <div class="bg-[#444c54] rounded-2xl py-1 px-2">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-20 mx-auto mt-3">
        <div class="text-lg text-center">Buyback Program</div>
        <div class="text-xl text-center text-purple-500">$POODLE Support Buyback on the Market </div>
        <div class="mt-3 text-center">the pre-sale period, giving holders greater control. During the pre-sale, you have the freedom to sell your $POODLE tokens at any time</div>
    </div>
</div>
<div class="mb-3 bg-gray-300 rounded-2xl p-0.5">
    <div class="bg-[#444c54] rounded-2xl py-1 px-2">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-20 mx-auto mt-3">
        <div class="text-lg text-center">Inscribe $POODLE Token (DRC20)</div>
        <div class="text-xl text-center text-purple-500">www.unielon.com</div>
        <div class="mx-auto text-center mt-2"><img src="{{ asset('img/unielon.svg') }}" alt="" class="mx-auto"></div>
        <div class="mt-2 text-center">Now the Poodle is on the Unielon market.(PAIR POODLE/WDOGE)</div>
    </div>
</div>
<div class="bg-gray-300 rounded-2xl p-0.5 mb-5">
    <div class="bg-[#444c54] rounded-2xl py-1 px-2">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-20 mx-auto mt-3">
        <div class="text-lg text-center">Partners</div>
        <div class="text-xl text-center text-purple-500">Web3 Wallet</div>
        <div class="grid grid-cols-4 gap-4 px-2 mt-3">
            <div class="text-center">
                <img src="{{ asset('img/unielon.svg') }}" alt="Unielon" class="w-14">
                <span class="font-bold capitalize">Unielon</span>
            </div>
            <div class="text-center">
                <img src="{{ asset('img/gate.io.png') }}" alt="Gate.io" class="w-14">
                <span class="font-bold capitalize">Gate.io</span>
            </div>

            <div class="text-center">
                <img src="{{ asset('img/hayperpay.png') }}" alt="Hyperpay" class="w-14">
                <span class="font-bold capitalize ">Hyperpay</span>
            </div>
            <div class="text-center">
                <img src="{{ asset('img/huobi.png') }}" alt="Huobi" class="w-14">
                <span class="font-bold capitalize ">Huobi</span>
            </div>
            <div class="text-center">
                <img src="{{ asset('img/binances.png') }}" alt="Indodax" class="w-14">
                <span class="font-bold capitalize ">Binace</span>
            </div>
            <div class="text-center">
                <img src="{{ asset('img/tokenpocket.png') }}" alt="monero" class="w-14">
                <span class="font-bold capitalize ">TokenPocket</span>
            </div>


        </div>
    </div>
</div>

<script>
    $('.stake').click(function(e) {
        window.location.href = "{{ route('packages') }}";

    });
</script>




@endsection