<div class="p-6 text-gray-900">
    {{-- Message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-2" role="alert" x-data="{ show: true }" x-show="show">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click=" show = false ">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    {{-- Search Table --}}
    <div class="justify-between">
        <form>   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input wire:model="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Wisata/Alamat/Kecamatan" required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
    </div>

    {{-- Button --}}
    <div class="flex justify-end">
        <x-jet-button wire:click.prevent="export" class="mt-4 mr-4 bg-green-700 hover:bg-green-600">
            {{ __('Export Excel') }}
        </x-jet-button>
        <x-jet-button wire:click="addConfirmation()" class="mt-4 bg-blue-700 hover:bg-blue-500">
            {{ __('Tambah Objek Wisata') }}
        </x-jet-button>
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        {{-- Table --}}
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            <button wire:click="sortBy('nama_wisata')">
                                Nama Objek Wisata
                            </button>
                            <x-sort-icon sortField='nama_wisata' :sort-by="$sortBy" :sort-asc="$sortAsc" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            <button wire:click="sortBy('alamat')">
                                Alamat
                            </button>
                            <x-sort-icon sortField='alamat' :sort-by="$sortBy" :sort-asc="$sortAsc" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            <button wire:click="sortBy('kecamatan.nama_kecamatan')">
                                Kecamatan
                            </button>
                            <x-sort-icon sortField='kecamatan.nama_kecamatan' :sort-by="$sortBy" :sort-asc="$sortAsc" />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisata as $objek)
                <tr class="bg-white border-b hover:bg-gray-200">
                    <th scope="row" class="px-6 py-4">
                        {{-- {{ $loop->iteration }} --}}
                        {{ $wisata->firstItem() + $loop->index }}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $objek->nama_wisata }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $objek->alamat ?? '' }}
                    </td>
                    <td class="px-6 py-4">
                        {{-- Kecamatan --}}
                        {{ $objek->kecamatan->nama_kecamatan ?? '' }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{-- <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a> --}}
                        <x-jet-button wire:click="editConfirmation({{ $objek->id_wisata }})" class="mt-4 bg-orange-500 hover:bg-orange-400">
                            {{ __('Edit') }}
                        </x-jet-button>
                        {{-- <a href="#" class="font-medium text-red-600 hover:underline">Hapus</a> --}}
                        <x-jet-danger-button wire:click="deleteConfirmation({{ $objek->id_wisata }})" wire:loading.attr="disabled">
                            {{ __('Hapus') }}
                        </x-jet-danger-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="p-4">
            {{ $wisata->links() }}
        </div>

        <!-- Delete Wisata Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="deleteConfirmation">
            <x-slot name="title">
                {{ __('Hapus Objek Wisata ') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Apa anda yakin ingin menghapus objek wisata ini?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('deleteConfirmation', false)" wire:loading.attr="disabled">
                    {{ __('Kembali') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="hapusWisata({{ $deleteConfirmation }})" wire:loading.attr="disabled">
                    {{ __('Hapus') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

        <!-- Add Wisata Form Modal -->
        <x-jet-dialog-modal wire:model="addConfirmation">
            <x-slot name="title">
                {{ isset($objWisata->id_wisata) ? __('Edit Objek Wisata ') : __('Tambah Objek Wisata ') }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="nama" value="{{ __('Nama Objek Wisata') }}" />
                    <x-jet-input id="nama" type="text" class="mt-1 block w-full" wire:model.defer="objWisata.nama_wisata" />
                    <x-jet-input-error for="objWisata.nama_wisata" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="alamat" value="{{ __('Alamat (Desa)') }}" />
                    <x-jet-input id="alamat" type="text" class="mt-1 block w-full" wire:model.defer="objWisata.alamat" />
                    <x-jet-input-error for="objWisata.alamat" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="kecamatan" value="{{ __('Kecamatan') }}" />
                    <select name="kecamatan" id="kecamatan" class="mt-1 block w-full" wire:model.defer="objWisata.id_kecamatan">
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="objWisata.id_kecamatan" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('addConfirmation', false)" wire:loading.attr="disabled">
                    {{ __('Kembali') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="saveWisata()" wire:loading.attr="disabled">
                    {{ __('Simpan') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

</div>

