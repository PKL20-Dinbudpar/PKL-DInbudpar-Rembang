<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen md:flex" x-data="{ open: true }">
            {{-- Sidebar --}}
            <aside :class="{ '-translate-x-full': !open }" class="z-10 bg-blue-800 text-blue-100 w-64 px-2 py-4 absolute inset-y-0 left-0 md:relative transform md:translate-x-0
                overflow-y-auto transition ease-in-out duration-200 shadow-lg">
                {{-- Application Logo --}}
                <div class="flex items-center justify-between px-2 pb-3">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-blue-100" />
                        </a>
                        <span class="text-2xl font-extrabold">SIP KuWi</span>
                    </div>
                    <button type="button" @click=" open = !open " class="md:hidden inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-blue-700 
                        focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Navigation Link --}}
                <nav>
                    <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Home
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('transaksi') }}" :active="request()->routeIs('transaksi')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="inline w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4H3v1h2V2h1v20H5v-1H4v2h18V1H4zm3-2h14v20H7zM5 20H3v-1h1v-1h1zm0-6H3v-1h1v-1h1zm0-6H3V7h1V6h1zm0 3H3v-1h1V9h1zm0 6H3v-1h1v-1h1zm10.5-5h-3A3.504 3.504 0 0 0 9 15.5V18h10v-2.5a3.504 3.504 0 0 0-3.5-3.5zm2.5 5h-8v-1.5a2.503 2.503 0 0 1 2.5-2.5h3a2.503 2.503 0 0 1 2.5 2.5zm-4-6a3 3 0 1 0-3-3 3.003 3.003 0 0 0 3 3zm0-5a2 2 0 1 1-2 2 2.002 2.002 0 0 1 2-2z"/>
                        </svg>
                        Transaksi Hari Ini
                    </x-side-nav-link>
                    <x-side-nav-link href="{{ route('rekap') }}" :active="request()->routeIs('rekap')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Rekap Kunjungan
                    </x-side-nav-link>
                </nav>
            </aside>

            {{-- Main Content --}}
            <main class="flex-1 bg-gray-100 h-screen">
                <nav class="bg-blue-900 shadow-lg">
                    <div class="mx-auto px-2 sm:px-6 lg:px-8">
                        <div class="relative flex items-center justify-between md:justify-end h-16">
                            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                                 {{-- Mobile Button --}}
                                <button type="button" @click="open = !open" @click.away="open = false" class="inline-flex items-center justify-center 
                                    p-2 rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>                                      
                                </button>
                            </div>
                            <div class="flex flex-1 items-center justify-center md:hidden">
                                <div class="flex flex-shrink-0 items-center">
                                    <a href="{{ route('dashboard') }}">
                                        <x-application-logo class="block h-9 w-auto fill-current text-blue-100" />
                                    </a>
                                </div>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm font-medium text-blue-100 hover:bg-blue-700 
                                            p-2 rounded-md focus:outline-none transition ease-in-out duration-200">
                                            <div>{{ Auth::user()->name }}</div>
                
                                            <div class="ml-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </nav>
                <div>
                    {{ $slot }}
                </div>
            </main>

        </div>
    </body>
</html>