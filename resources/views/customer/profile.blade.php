@extends('layout.index')

@section('content')
<div class="flex justify-center bg-gray-700 mt-2 mx-2 rounded-xl p-2">
   <span class="text-yellow-500 text-center">with every XWDOGE token you mint, you build a better future for all, keep trying XWDOGE users in the future and you are the pioneers!!!</span>
</div>
<div class="mt-2">
    <img src="{{ asset('img/logo.png') }}" alt="" class="mx-auto w-40">
</div>
<div class="text-center mt-2 font-bold text-xl text-yellow-500 mb-5">XWDOGE</div>
<div class="grid grid-cols-2 gap-2 space-y-2 px-5 bg-gray-700 rounded-lg mx-5 py-5">
    <div class="rounded-lg my-auto">Wallet Address</div>
    <div class="flex justify-end my-auto">
        <span class="text-yellow-600">
            {{ substr($user->wallet, 0, 4) . '....' . substr($user->wallet, -4) }}
        </span>
        <button class="btn-cpy w-fit" data-link="{{ $user->username }}">
            <img src="{{ asset('img/copy.png') }}" alt="" class="w-5 ml-2">
        </button>

    </div>

    <div class="rounded-lg my-auto">Contact Referrals</div>
    <div class="flex justify-end my-auto">
        <a href="{{ $wa }}">
            <img src="{{ asset('img/whatsapp.png') }}" alt="" class="w-5 mr-5">
        </a>

    </div>

    <div class="rounded-lg my-auto">Telegram Chanel</div>
    <div class="flex justify-end my-auto">
        <a href="https://t.me/xwdogeofficial">
            <img src="{{ asset('img/telegram.png') }}" alt="" class="w-5 mr-5">
        </a>

    </div>
</div>



@endsection