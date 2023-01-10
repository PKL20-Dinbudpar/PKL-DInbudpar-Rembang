<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    // Table
    protected $table = 'rekap';
    protected $primaryKey = 'id_rekap';
    protected $fillable = ['tanggal', 'id_wisata', 'jumlah_pengunjung', 'total_pendapatan'];

    // Timestamp
    public $timestamps = false;

    // Relation
    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id_wisata');
    }

    // Getter
    public function getTanggal()
    {
        return $this->tanggal;
    }

    public function getWisata()
    {
        return $this->wisata->nama_wisata;
    }

    public function getJumlahPengunjungHarian()
    {
        return $this->jumlah_pengunjung;
    }

    public function getJumlahPengunjungBulanan()
    {
        return $this->whereMonth('tanggal', date('Y-m'))->sum('jumlah_pengunjung');
    }

    public function getJumlahPengunjungTahunan()
    {
        return $this->whereYear('tanggal', date('Y'))->sum('jumlah_pengunjung');
    }

    public function numberFormat($value)
    {
        return number_format($value, 0, ',', '.');
    }

    public function getTotalPendapatanHarian()
    {
        return $this->numberFormat($this->total_pendapatan);
    }

    public function getTotalPendapatanBulanan()
    {
        return $this->numberFormat($this->whereMonth('tanggal', date('Y-m'))->sum('total_pendapatan'));
    }

    public function getTotalPendapatanTahunan()
    {
        return $this->numberFormat($this->whereYear('tanggal', date('Y'))->sum('total_pendapatan'));
    }
}
