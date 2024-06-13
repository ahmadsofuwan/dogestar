@extends('layout.index')

@section('content')
<div style="background-image: url('{{ asset('img/bg.jpg') }}');" class="text-white">
    <div class="text-center text-xl font-semibold mt-2">XWDOGE Minting Program Recruitment</div>
    <div class="text-center text-xl mt-4 font-black uppercase text-yellow-500">XWDOGE Airdrop</div>
    <div class="mt-5 mx-auto bg-yellow-500 w-fit p-2 rounded-full font-bold">{{ number_format(100000) }} XWDOGE</div>
    <div class="text-center text-yellow-500 text-md mt-5 font-black">Grab your free XWDOGE tokens today </div>

    <div class="separator-small mt-5"></div>
</div>
<div class="mt-5">
    <div class="text-center text-yellow-500 mt-2 text-xl uppercase font-black">Supply</div>
    <div class="text-center text-xl font-black text-yellow-500">21,000,000,000</div>
    <div class="text-center text-yellow-500 mt-3 font-black uppercase" >Free 9,000 hours minting for all users!!! </div>
    <div class="text-center text-yellow-500 mt-2">XWDOGE Deploy by {{ env('HAST_ID') }}</div>

    <div class="mx-auto grid grid-cols-2 px-5 font-black text-center mt-5">
        <div class="bg-red-700 text-gray-300 text-xs py-2 rounded-l-xl">1 XWDOGE</div>
        <div class="bg-gray-100 text-gray-700 py-2 rounded-r-xl" >{{ number_format( xwdoge_price(),8)  }} DOGE</div>
    </div>
    
    <div class="text-yellow-500 text-center mt-2 font-bold mb-3 uppercase flex justify-center">
        <img src="{{ asset('img/pickaxe.png') }}" alt="" class="w-5 mr-3" style="animation: spin 5s linear infinite;">
        <span class="font-black">Minting Booster</span>  
    </div>
</div>

<table class="table-auto mx-auto pb-10 border-yellow-500 ">
    <thead>
      <tr class="text-gray-900 uppercase border-yellow-500">
        <th class="text-center bg-yellow-500 rounded-t-xl px-3">Doge</th>
        <th class="text-center bg-yellow-500 rounded-t-xl px-3">Mint Hours</th>
        <th class="text-center bg-yellow-500 rounded-t-xl px-3">Reward</th>
        <th class="text-center bg-yellow-500 rounded-t-xl px-3">Action</th>
      </tr>
    </thead>
    <tbody class="border-collapse border border-yellow-500 text-center font-black ">
        @foreach ($packages as $item)
        <tr>
            <td class="border border-yellow-600 uppercase">{!! $item->price==0 ? '<span class="text-yellow-500 animate-pulse"> Free</span> ' : number_format($item->price) !!}</td>
            <td class="border border-yellow-600 uppercase">{{ convers($item->hours) }}</td>
            @if ($item->price == 0)
            <td class="border border-yellow-600 uppercase"><span class=""> {{ convers(10) }}</span></td>
            @else
            <td class="border border-yellow-600 uppercase"><span class=""> {{ convers(profit_per_hours($item->hours,$item->total_profit)) }}</span></td>
            @endif

            <td class="border border-yellow-600"><button class="w-full btn-buy animate-pulse text-green-500 uppercase" data-id="{{ $item->id }}">Start</button></td>
        </tr>
        @endforeach

       
    </tbody>
</table>

  


@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('.btn-buy').click(function () {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Confirm Password',
                icon: 'question',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    placeholder: 'Confirm Password',
                    class: 'px-5 bg-gray-500' // Adding class px-3 and bg-gray-500
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Submit!',
                cancelButtonText: 'Cancel',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return new Promise(function(resolve, reject) {
                        $.ajax({
                            url: '{{ route("packages.buy") }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id,
                                password: login
                            },
                            success: function(response) {
                                if(response.error){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.error,
                                    });
                                }else if(response.success){
                                    resolve(response)
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: response.success,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                                return resolve(response);
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'An error occurred on the server!',
                                });
                            }
                        });
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                }
            })
        });

    });
</script>
@endpush

