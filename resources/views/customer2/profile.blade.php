@extends('template.master')

@section('content')
@php
use Carbon\Carbon;
@endphp


<div class="grid grid-cols-1 gap-3 lg:w-1/4 w-full mx-auto">

    <div class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="flex justify-center">
            <img src="{{ asset('img/logo.png') }}" alt="user" class="w-1/2">
        </div>
        <div class="text-center text-purple-500 animate-pulse text-xl font-black mt-3">www.poodlepet.site</div>

    </div>


</div>

<div class="grid grid-cols-1 xl:grid-cols-4 md:grid-cols-2 gap-3 w-full">


    <div class="mb-3 bg-zinc-700 py-3 rounded-lg btn-cpy" data-value="{{ $user->wallet }}">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/e-wallet.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">{{ substr( $user->wallet,0,12) }}</span>
                </div>
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Wallet</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/whatsapp.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">{{ $user->phone }}</span>
                </div>
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Phone</span>
                </div>
            </div>
        </div>
    </div>
    <a href="https://wa.me/{{ empty($upline->phone)?'':$upline->phone }}" target="_blank" class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/whatsapp.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">{{ empty($upline->phone)?'':$upline->phone }}</span>
                </div>
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl ">Agent </span>
                </div>
            </div>
        </div>
    </a>
    <!-- <div class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/target.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center ">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">{{ number_format($reff) }}</span>
                </div>
                
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Reff</span>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/group.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">{{ number_format($team) }}</span>
                </div>
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">${{ number_format($omset,2) }}</span>
                </div>
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Team</span>
                </div>
            </div>
        </div>
    </div> -->
    <div class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/calendar.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">{{ Carbon::parse($user->created_at)->format('d/m/Y'); }}</span>
                </div>
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Created at</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 bg-zinc-700 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/customer-service.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center mb-3">
                    <span class="w-full mx-auto font-black text-lg text-yellow-500">Services</span>
                </div>
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Support</span>
                </div>
            </div>
        </div>
    </div>




</div>


<script>
    $(document).ready(function() {

        function cpy(text) {
            navigator.clipboard.writeText(text)
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'copied successfully',
                showConfirmButton: false,
                timer: 1500,

            })
        }
        $('.btn-cpy').click(function() {
            var text = $(this).data('value');
            cpy(text)
        });


    });
</script>



@endsection