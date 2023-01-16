<?php

namespace App\Http\Livewire;

use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithPagination;

class DaftarWisata extends Component
{
    use WithPagination;
    public $search;
    public $sortBy = 'id_wisata';
    public $sortAsc = true;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'id_wisata'],
        'sortAsc' => ['except' => true],
    ];

    public function render()
    {
        $wisata = Wisata::with('kecamatan')
                ->leftjoin('kecamatan', 'wisata.id_kecamatan', '=', 'kecamatan.id_kecamatan')
                ->when($this->search, function($query){
                    $query->where('nama_wisata', 'like', '%'.$this->search.'%')
                        ->orWhere('alamat', 'like', '%'.$this->search.'%')
                        ->orWhere('kecamatan.nama_kecamatan', 'like', '%'.$this->search.'%');
                })
                ->orderBy($this->sortBy, $this->sortAsc ? 'asc' : 'desc');

        $wisata = $wisata->paginate(10);
        return view('livewire.daftar-wisata', [
            'wisata' => $wisata
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortBy = $field;
    }
}
