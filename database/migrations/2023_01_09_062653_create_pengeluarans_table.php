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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengeluaran', 50)->unique()->nullable();
            $table->string('nama_pengeluaran', 100)->nullable();
            $table->text('deskripsi_pengeluaran', 255)->nullable();
            $table->string('jumlah_pengeluaran', 50)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('aksi')->default('update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
};