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
    public $totalWisatawan;
    public $totalPendapatan;

    public $firstRun = true;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function mount()
    {
        $this->bulan = date('m');
        $this->tahun = date('Y');
    }

    public function render()
    {
        $tanggal = Rekap::with('wisata')
                ->leftjoin('wisata', 'rekap.id_wisata', '=', 'wisata.id_wisata')
                ->select('tanggal')
                ->whereMonth('tanggal', '=', $this->bulan)
                ->whereYear('tanggal', '=', $this->tahun)
                ->groupBy('tanggal')
                ->get();
        
        $rekap = Rekap::with('wisata')
                ->join('wisata', 'rekap.id_wisata', '=', 'wisata.id_wisata')
                ->whereYear('tanggal', '=', $this->tahun)
                ->whereMonth('tanggal', '=', $this->bulan)
                ->get();
        
        $wisata = Wisata::all();
        
        foreach ($wisata as $key => $value) {
            $wisata_id[] = $value->id_wisata;
            $total = Rekap::whereYear('tanggal', '=', $this->tahun)
                    ->whereMonth('tanggal', '=', $this->bulan)
                    ->whereIn('id_wisata', $wisata_id)
                    ->get();
        }

        $columnChartModel = $total->groupBy('id_wisata')
            ->reduce(function (ColumnChartModel $columnChartModel, $data) {
                $wisata_name = $data->first()->wisata->nama_wisata;
                $value = $data->sum('wisatawan_domestik') + $data->sum('wisatawan_mancanegara');
                $warna[$data->first()->wisata->nama_wisata] = '#'.dechex(rand(0x000000, 0xFFFFFF));

                return $columnChartModel->addColumn($wisata_name, $value, $warna[$wisata_name]);
            }, (new ColumnChartModel())
                ->setTitle('Jumlah Pengunjung Bulanan')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
            );
                
        return view('livewire.rekap-kunjungan', [
            'rekap' => $rekap,
            'tanggal' => $tanggal,
            'wisata' => $wisata,
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
