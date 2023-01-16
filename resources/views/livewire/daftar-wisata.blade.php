<div class="p-6 text-gray-900">

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
    
    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
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
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                        {{-- <a href="#" class="font-medium text-red-600 hover:underline">Hapus</a> --}}
                        <x-jet-danger-button wire:click="deleteConfirmation({{ $objek->id_wisata }})" wire:loading.attr="disabled">
                            {{ __('Hapus') }}
                        </x-jet-danger-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="mt-4">
            {{ $wisata->links() }}
        </div>

        <!-- Delete Wisata Confirmation Modal -->
        <x-jet-dialog-modal wire:model="deleteConfirmation">
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
        </x-jet-dialog-modal>
    </div>

</div>

