<table class="w-full text-sm text-left text-gray-600">
    <col>
    <col>
    @foreach ($bulan as $bln)
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
            @foreach ($bulan as $bln)
                <th scope="col" colspan="3" class="px-6 pt-3 ">
                    @if ($bln->bulan == "1")
                        {{ "Januari" }}
                    @elseif($bln->bulan == "2")
                        {{ "Februari" }}
                    @elseif($bln->bulan == "3")
                        {{ "Maret" }}
                    @elseif($bln->bulan == "4")
                        {{ "April" }}
                    @elseif($bln->bulan == "5")
                        {{ "Mei" }}
                    @elseif($bln->bulan == "6")
                        {{ "Juni" }}
                    @elseif($bln->bulan == "7")
                        {{ "Juli" }}
                    @elseif($bln->bulan == "8")
                        {{ "Agustus" }}
                    @elseif($bln->bulan == "9")
                        {{ "September" }}
                    @elseif($bln->bulan == "10")
                        {{ "Oktober" }}
                    @elseif($bln->bulan == "11")
                        {{ "November" }}
                    @elseif($bln->bulan == "12")
                        {{ "Desember" }}
                    @endif
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
            @foreach ($bulan as $bln)
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