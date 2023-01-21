<div class="p-6 text-gray-900">
    <div class="flex flex-col">
        <div class="flex flex-row">
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
            @include("livewire.tables.tabel-rekap-tahunan")
        </div>
    @else
        @if ($tahun != "")
            <div class="flex justify-center items-center h-20">
                <p class="text-gray-500">Tidak ada Data</p>
            </div>
        @else
            <div class="flex justify-center items-center h-20">
                <p class="text-gray-500">Pilih Tahun</p>
            </div>
        @endif
    @endif
</div>
