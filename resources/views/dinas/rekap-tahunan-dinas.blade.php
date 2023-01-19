<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Rekap Data Kunjungan Wisata') }}
                    </h2>
                    <nav class="flex">
                        <x-side-nav-link href="{{ route('dinas-home') }}" :active="request()->routeIs('dinas-home')" class="mr-2 bg-blue-300">
                            Bulanan
                        </x-side-nav-link>
                        <x-side-nav-link href="{{ route('dinas-rekap') }}" :active="request()->routeIs('dinas-rekap')">
                            Tahunan
                        </x-side-nav-link>
                    </nav>
                </div>
            </x-slot>
        </div>
    </div>
</x-main-layout>