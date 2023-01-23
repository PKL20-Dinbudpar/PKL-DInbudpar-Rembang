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
                        {{-- {{ $data->wisatawan_domestik == 0 ? " " : $data->wisatawan_domestik }} --}}
                        {{ $data->wisatawan_domestik ?? 0 }}
                    </td>
                    <td scope="row" class="px-6 py-4 text-center">
                        {{-- {{ $data->wisatawan_mancanegara == 0 ? " " : $data->wisatawan_mancanegara }} --}}
                        {{ $data->wisatawan_mancanegara ?? 0 }}
                    </td>
                    <td scope="row" class="px-6 py-4 text-center">
                        {{-- {{ $data->total_pendapatan == 0 ? " " : $data->total_pendapatan }} --}}
                        {{ $data->total_pendapatan ?? 0 }}
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