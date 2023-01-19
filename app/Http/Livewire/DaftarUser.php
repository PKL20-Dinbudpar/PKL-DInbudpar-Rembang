<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class DaftarUser extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::all()->paginate(10);

        // $user = $user->paginate(10);
        return view('livewire.daftar-user', [
            'users' => $users,
        ]);
    }
}
