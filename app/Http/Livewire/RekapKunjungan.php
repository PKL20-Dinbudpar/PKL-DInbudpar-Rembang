<?php

namespace App\Http\Livewire;

use App\Models\Rekap;
use Livewire\Component;
use Livewire\WithPagination;

class RekapKunjungan extends Component
{
    use WithPagination;
    public $tanggal;
    public $bulan;
    public $tahun;

    public $rekapKunjungan;
    public $editConfirmation = false;

    
    protected $rules = [
        'rekapKunjungan.tanggal' => 'required',
        'rekapKunjungan.wisatawan_domestik' => 'required',
        'rekapKunjungan.wisatawan_mancanegara' => 'required',
        'rekapKunjungan.total_pendapatan' => 'required',
    ];

    // protected $casts = [
    //     'rekapKunjungan.tanggal' => 'date:Y-m-d'
    // ];
    

    public function render()
    {
        $rekap = Rekap::where('id_wisata', auth()->user()->id_wisata)
                    ->orderBy('tanggal', 'desc');

        $rekap = $rekap->paginate(10);

        return view('livewire.rekap-kunjungan', [
            'rekap' => $rekap
        ]);
    }

    public function editConfirmation(Rekap $rekap)
    {
        $this->resetErrorBag();
        $this->rekapKunjungan = $rekap;

        $this->rekapKunjungan->tanggal = $this->rekapKunjungan->tanggal->format('Y-m-d');

        $this->editConfirmation = true;
    }
}
