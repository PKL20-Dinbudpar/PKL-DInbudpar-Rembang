<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Wisata extends Model
{
    use HasFactory;
    use Sortable;

    // Table
    protected $table = 'wisata';
    protected $primaryKey = 'id_wisata';
    protected $fillable = ['nama_wisata', 'alamat', 'id_kecamatan'];

    // Timestamp
    public $timestamps = false;

    // public $sortable = ['nama_wisata', 'alamat', 'kecamatan.nama_kecamatan'];
    public $sortable = ['nama_wisata', 'alamat', 'id_kecamatan', 'kecamatan.nama_kecamatan'];

    // Relation
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_wisata', 'id_wisata');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'id_wisata', 'id_wisata');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_wisata', 'id_wisata');
    }

    // Getter
    public function getKecamatan()
    {
        return $this->kecamatan->nama_kecamatan;
    }

    public function getNamaWisata()
    {
        return $this->nama_wisata;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function getPengguna()
    {
        return $this->pengguna->count();
    }

    public function getTiket()
    {
        return $this->tiket->count();
    }
}
