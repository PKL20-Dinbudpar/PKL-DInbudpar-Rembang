<?php

namespace App\Http\Livewire;

use App\Models\Rekap;
use App\Models\Wisata;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
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

        $columnChartModel = (new ColumnChartModel())
                    ->setTitle('Expenses by Type')
                    ->addColumn('Food', 100, '#f6ad55')
                    ->addColumn('Shopping', 200, '#fc8181')
                    ->addColumn('Travel', 300, '#90cdf4')
                ;
                
        return view('livewire.rekap-kunjungan', [
            'rekap' => $rekap,
            'tanggal' => $tanggal,
            'wisata' => $wisata,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
