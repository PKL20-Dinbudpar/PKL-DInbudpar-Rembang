<x-main-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Rekap Data Kunjungan Wisata Bulanan') }}
            </h2>
            <div class="flex">
                <nav class="flex">
                    <x-side-nav-link href="{{ route('dinas-home') }}" :active="request()->routeIs('dinas-home')" class="mr-2">
                        Bulanan
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('dinas-rekap') }}" :active="request()->routeIs('dinas-rekap')" class="bg-blue-300">
                        Tahunan
                    </x-side-nav-link>
                </nav>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <livewire:rekap-bulanan />
            </div>
        </div>
    </div>
</x-main-layout>
