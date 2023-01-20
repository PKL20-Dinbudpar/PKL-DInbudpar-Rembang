<div class="p-6 text-gray-900">
    <div class="flex flex-col">
        <div class="flex flex-row">
            <div class="flex flex-col w-1/2">
                <label for="bulan" class="text-sm font-medium text-gray-700">Bulan</label>
                <select wire:model.difer="bulan" id="bulan" name="bulan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Pilih Bulan</option>
                    <option value="1" @selected(date('m') == 1)>Januari</option>
                    <option value="2" @selected(date('m') == 2)>Februari</option>
                    <option value="3" @selected(date('m') == 3)>Maret</option>
                    <option value="4" @selected(date('m') == 4)>April</option>
                    <option value="5" @selected(date('m') == 5)>Mei</option>
                    <option value="6" @selected(date('m') == 6)>Juni</option>
                    <option value="7" @selected(date('m') == 7)>Juli</option>
                    <option value="8" @selected(date('m') == 8)>Agustus</option>
                    <option value="9" @selected(date('m') == 9)>September</option>
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
            <x-jet-button class="mt-4 bg-green-700 hover:bg-green-600">
                {{ __('Export Excel') }}
            </x-jet-button>
        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left text-gray-600">
                <col>
                <col>
                @foreach ($tanggal as $hari)
                    <colgroup span="3"></colgroup>
                @endforeach
                <col>
                <col>
                <thead class="text-xs text-gray-700 bg-gray-300 text-center">
                    <tr>
                        <th scope="col" rowspan="2" class="px-2 py-3">
                            No
                        </th>
                        <th scope="col" rowspan="2" class="px-6 py-3">
                            Nama Objek Wisata
                        </th>
                        @foreach ($tanggal as $hari)
                            <th scope="col" colspan="3" class="px-6 pt-3 ">
                                {{ $hari->tanggal->format('d M Y') }}
                            </th>
                        @endforeach
                        <th scope="col" rowspan="2" class="px-6 py-3">
                            Total Pengunjung
                        </th>
                        <th scope="col" rowspan="2" class="px-6 py-3">
                            Total Pendapatan
                        </th>
                    </tr>
                    <tr>
                        @foreach ($tanggal as $hari)

                            <th scope="col" class="px-2 py-3">
                                WisNus
                            </th>
                            <th scope="col" class="px-2 py-3">
                                WisMan
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Pendapatan
                            </th>
                        @endforeach

                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisata as $objek)
                    <tr class="bg-white border-b hover:bg-gray-200">
                        <td scope="row" class="px-6 py-4  text-center">
                            {{ $loop->iteration }}
                        </td>
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $objek->nama_wisata }}
                            @php
                                $totalWisatawan = 0;
                                $totalPendapatan = 0;
                            @endphp
                        </th>
                        @foreach ($rekap as $data)
                            @if ($data->id_wisata == $objek->id_wisata)
                                @php
                                    $totalWisatawan += $data->wisatawan_domestik + $data->wisatawan_mancanegara;
                                    $totalPendapatan += $data->total_pendapatan;
                                @endphp
                                <td scope="row" class="px-6 py-4 text-center">
                                    {{ $data->wisatawan_domestik == 0 ? " " : $data->wisatawan_domestik }}
                                </td>
                                <td scope="row" class="px-6 py-4 text-center">
                                    {{ $data->wisatawan_mancanegara == 0 ? " " : $data->wisatawan_mancanegara }}
                                </td>
                                <td scope="row" class="px-6 py-4 text-center">
                                    {{ $data->total_pendapatan == 0 ? " " : $data->total_pendapatan }}
                                </td>
                            {{-- @else
                                <td scope="row" class="px-6 py-4 text-center"></td>
                                <td scope="row" class="px-6 py-4 text-center"></td>
                                <td scope="row" class="px-6 py-4 text-center"></td> --}}
                            @endif
                        @endforeach
                        @if ($totalWisatawan > 0 || $totalPendapatan > 0)
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $totalWisatawan == 0 ? " " : $totalWisatawan }}
                            </td>
                            <td scope="row" class="px-6 py-4 text-center">
                                {{ $totalPendapatan == 0 ? " " : $totalPendapatan }}
                            </td>
                        @else
                            <td scope="row" class="px-6 py-4 text-center"></td>
                            <td scope="row" class="px-6 py-4 text-center"></td>
                        @endif
                    </tr> 
                    @endforeach
                </tbody>
            </table>
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
