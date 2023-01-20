<div class="p-6 text-gray-900">
    <div class="flex flex-col">
        <div class="flex flex-row">
            <div class="flex flex-col w-1/2">
                <label for="bulan" class="text-sm font-medium text-gray-700">Bulan</label>
                <select wire:model.difer="bulan" id="bulan" name="bulan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Pilih Bulan</option>
                    <option value="01" @selected(date('m') == 1)>Januari</option>
                    <option value="02" @selected(date('m') == 2)>Februari</option>
                    <option value="03" @selected(date('m') == 3)>Maret</option>
                    <option value="04" @selected(date('m') == 4)>April</option>
                    <option value="05" @selected(date('m') == 5)>Mei</option>
                    <option value="06" @selected(date('m') == 6)>Juni</option>
                    <option value="07" @selected(date('m') == 7)>Juli</option>
                    <option value="08" @selected(date('m') == 8)>Agustus</option>
                    <option value="09" @selected(date('m') == 9)>September</option>
                    <option value="10" @selected(date('m') == 10)>Oktober</option>
                    <option value="11" @selected(date('m') == 11)>November</option>
                    <option value="12" @selected(date('m') == 12)>Desember</option>
                </select>
            </div>
            <div class="flex flex-col w-1/2">
                <label for="tahun" class="text-sm font-medium text-gray-700">Tahun</label>
                <select wire:model="tahun" id="tahun" name="tahun" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Pilih Tahun</option>
                    @for ($i = date('Y'); $i >= 2021; $i--)
                        <option value="{{ $i }}" @selected(date('Y') == $i)>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>

    {{-- {{ date('m') }} --}}

    @if ($rekap->count() > 0)
        {{-- Charts --}}
        <div class="" style="height: 500px">
            <livewire:livewire-column-chart
            :column-chart-model="$columnChartModel"
            />
        </div>

        {{-- Export Button --}}
        <div class="flex justify-end">
            <x-jet-button wire:click.prevent="export" class="mt-4 bg-green-700 hover:bg-green-600">
                {{ __('Export Excel') }}
            </x-jet-button>
        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            @include("livewire.tables.tabel-rekap-bulanan")
        </div>
    @else
        @if ($bulan != "" && $tahun != "")
            <div class="flex justify-center items-center h-20">
                <p class="text-gray-500">Tidak ada Data</p>
            </div>
        @else
            <div class="flex justify-center items-center h-20">
                <p class="text-gray-500">Pilih Bulan dan Tahun</p>
            </div>
        @endif
    @endif
</div>
