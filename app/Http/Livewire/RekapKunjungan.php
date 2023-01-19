<?php

namespace App\Http\Livewire;

use App\Models\Rekap;
use App\Models\Wisata;
use Livewire\Component;

class RekapKunjungan extends Component
{
    public $bulan;
    public $tahun;
    public $totalWisatawan = 0;
    public $totalPendapatan = 0;

    public function render()
    {
        $tanggal = Rekap::with('wisata')
                ->leftjoin('wisata', 'rekap.id_wisata', '=', 'wisata.id_wisata')
                ->select('tanggal')
                ->whereMonth('tanggal', '=', $this->bulan)
                ->whereYear('tanggal', '=', $this->tahun)
                ->groupBy('tanggal')
                ->get();
        
        $wisata = Wisata::all()->take(3);

        $rekap = Rekap::with('wisata')
                ->join('wisata', 'rekap.id_wisata', '=', 'wisata.id_wisata')
                ->whereYear('tanggal', '=', $this->tahun)
                ->whereMonth('tanggal', '=', $this->bulan)
                ->get();

        return view('livewire.rekap-kunjungan', [
            'rekap' => $rekap,
            'tanggal' => $tanggal,
            'wisata' => $wisata,
        ]);
    }
}
