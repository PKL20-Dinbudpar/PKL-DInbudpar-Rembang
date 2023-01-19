<?php

namespace Database\Seeders;

use App\Models\Rekap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rekap = [
            [
                'tanggal' => '2023-01-01',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
            [
                'tanggal' => '2023-01-02',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
            [
                'tanggal' => '2023-01-03',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
            [
                'tanggal' => '2023-01-04',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
            [
                'tanggal' => '2023-01-05',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
            [
                'tanggal' => '2023-01-06',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
            [
                'tanggal' => '2023-01-07',
                'id_wisata' => 1,
                'wisatawan_domestik' => 100,
                'wisatawan_mancanegara' => 50,
                'total_pendapatan' => 1000000,
            ],
        ];

        foreach ($rekap as $data) {
            Rekap::create($data);
        }
    }
}
