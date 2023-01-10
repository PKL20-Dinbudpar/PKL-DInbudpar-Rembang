<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap', function (Blueprint $table) {
            $table->id('id_rekap');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_wisata');
            $table->integer('jumlah_pengunjung');
            $table->integer('total_pendapatan');

            $table->foreign('id_wisata', 'fk_rekap_wisata')->references('id_wisata')->on('wisata');

            $table->unique(['tanggal', 'id_wisata']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap');
    }
};
