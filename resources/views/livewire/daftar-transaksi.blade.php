<div class="p-6 text-gray-900">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 bg-gray-300 text-center">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Transaksi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penanggung Jawab
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Tiket
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pendapatan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $data)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-4 text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->waktu_transaksi }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->user->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->tiket->nama_tiket }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->jumlah_tiket }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $data->total_pendapatan }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $transaksi->links() }}
        </div>
    </div>
</div>
