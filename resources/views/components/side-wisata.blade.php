<nav>
    <x-side-nav-link href="{{ route('wisata-home') }}" :active="request()->routeIs('wisata-home')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        Home
    </x-side-nav-link>
    <x-side-nav-link href="{{ route('wisata-transaksi') }}" :active="request()->routeIs('wisata-transaksi')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="inline w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4H3v1h2V2h1v20H5v-1H4v2h18V1H4zm3-2h14v20H7zM5 20H3v-1h1v-1h1zm0-6H3v-1h1v-1h1zm0-6H3V7h1V6h1zm0 3H3v-1h1V9h1zm0 6H3v-1h1v-1h1zm10.5-5h-3A3.504 3.504 0 0 0 9 15.5V18h10v-2.5a3.504 3.504 0 0 0-3.5-3.5zm2.5 5h-8v-1.5a2.503 2.503 0 0 1 2.5-2.5h3a2.503 2.503 0 0 1 2.5 2.5zm-4-6a3 3 0 1 0-3-3 3.003 3.003 0 0 0 3 3zm0-5a2 2 0 1 1-2 2 2.002 2.002 0 0 1 2-2z"/>
        </svg>
        Transaksi Hari Ini
    </x-side-nav-link>
    <x-side-nav-link href="{{ route('wisata-rekap') }}" :active="request()->routeIs('wisata-rekap')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="inline w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4H3v1h2V2h1v20H5v-1H4v2h18V1H4zm3-2h14v20H7zM5 20H3v-1h1v-1h1zm0-6H3v-1h1v-1h1zm0-6H3V7h1V6h1zm0 3H3v-1h1V9h1zm0 6H3v-1h1v-1h1zm10.5-5h-3A3.504 3.504 0 0 0 9 15.5V18h10v-2.5a3.504 3.504 0 0 0-3.5-3.5zm2.5 5h-8v-1.5a2.503 2.503 0 0 1 2.5-2.5h3a2.503 2.503 0 0 1 2.5 2.5zm-4-6a3 3 0 1 0-3-3 3.003 3.003 0 0 0 3 3zm0-5a2 2 0 1 1-2 2 2.002 2.002 0 0 1 2-2z"/>
        </svg>
        Rekap Kunjungan
    </x-side-nav-link>
</nav>