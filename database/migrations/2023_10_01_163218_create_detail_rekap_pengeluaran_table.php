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
        Schema::create('detail_rekap_pengeluaran', function (Blueprint $table) {
            $table->increments('ID_Detail_Pengeluaran');
            $table->string('ID_Rekap_Pengeluaran', 50)->nullable();
            $table->string('Nama_Barang_Pengeluaran', 50)->nullable();
            $table->bigInteger('QTY')->nullable();
            $table->string('Harga_Barang_Pengeluaran',50)->nullable();
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
        Schema::dropIfExists('detail_rekap_pengeluaran');
    }
};