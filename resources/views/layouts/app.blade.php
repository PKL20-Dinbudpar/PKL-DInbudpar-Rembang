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
        <div class="relative min-h-screen md:flex" x-data="{ open: false }">
            {{-- Sidebar --}}
            <aside :class="{ '-translate-x-full': !open }" class="fixed md:sticky h-screen z-10 bg-sidebar text-white w-64 px-2 py-4 inset-y-0 
                left-0 transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
                {{-- Application Logo --}}
                <div class="flex items-center justify-between px-2 pb-3">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('dinas-home') }}">
                            <x-application-logo class="inline h-9 w-auto pr-2"/ />
                            <span class="text-2xl font-extrabold">SIP KuWi</span>
                        </a>
                    </div>
                    <button type="button" @click=" open = !open " class="md:hidden inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-green3
                        focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Navigation Link --}}
                @if (Auth::user()->role = 'dinas')
                    <x-side-dinas></x-side-dinas>
                @elseif (Auth::user()->role = 'wisata')
                    <x-side-wisata></x-side-wisata>
                @endif
            </aside>
            
            {{-- Main Content --}}
            <main class="flex-1 bg-main">
                {{-- Header --}}
                <header class="">
                    <nav class="bg-navigation shadow-lg">
                        <div class="mx-auto px-2 sm:px-6 lg:px-8">
                            <div class="relative flex items-center justify-between md:justify-end h-16">
                                <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                                     {{-- Mobile Button --}}
                                    <button type="button" @click="open = !open" @click.away="open = false" class="inline-flex items-center justify-center 
                                        p-2 rounded-md text-white hover:bg-hover focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                        </svg>                                      
                                    </button>
                                </div>
                                <div class="flex flex-1 items-center justify-center md:hidden">
                                    <div class="flex flex-shrink-0 items-center">
                                        <a href="{{ route('dinas-home') }}">
                                            <x-application-logo class="block h-9 w-auto" />
                                        </a>
                                    </div>
                                </div>
                                <div class="absolute inset-y-0 right-0 flex items-center">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="flex items-center text-sm font-medium text-white hover:bg-hover
                                                p-2 rounded-md focus:outline-none transition ease-in-out duration-200">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </div>
                    
                                                <div class="ml-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                    
                                        <x-slot name="content">
                                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 bg-white
                                                focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                Halo, <b>{{ Auth::user()->name }}</b>
                                            </div>
                                            <x-dropdown-link :href="route('profile.edit')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pr-2 inline w-8 h-8">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg>
                                                {{ __('Profile') }}
                                            </x-dropdown-link>
                    
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                    
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pr-2 inline w-8 h-8">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                                    </svg>                                                  
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>

                <div>
                    {{ $slot }}
                </div>
            </main>

        </div>
    </body>
</html>
