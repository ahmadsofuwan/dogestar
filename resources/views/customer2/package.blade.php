@extends('template.master')

@section('content')
@php
use Illuminate\Support\Facades\Auth;
@endphp
<style>
    .background-image {
        background-image: url("{{ asset('img/200w.gif') }}");
        /* Ganti "path/to/image.jpg" dengan path gambar yang sesuai */
    }
</style>


<div>
    <div class="background-image w-full h-80 bg-contain bg-no-repeat bg-center pt-12">
        <div class="text-center text-lg font-medium text-red-500">
            <img src="{{ asset('img/coin.png') }}" alt="" class="w-56 mx-auto">
        </div>

    </div>
</div>

<div class="bg-purple-700 rounded-2xl">
    <div class="bg-gray-900 rounded-2xl py-1 px-2 mt-5">
        <div class="text-xl text-center text-gray-400 font-black">Total  <span class="text-red-500 uppercase">Staking</span> </div>
        <div class="text-xl text-center mt-2 font-bold text-yellow-500">${{ number_format($totalStaking,) }}</div>
        {{-- total usdt --}}
        <div class="grid grid-cols-2 gap-4 mt-3">
            <button class="bg-purple-500 py-2.5 rounded-xl" data-toggle="modal" data-target="#exampleModalLong">+ Stake</button>
            <div class="bg-purple-500 rounded-xl p-0.5">
                <button class="bg-gray-900 p-2.5 rounded-xl w-full" data-toggle="modal" data-target="#staked">Detail</button>
            </div>
        </div>
        <div class="mt-3 text-center text-yellow-500">Create More profits with PoodlePet</div>
    </div>
    <div class="mt-3 grid grid-cols-2 gap-4 pb-2">
        <div class="text-center text-lg">
            <div>APR</div>
            <div class="text-yellow-300 font-bold">${{ number_format($arp,3) }}</div>
            {{-- profit yang bakal dia dapat nilai dolar --}}
        </div>
        <div class="text-center text-lg">
            <div>Total Bonus</div>
            <div class="text-yellow-300 font-bold">{{ number_format($mydata->bonus_downline,3) }}p</div>
            {{-- total bonus dari downline --}}
        </div>
    </div>
</div>
<div class="bg-gray-900 rounded-2xl mt-5 py-3 px-2">
    <div class="text-xl text-center text-purple-500">REFER & EARN</div>
    <div class="text-lg text-center mt-2">Bonus Sponsor <span class="text-yellow-500">10%</span></div>
    <div class="text-lg text-center mt-2">Sponsored <span class="text-yellow-500">{{ number_format($upline) }}</span></div>

    <div class="text-center mt-2 text-lg">referral link</div>
    <input type="text" value="{{ route("register",['reff'=>AUth::user()->username]) }}" class="rounded-3xl w-[80%] bg-purple-700 px-2">
    <button class="btn-cpy bg-purple-500 rounded-3xl px-2" value="{{ route("register",['reff'=>AUth::user()->username]) }}">copy</button>

</div>
@php
$upline = 0;
$downline = 6;
@endphp
<table class="table-auto w-full text-center rounded-xl bg-gray-900 mt-3">
    <thead>
        <tr><th colspan="3" class="text-red-500 font-black">Group Bonus</th></tr>
        <tr><th colspan="3">Your Amount <span class="text-yellow-500">$ {{ number_format($mydata->bonus) }}</span></th></tr>
        <tr>
            <th>Amount</th>
            <th>Profit</th>
            <th>Action</th>
        </tr>
        
    </thead>
    <tbody class="text-center">
        @foreach ($bonusdownline as $item)
            <tr>
                <td class="text-yellow-500" > ${{ number_format($item->bonus) }}</td>
                <td class="text-green-500" >{{ $item->percentage*100 }}%</td>
                <td>
                    @if ($mydata->bonus >= $item->bonus)
                        <button class="bg-green-500 px-2 rounded btn-claim-bonus" data-id="{{ $item->id }}" >Claim</button>
                    @else
                        <button class="bg-gray-700 px-2 rounded" disabled>Claim</button>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<table class="table-auto w-full text-center rounded-xl bg-gray-900 mt-3">
    <thead>
        <tr>
            <th colspan="2" class="text-red-500">Matching Bonus</th>
        </tr>
        <tr>
            <th>Level</th>
            <th>Commission</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-yellow-500" >1</td>
            <td class="text-green-500" >50%</td>
        </tr>
        <tr>
            <td class="text-yellow-500">2</td>
            <td class="text-green-500" >30%</td>
        </tr>
        <tr>
            <td class="text-yellow-500">3</td>
            <td class="text-green-500" >20%</td>
        </tr>
    </tbody>

</table>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Staking Packages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-purple-800">
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($packages as $item)
                    <button data-id="{{ encrypt($item->id) }}" class="bg-gray-800 px-1 py-2.5 rounded-lg btn-buy">
                        <div class="text-center text-yellow-500 font-black text-3xl">${{ number_format($item->price ) }}</div>
                        <div class="text-center text-yellow-500 text-md">{{ number_format($item->price * $priceCoin  ) }}p</div>
                        <div class="text-center text-red-500 text-md">fee {{ number_format($item->fee ) }}p</div>
                        <div class="text-center text-blue-500 text-md">{{ $item->profit*100 }}% | {{ $item->expired." ".$item->expired_type }}</div>
                        <div class="text-center font-bold text-teal-500">${{ number_format($item->price+($item->price * $item->profit) ) }} |  {{  number_format(($item->price+($item->price * $item->profit))*$priceCoin)  }}p</div>

                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail-->
<div class="modal fade" id="staked" tabindex="-1" role="dialog" aria-labelledby="stakedTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stakedTitle">Staked</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-purple-800">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Profit</th>
                            <th>Create at</th>
                            <th>Finish at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userPackages as $package)
                        <tr class="font-bold">
                            <td class="text-pink-500">${{ $package->price }}</td>
                            <td class="text-green-500">{{ $package->profit*100 }}%</td>
                            <td class="text-green-500">{{ date('Y-m-d',strtotime($package->created_at) )  }}</td>
                            <td class="text-green-500">{{ date('Y-m-d',strtotime($package->claim) )  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".btn-claim-bonus").click(function(){
            let id = $(this).data('id');
            Swal.fire({
                showCloseButton: true,
                showConfirmButton: false,
                html:`
                <form action="{{ route('packages.claim.bonus') }}" method="post" class="grid grid-cols-1 gap-3">
                    @csrf
                    <input type="hidden" name="id" value="${id}">
                    <input type="password"  name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <button onclick="Swal.close()" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-800 w-full rounded-2xl py-2 ">Submit</button>
                </form>
                `,
                width: 500,
                padding: '3em',
            })
        })

        $('.btn-stop').click(function(){
            var id = $(this).attr('data-id')
           
            $.ajax({
                url: '{{ route('packages.chek') }}',
                type: 'post',
                dataType: 'json',
                data: {id:id},
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .done(function(res) {
                if(!res){
                    Swal.fire({
                        title: 'are you sure you want to stop the funds will be returned 50%',
                        showCancelButton: true,
                        confirmButtonText: 'Stop',
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.href = '{{ route("packages.stop",["id"=>""]) }}'+id;
                            } 
                        })
                }


            })
            .fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            })
            
        });

        $(".btn-buy").click(function(){
            let id = $(this).data('id');
            $("#exampleModalLong").modal("hide");
            Swal.fire({
                showCloseButton: true,
                showConfirmButton: false,
                html:`
                <form action="{{ route('packages.buy') }}" method="post" class="grid grid-cols-1 gap-3">
                    @csrf
                    <input type="hidden" name="id" value="${id}">
                    <input type="password"  name="password" placeholder="Confirm password" class="w-full h-10 text-gray-800 px-2 rounded-2xl">
                    <button onclick="Swal.close()" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-800 w-full rounded-2xl py-2 ">Submit</button>
                </form>
                `,
                width: 500,
                padding: '3em',
            })



        })
        

    });
</script>


<script>
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
        var text = $(this).attr('value');
        cpy(text)
    });
</script>
<script>
    // Tanggal dan waktu yang ditentukan
    var targetDate = 0 * 1000;

    // Perbarui hitung mundur setiap 1 detik (1000 milidetik)
    var countdownInterval = setInterval(function() {
        // Dapatkan tanggal dan waktu saat ini
        var now = new Date().getTime();

        // Hitung selisih antara waktu saat ini dan waktu yang ditentukan
        var timeRemaining = targetDate - now;

        // Hitung mundur untuk hari, jam, menit, dan detik
        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        if(days < 10){
            days = '0'+ days
        }
        if(hours < 10){
            hours = '0'+ hours
        }
        if(minutes < 10){
            minutes = '0'+ minutes
        }
        if(seconds < 10){
            seconds = '0'+ seconds
        }


        // Tampilkan hitung mundur dalam elemen HTML dengan id "countdown"
        $('#countdown').html(days + ":" + hours + " : " + minutes + " : " + seconds );

        // Jika hitung mundur selesai, hentikan interval
        if (timeRemaining < 0) {
            clearInterval(countdownInterval);
            $('#countdown').html('00:00:00:00');
        }
    }, 1000); // Interval setiap 1 detik (1000 milidetik)
</script>







@endsection