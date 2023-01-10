<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = [
            [
                'id_kecamatan' => '010',
                'nama_kecamatan' => 'Sumber',
            ],
            [
                'id_kecamatan' => '020',
                'nama_kecamatan' => 'Bulu',
            ],
            [
                'id_kecamatan' => '030',
                'nama_kecamatan' => 'Gunem',
            ],
            [
                'id_kecamatan' => '040',
                'nama_kecamatan' => 'Sale',
            ],
            [
                'id_kecamatan' => '050',
                'nama_kecamatan' => 'Sarang',
            ],
            [
                'id_kecamatan' => '060',
                'nama_kecamatan' => 'Sedan',
            ],
            [
                'id_kecamatan' => '070',
                'nama_kecamatan' => 'Pamotan',
            ],
            [
                'id_kecamatan' => '080',
                'nama_kecamatan' => 'Sulang',
            ],
            [
                'id_kecamatan' => '090',
                'nama_kecamatan' => 'Kaliori',
            ],
            [
                'id_kecamatan' => '100',
                'nama_kecamatan' => 'Rembang',
            ],
            [
                'id_kecamatan' => '110',
                'nama_kecamatan' => 'Pancur',
            ],
            [
                'id_kecamatan' => '120',
                'nama_kecamatan' => 'Kragan',
            ],
            [
                'id_kecamatan' => '130',
                'nama_kecamatan' => 'Sluke',
            ],
            [
                'id_kecamatan' => '140',
                'nama_kecamatan' => 'Lasem',
            ],
        ];

        foreach ($kecamatan as $key => $value) {
            Kecamatan::create($value);
        }
    }
}
