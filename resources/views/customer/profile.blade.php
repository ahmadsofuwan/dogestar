@extends('layout.index')

@section('content')

<div class="mt-2">
    <img src="{{ asset('img/logo.png') }}" alt="" class="mx-auto w-40">
</div>
<div class="text-center mt-2 font-bold text-xl text-yellow-500 mb-5">Dogestar</div>

<div class="p-4 rounded-lg shadow-md flex justify-between items-center border-yellow-500 border-2 mt-5">
    <div class="flex items-center">
        <div>
            <h3 class="text-lg font-semibold text-white">Invite Link</h3>
            <a href="https://t.me/supermeo" class="text-blue-400 underline">{{ route('register', ['ref' => $user->username]) }}</a>
            <p class="text-sm text-yellow-500 mt-2">Get 1 SUPER for each meow invited, and get 1% of total claim amount when your friends claim their rewards.</p>
        </div>
    </div>
    <div class="text-right">
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="copyToClipboard('{{ route('register', ['ref' => $user->username]) }}')">
            <ion-icon name="copy-outline"></ion-icon>
        </button>
    </div>
</div>
<div class="p-4 rounded-lg shadow-md flex justify-between items-center border-yellow-500 border-2 mt-5">
    <div class="flex items-center">
        <img src="{{ asset('img/logo.png') }}" alt="Unclaimed Amount Logo" class="w-8 h-8 mr-2">
        <div>
            <p class="text-white">Unclaimed amount</p>
            <p class="text-white text-xl">0</p>
        </div>
    </div>
    <div class="text-right">
        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Claim
        </button>
    </div>
</div>

<div class="text-center mt-5">
    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-4 px-8 rounded text-xl">
        Invited (0)
    </button>
</div>





<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Link copied to clipboard successfully'
            });
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }
</script>



@endsection