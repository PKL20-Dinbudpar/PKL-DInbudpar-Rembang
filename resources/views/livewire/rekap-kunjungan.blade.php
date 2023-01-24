<div class="p-6 text-gray-900">
    {{-- dropdown tanggal bulan tahun --}}
    


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 bg-gray-300 text-center">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Wisatawan Domestik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Wisatawan Mancanegara
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pendapatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekap as $data)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-4 text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->tanggal }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->wisatawan_domestik }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->wisatawan_mancanegara }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->total_pendapatan }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <x-jet-button  wire:click="editConfirmation({{ $data->id_rekap }})" class="bg-orange-500 hover:bg-orange-400">
                                Edit
                            </x-jet-button >
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $rekap->links() }}
        </div>

        <x-jet-dialog-modal wire:model="editConfirmation">
            <x-slot name="title">
                Edit Rekap Kunjungan
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="tanggal" value="{{ __('Tanggal') }}" />
                    <x-jet-input id="tanggal" type="text" class="mt-1 block w-full" disabled wire:model.defer="rekapKunjungan.tanggal"/>
                    <x-jet-input-error for="userWisata.tanggal" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="wisnus" value="{{ __('Jumlah Wisatawan Domestik') }}" />
                    <x-jet-input id="wisnus" type="number" class="mt-1 block w-full" wire:model.defer="rekapKunjungan.wisatawan_domestik" />
                    <x-jet-input-error for="rekapKunjungan.wisatawan_domestik" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="wisman" value="{{ __('Jumlah Wisatawan Mancanegara') }}" />
                    <x-jet-input id="wisman" type="number" class="mt-1 block w-full" wire:model.defer="rekapKunjungan.wisatawan_mancanegara" />
                    <x-jet-input-error for="rekapKunjungan.wisatawan_mancanegara" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="pendapatan" value="{{ __('Total Pendapatan') }}" />
                    <x-jet-input id="pendapatan" type="number" class="mt-1 block w-full" wire:model.defer="rekapKunjungan.total_pendapatan" />
                    <x-jet-input-error for="rekapKunjungan.total_pendapatan" class="mt-2" />
                </div>
                {{-- <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="nama" value="{{ __('Nama User') }}" />
                    <x-jet-input id="nama" type="text" class="mt-1 block w-full" wire:model.defer="userWisata.name" />
                    <x-jet-input-error for="userWisata.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="username" value="{{ __('Username') }}" />
                    <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="userWisata.username" />
                    <x-jet-input-error for="userWisata.username" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="text" class="mt-1 block w-full" wire:model.defer="userWisata.password" />
                    <x-jet-input-error for="userWisata.password" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="userWisata.email" />
                    <x-jet-input-error for="userWisata.email" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="id_wisata" value="{{ __('Nama Wisata') }}" />
                    <select name="id_wisata" id="id_wisata" class="mt-1 block w-full" wire:model.defer="userWisata.id_wisata">
                        <option value="">Pilih Wisata</option>
                        @foreach ($wisata as $item)
                            <option value="{{ $item->id_wisata }}">{{ $item->nama_wisata }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="userWisata.id_wisata" class="mt-2" />
                </div> --}}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('editConfirmation', false)" wire:loading.attr="disabled">
                    {{ __('Kembali') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="saveRekap()" wire:loading.attr="disabled">
                    {{ __('Simpan') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
