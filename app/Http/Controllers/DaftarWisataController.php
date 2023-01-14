<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        if (!empty($cari)) {
            $wisata = Wisata::with('kecamatan')
                            ->sortable()
                            ->leftjoin('kecamatan', 'wisata.id_kecamatan', '=', 'kecamatan.id_kecamatan')
                            ->where('nama_wisata', 'like', "%$cari%")
                            ->orWhere('alamat', 'like', "%$cari%")
                            ->orWhere('kecamatan.nama_kecamatan', 'like', "%$cari%")
                            ->get();
        }
        else {
            $wisata = Wisata::with('kecamatan')->sortable()->get();
        }

        // $wisata = Wisata::with('kecamatan')->sortable()->get();

        return view('dinas.wisata-dinas', ['wisata' => $wisata, 'cari' => $cari]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
