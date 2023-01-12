<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'dinas',
                'password' => bcrypt('dinas'),
                'name' => 'Dinas',
                'email' => 'dinas@gmail.com',
                'alamat' => 'Jl. Dinas',
                'role' => 'dinas',
            ],
            [
                'username' => 'wisata',
                'password' => bcrypt('wisata'),
                'name' => 'Wisata',
                'email' => 'wisata@gmail.com',
                'alamat' => 'Jl. Wisata',
                'role' => 'wisata',
                'id_wisata' => 999,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
