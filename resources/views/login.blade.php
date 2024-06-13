<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/OneMonBot.png') }}">
    <title>Xwdoge</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="text-gray-800 antialiased bg-gray-100">
    <header class="flex justify-between items-center p-4 bg-white shadow-md">
        <div class="text-lg font-bold flex">
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-10">
            <a href="{{ route('login') }}" class="uppercase my-auto"> Xwdoge</a>
        </div>
    </header>
    <main class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
            <div class="text-left">
                <h2 class="text-3xl font-semibold text-gray-900 inline-block px-2 py-1 rounded">Sign In.</h2>
            </div>
            <form class="mt-8 space-y-6" method="post" action="{{ route('login.auth') }}">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">

                    <div class="relative flex items-center">
                        <span class="pl-3 flex items-center pointer-events-none mr-2">
                            <i class="fas fa-wallet text-gray-400"></i>
                        </span>
                        <input id="username" name="username" type="text" autocomplete="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm rounded-full" placeholder="Dogochain Wallet Address" value="{{ old('username') }}">
                    </div>

                    <div class="relative flex items-center">
                        <span class="pl-3 flex items-center pointer-events-none mr-2">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm rounded-full" placeholder="Password" value="{{ old('password') }}">
                    </div>

                </div>
                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <a href="{{ route('forget') }}" class="font-medium text-gray-600 hover:text-gray-900">Forgot Password?</a>
                    </div>
                </div>
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        ACCESS MY ACCOUNT
                        <span class="absolute inset-y-0 right-0 flex items-center pl-2">
                            <i class="fas fa-arrow-right text-gray-400"></i>
                        </span>
                    </button>
                </div>
                <div class="text-center">
                    <p class="mt-2 text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="font-medium text-gray-600 hover:text-gray-900">Register</a></p>
                    <p class="mt-2 text-sm text-gray-600">Need to create a wallet? <a href="https://chromewebstore.google.com/detail/unielon/inlkhilmjmjomfcpdifpfgllhhlpnbej" class="font-medium text-gray-600 hover:text-gray-900" target="_blank">Create Wallet</a></p>
                </div>
            </form>
        </div>
    </main>
    @include('sweetalert::alert')
</body>

</html>