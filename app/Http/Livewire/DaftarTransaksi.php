<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;

class DaftarTransaksi extends Component
{
    use WithPagination;

    public function render()
    {
        $transaksi = Transaksi::with('user', 'tiket')
                    ->where('id_wisata', auth()->user()->id_wisata)
                    ->orderBy('waktu_transaksi', 'desc');

        $transaksi = $transaksi->paginate(10);

        return view('livewire.daftar-transaksi', [
            'transaksi' => $transaksi
        ]);
    }
}
