<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ini Daftar Wisata Dinas") }}

                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class=""><b>Student Data</b></div>
                                <div class="">
                                    <a href="{{ route('dashboard') }}" class="">Add</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <select name="" id="">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($kecamatan as $data)
                                <option value="{{ $data->id_kecamatan }}">
                                    {{ $data->nama_kecamatan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" ">
                            <table class="border-separate border-spacing-0.5 border border-slate-500 ">
                                <thead class="bg-tahiti">
                                    <tr>
                                        <th class="border border-slate-600">No</th>
                                        <th class="border border-slate-600">Nama Objek Wisata</th>
                                        <th class="border border-slate-600">Alamat</th>
                                        <th class="border border-slate-600">Kecamatan</th>
                                        <th class="border border-slate-600">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wisata as $objek)
                                        <tr>
                                            <td class="border border-slate-700 text-center px-1">{{ $objek->id_wisata }}</td>
                                            <td class="border border-slate-700 px-1">{{ $objek->nama_wisata }}</td>
                                            <td class="border border-slate-700 px-1">{{ $objek->alamat }}</td>
                                            <td class="border border-slate-700 px-1">{{ $objek->nama_kecamatan }}</td>
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
