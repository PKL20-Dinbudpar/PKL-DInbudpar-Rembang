<?php

namespace App\Http\Livewire;

use App\Exports\UserExport;
use App\Models\Wisata;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class DaftarUser extends Component
{
    use WithPagination;

    public $search;
    public $sortBy = 'id_wisata';
    public $sortAsc = true;
    public $userWisata;

    public $deleteConfirmation = false;
    public $addConfirmation = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'id_wisata'],
        'sortAsc' => ['except' => true],
    ];

    protected $rules = [
        'userWisata.name' => 'required|string|max:255',
        'userWisata.username' => 'required|string|max:255',
        'userWisata.password' => 'required|string|max:255',
        'userWisata.email' => 'required|string|max:255',
        'userWisata.id_wisata' => 'required',
    ];

    public function render()
    {
        $users = User::with('wisata')
        ->when($this->search, function($query){
            $query->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('username', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('id_wisata', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortBy, $this->sortAsc ? 'asc' : 'desc');

        $users = $users->paginate(10);

        $wisata = Wisata::all();

        return view('livewire.daftar-user', [
            'users' => $users,
            'wisata' => $wisata,
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

    public function deleteConfirmation($id_wisata)
    {
        $this->deleteConfirmation = $id_wisata;
        $user = User::where('id_wisata', $id_wisata)->first();
    }

    public function hapusUser(User $user)
    {
        $user->delete();
        session()->flash('message', 'Data berhasil dihapus');
        $this->deleteConfirmation = false;
    }

    public function addConfirmation()
    {
        $this->reset(['userWisata']);
        $this->resetErrorBag();
        $this->addConfirmation = true;
    }

    public function editConfirmation(User $user)
    {
        $this->resetErrorBag();
        $this->userWisata = $user;
        $this->addConfirmation = true;
    }

    public function saveUser()
    {
        $this->validate();

        if (isset($this->userWisata->id)) {
            $this->userWisata->save();
            session()->flash('message', 'Data berhasil diubah');
            $this->addConfirmation = false;
        }
        else {
            User::create($this->userWisata);
            session()->flash('message', 'Data berhasil ditambahkan');
            $this->addConfirmation = false;
        }
    }

    // public function export()
    // {
    //     return Excel::download(new UserExport, 'DaftarUser.xlsx');
    // }
}
