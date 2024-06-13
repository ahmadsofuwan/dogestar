@extends('template.master')

@section('content')
@php
use Illuminate\Support\Str;
@endphp

<div class="mb-3 bg-zinc-700 py-3 rounded-lg lg:w-1/4 mx-auto">
    <div class="w-full flex justify-center px-5">
        <div class="text-5xl font-extrabold ...">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500 uppercase">
                {{ $rank }}
            </span>
        </div>

    </div>
</div>
<div class="grid grid-cols-1 xl:grid-cols-2 md:grid-cols-2 gap-3 w-full">

    <div class="mb-3 bg-zinc-700 py-3 rounded-lg lg:w-1/2">
        <div class="w-full flex justify-between px-5">
            <img src="{{ asset('img/left-arrow.png') }}" alt="" class="w-20">
            <div>
                <div class="w-full text-center mt-3">
                    <span class="w-full mx-auto font-black text-xl">Left</span>
                </div>
                <div class="font-black text-yellow-500 text-center text-lg">${{number_format($left,2) }}</div>

            </div>
        </div>
        <div class="px-3">
            <button value="{{ route('register',['agent'=>$user->l_referral]) }}" class="btn-cpy text-center w-full bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 mt-3 rounded-xl">Copy</button>
        </div>
    </div>

    <div class="mb-3 bg-zinc-700 py-3 rounded-lg lg:w-1/2 lg:ml-auto">
        <div class="w-full flex justify-between px-5">
            <img src="{{ asset('img/left-arrow.png') }}" alt="" class="w-20 rotate-180">
            <div>
                <div class="w-full text-center mt-3">
                    <span class="w-full mx-auto font-black text-xl">Right</span>
                </div>
                <div class="font-black text-yellow-500 text-center text-lg">${{number_format($rigth,2) }}</div>
            </div>
        </div>
        <div class="px-3">
            <button value="{{ route('register',['agent'=>$user->r_referral]) }}" class="btn-cpy text-center w-full bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 mt-3 rounded-xl">Copy</button>
        </div>
    </div>


</div>
{{-- bonus --}}
<div class="mb-3 bg-zinc-700 py-3 rounded-lg lg:w-1/4 mx-auto">
    <div class="w-full flex justify-between px-5">
        <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/money-bag.gif') }})"></div>
        <div class="my-auto">
            <div class="w-full text-center mb-3">
                <span class="w-full mx-auto font-black text-xl text-blue-500">Bonus</span>
            </div>
            <div class="w-full text-center">
                <span class="w-full mx-auto font-black text-xl text-yellow-500">${{ number_format($bonus,2) }}</span>
            </div>
            <div class="w-full text-center mt-2">
                <a href="{{ route('network.claim') }}">
                    <button class="bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-700 px-5 py-1 rounded-xl">Claim</button>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- claimed bonus --}}
<div class="mb-3 bg-zinc-700 py-3 rounded-lg lg:w-1/4 mx-auto">
    <div class="w-full flex justify-between px-5">
        <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/money-bag.gif') }})"></div>
        <div class="my-auto">
            <div class="w-full text-center mb-3">
                <span class="w-full mx-auto font-black text-xl text-blue-500">Claimed</span>
            </div>
            <div class="w-full text-center">
                <span class="w-full mx-auto font-black text-xl text-yellow-500">${{ number_format($claimed,2) }}</span>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        function cpy(text) {
            navigator.clipboard.writeText(text)
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'agent link successfully copied',
                showConfirmButton: false,
                timer: 1500,

            })
        }
        $('.btn-cpy').click(function() {
            var text = $(this).attr('value');
            cpy(text)
        });


    });
</script>



@endsection