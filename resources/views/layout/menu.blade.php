<div class="toolbar tabbar tabbar-labels toolbar-bottom elevation-6 bg-gray-500">
    <div class="toolbar-inner">
        <a href="{{ route('packages') }}" class="tab-link {{ request()->is('packages*') ? 'tab-link-active' : '' }}">
            <ion-icon name="home-outline"></ion-icon>
            <span class="tabbar-label">Home</span>
        </a>
        <a href="{{ route('wallet') }}" class="tab-link {{ request()->is('wallet*') ? 'tab-link-active' : '' }}">
            <ion-icon name="wallet-outline"></ion-icon>
            <span class="tabbar-label">Wallet</span>
        </a>
        <a href="{{ route('minting') }}" class="tab-link addding-ads bg-yellow-500">
            <span class="adding-ads">
                <img src="{{ asset('img/3d-printing.png') }}" alt="" class="w-fit p-3">
            </span>
        </a>
        <a href="{{ route('profile') }}" class="tab-link {{ request()->is('profile*') ? 'tab-link-active' : '' }}">
            <ion-icon name="person-outline"></ion-icon>
            <span class="tabbar-label">Profile</span>
        </a>
        <a href="{{ route('logout') }}" class="tab-link">
            <ion-icon name="log-out-outline"></ion-icon>
            <span class="tabbar-label">Logout</span>
        </a>
    </div>
</div>