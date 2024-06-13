@extends('template.master')

@section('content')
@php
use Illuminate\Support\Str;
@endphp



<div class="grid grid-cols-1 xl:grid-cols-4 md:grid-cols-2 gap-3 w-full">

    <div class="mb-3 bg-gray-900 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="text-green-500 font-black text-lg">Total Balance</div>
            <div>
                @if ($user->status =='active')
                    <span class="font-black text-yellow-500">$ {{ number_format($user->usdt +($user->saldo*env('PRICE_COIN'))+ ( 99000 *env('PRICE_COIN')),4) }}</span>
                @else
                    <span class="font-black text-yellow-500">$ {{ number_format($user->usdt +($user->saldo*env('PRICE_COIN')),4) }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="mb-3 bg-gray-900 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl" style="background-image: url({{ asset('img/logo.png') }})"></div>
            <div>
                <span class="font-black text-yellow-500">{{ number_format($user->saldo,2) }}</span>
                <div class="w-full text-center mt-3">
                </div>
            </div>
        </div>
    </div>
    
    <div class="mb-3 bg-gray-900 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl" style="background-image: url({{ asset('img/usdt.png') }})"></div>
            <div>
                <span class="font-black text-yellow-500">$ {{ number_format($user->usdt,2) }}</span>
                <div class="w-full text-center mt-3">
                    <button id="convers" class="bg-purple-500 px-2 py-1 mt-2 rounded-3xl font-black animate-pulse text-gray-900">Swap</button>
                </div>
            </div>
        </div>
    </div>
    @if ($user->status =='active')
    <div class="mb-3 bg-gray-900 py-3 rounded-lg">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl" style="background-image: url({{ asset('img/coin.png') }})"></div>
            <div>
                <span class="font-black text-yellow-500">{{ number_format(99000,2) }}</span>
                <div class="w-full text-center mt-3">
                    <button id="airdrop" class="bg-purple-500 px-2 py-1 mt-2 rounded-3xl font-black animate-pulse text-gray-900">Withdraw</button>
                </div>
            </div>
        </div>
    </div>
    @endif


    <div class="mb-3 bg-gray-900 py-3 rounded-lg" id="transfer">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/mobile-payment.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Transfer</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 bg-gray-900 py-3 rounded-lg" id="deposit">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/venture.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Deposit</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 bg-gray-900 py-3 rounded-lg" id="whitdraw">
        <div class="w-full flex justify-between px-5">
            <div class="bg-cover bg-no-repeat bg-center w-20 h-20 rounded-3xl " style="background-image: url({{ asset('img/money-withdrawal.png') }})"></div>
            <div class="my-auto">
                <div class="w-full text-center">
                    <span class="w-full mx-auto font-black text-xl">Withdraw</span>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="w-full">
    <div class="w-full text-center text-4xl font-black">History</div>
    <div class="grid grid-cols-2 gap-2 text-center ">
        <div id="hgeneral" class="border-b-4 border-solid border-green-500">General</div>
        <div id="hstake" class="">Stake</div>
    </div>
    <div class="grid grid-cols-1 gap-2 text-center mt-5 font-semibold" id="general">
        @foreach ($logs as $log)
        <div class="grid grid-cols-4 gap-2">
            <span class="truncate">{{ $log->username }}</span>
            <span class="{{ Str::contains($log->value,'-')?'text-red-500':'text-green-500' }}">{{ $log->value }}</span>
            <span>{{ $log->note }}</span>
            <span>{{ $log->created_at }}</span>
        </div>
        @endforeach
    </div>
    <div class="grid grid-cols-1 gap-2 text-center mt-5 font-semibold" id="stake" style="display: none">
        @foreach ($logstakes as $logs)
        <div class="grid grid-cols-4 gap-2">
            <span>{{ $logs->targets->username}}</span>
            <span class="{{ Str::contains($logs->value,'-')?'text-red-500':'text-green-500' }}">{{ $logs->value }}</span>
            <span>{{ $logs->note }}</span>
            <span>{{ $logs->created_at }}</span>
        </div>
        @endforeach
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#hstake').click(function() {
            $('#hgeneral').removeClass('border-b-4 border-solid border-green-500');
            $('#general').hide();

            $('#hstake').addClass('border-b-4 border-solid border-green-500');
            $('#stake').show();
        })
        $('#hgeneral').click(function() {
            $('#hstake').removeClass('border-b-4 border-solid border-green-500');
            $('#stake').hide();

            $('#hgeneral').addClass('border-b-4 border-solid border-green-500');
            $('#general').show();
        })

        $('#transfer').click(function() {
            Swal.fire({
                title: '<strong class="text-purple-500">TRANSFER</strong>',
                showConfirmButton: false,
                showCloseButton: true,
                html: `<form action="" method="post" class="grid grid-cols-1 gap-3 text-purple-500">
                @csrf
                <input type="text" name="username" placeholder="Wallet Address (DRC20)" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                <input type="number" name="saldo" placeholder="Amount" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                <input type="password" name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                <div class="flex justify-between">
                    <div>
                        <label for="">$POODLE</label>
                        <input type="radio" name="type" value="bankersdex">
                    </div>
                    <div>
                        <label for="">USDT</label>
                        <input type="radio" name="type" value="usdt">
                    </div>
                    
                </div>
                <button onclick="Swal.close()" class="bg-purple-500 hover:bg-blue-600 focus:bg-blue-800 w-ful rounded-2xl py-2 text-black">Send</button>

                </form>`,
            })
        });
        $('#convers').click(function() {
            Swal.fire({
                title: '<strong>USDT to POODLE</strong>',
                showConfirmButton: false,
                showCloseButton: true,
                html: `<form action="{{ route('wallet.convers') }}" method="post" class="grid grid-cols-1 gap-3">
                @csrf
                <input id="usdt_convers" type="number" name="usdt" placeholder="Min 1 USDT" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                <input id="bankersdex_convers" type="number" disabled placeholder="POODLE" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                <input id="password" type="password"  name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                <button type="button" id="all_convers" value="{{ $user->usdt }}" class="bg-green-500 hover:bg-green-600 focus:bg-green-800 w-1/4 rounded-2xl py-2 ">All</button>
                <button onclick="Swal.close()" class="bg-purple-500 hover:bg-purple-600 focus:bg-purple-800 w-full rounded-2xl py-2 ">Swap</button>
                </form>`,
            })
            $("#usdt_convers").keyup(function(e) {
                var usdt = $("#usdt_convers").val();
                $("#bankersdex_convers").val(usdt * {{ $priceCoin }});
            });
            $("#all_convers").click(function() {
                var usdt = $(this).attr("value");
                $("#usdt_convers").val(usdt);
                $("#bankersdex_convers").val(usdt * {{ $priceCoin }});
            })

        });

        $("#airdrop").click(function(){
            Swal.fire("Airdrop will be released after Presale!");
        })


        $('#whitdraw').click(function() {
            Swal.fire({
                title: '<strong>Withdraw</strong><div class="text-yellow-500 text-base">Withdrawals will arrive within 24hours</div>',
                showConfirmButton: false,
                showCloseButton: true,
                html: `
                <div class="grid grid-rows-1 grid-flow-col gap-4">
                <button onclick="Swal.close()" class=" px-2 bg-green-500 hover:bg-green-600 focus:bg-green-800 w-ful rounded-2xl py-2 " id="wd_usdt">USDT</button>
                <button onclick="Swal.close()" class=" px-2 bg-purple-500 hover:bg-purple-600 focus:bg-purple-800 w-ful rounded-2xl py-2 " id="wd_poodlepet">POODLE</button>
                </div>
                `,
            })

            $('#wd_poodlepet').click(function() {
                Swal.fire({
                    title: '<strong>Withdraw POODLE</strong>',
                    showConfirmButton: false,
                    showCloseButton: true,
                    html: `<form action="{{ route('wallet.witdraw') }}" method="post" class="grid grid-cols-1 gap-3">
                    @csrf
                    <input type="number" name="saldo" placeholder="Min {{ env('MIN_WITHDRAW',1) }} POODLE" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <input type="password" name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <button onclick="Swal.close()" class="bg-purple-500 hover:bg-purple-600 focus:bg-purple-800 w-ful rounded-2xl py-2 ">Submit</button>
                </form>`,
                })
            });

            $('#wd_usdt').click(function() {
                Swal.fire({
                    title: '<strong>Withdraw USDT</strong>',
                    showConfirmButton: false,
                    showCloseButton: true,
                    html: `
                    <form action="{{ route('wallet.witdraw.usdt') }}" method="post" class="grid grid-cols-1 gap-3">
                    @csrf
                    <input type="number" name="saldo" placeholder="Min {{ env('MIN_WITHDRAW') }} USDT" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <input type="text" name="wallet" placeholder="Wallet Address (BEP20)" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <input type="password" name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <button onclick="Swal.close()" class="bg-green-500 hover:bg-green-600 focus:bg-green-800 w-ful rounded-2xl py-2 ">Submit</button>
                </form>`,
                })
            });


        });
        

        $('#deposit').click(function() {
            Swal.fire({
                showCloseButton: true,
                showConfirmButton: false,
                html:`
                <div class="text-sm mb-1 text-red-500" >Make sure your wallet is the same as in our system and click request</div>
                <img class="mx-auto" src="{{ asset('img/qr-code.png') }}" alt="">
                    <div>DUDqhsWXvioz9TrWjC82UT4iYfmsZCct1U</div>
                    <div><button id="request" onclick="Swal.close()" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-800 w-ful rounded-2xl p-2">Request</button></div>  
                `,
                width: 500,
                padding: '3em',
            })

            $("#request").click(function(){
                Swal.fire({
                showCloseButton: true,
                showConfirmButton: false,
                html:`
                <form action="{{ route('wallet.deposit') }}" method="post" class="grid grid-cols-1 gap-3">
                    @csrf
                    <input type="password"  name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <button onclick="Swal.close()" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-800 w-full rounded-2xl py-2 ">Submit</button>
                </form>
                `,
                width: 500,
                padding: '3em',
            })

            })




        })

       






    });
</script>


<script>
    function copyTextToClipboard() {
        const staticText = "{{ env('HAST_ID') }}";
        // Membuat elemen textarea sementara untuk menyalin teks
        const tempTextArea = document.createElement("textarea");
        tempTextArea.value = staticText;
        document.body.appendChild(tempTextArea);

        // Memilih teks dalam textarea sementara
        tempTextArea.select();
        tempTextArea.setSelectionRange(0, 99999); // Untuk dukungan mobile

        // Menyalin teks ke clipboard
        document.execCommand("copy");

        // Menghapus textarea sementara karena sudah selesai menyalin
        document.body.removeChild(tempTextArea);

        // Menampilkan pesan atau melakukan aksi lain untuk memberi tahu bahwa teks telah disalin
        alert("Teks berhasil disalin!");
    }
</script>



@endsection