<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- Judul --}}
                    <div class="">
                        <div class=""><b>Daftar Objek Wisata</b></div>
                    </div>

                    {{-- Search and Filter --}}
                    <div class="">
                        <form method="GET">
                            <div class="flex items-center">
                                <input type="text" name="cari" id="cari" class="w-1/3" autofocus="true" placeholder="Cari Objek Wisata/Alamat/Kecamatan" 
                                value="{{ $cari }}"> 
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>                                  
                                </button>
                            </div>
                        </form>
                        {{-- <div class="">
                            <select name="" id="">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($kecamatan as $data)
                                <option value="{{ $data->id_kecamatan }}">
                                    {{ $data->nama_kecamatan }}
                                </option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    
                    {{-- Table --}}
                    <div class="">
                        <div class=" ">
                            <div class="flex">
                                <div>
                                    <button class="rounded-lg bg-silver p-2">Export Excel</button>
                                </div>
                                <div class="">
                                    <button class="rounded-lg bg-silver p-2">Tambah Objek Wisata</button>
                                </div>
                            </div>
                            <table class="border-separate border-spacing-0.5 border border-slate-500 ">
                                <thead class="bg-tahiti">
                                    <tr>
                                        <th class="border border-slate-600">No</th>
                                        <th class="border border-slate-600">@sortablelink('nama_wisata','Nama Objek Wisata')</th>
                                        <th class="border border-slate-600">@sortablelink('alamat', 'Alamat')</th>
                                        <th class="border border-slate-600">@sortablelink('kecamatan.nama_kecamatan', 'Kecamatan')</th>
                                        <th class="border border-slate-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wisata as $objek)
                                        <tr>
                                            <td class="border border-slate-700 text-center px-1">{{ $loop->iteration }}</td>
                                            <td class="border border-slate-700 px-1">{{ $objek->nama_wisata }}</td>
                                            <td class="border border-slate-700 px-1">{{ $objek->alamat }}</td>
                                            <td class="border border-slate-700 px-1">{{ $objek->kecamatan->nama_kecamatan ?? 'None' }}</td>
                                            {{-- <td class="border border-slate-700 px-1">{{ $objek->nama_kecamatan }}</td> --}}
                                            <td class="border border-slate-700 px-1">
                                                <button class="px-2 rounded-lg bg-bermuda ">Edit</button>
                                                <button class="px-2 rounded-lg bg-bermuda ">Hapus</button>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {!! $data->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- Ajax --}}
<script>
    
</script>