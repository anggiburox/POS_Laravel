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
        Schema::create('detail_rekap_pemasukan', function (Blueprint $table) {
            $table->increments('ID_Detail_Pemasukan');
            $table->string('ID_Pemasukan', 50)->nullable();
            $table->string('ID_Jenis_Layanan', 50)->nullable();
            $table->string('ID_Barang', 50)->nullable();
            $table->bigInteger('QTY')->nullable();
            $table->bigInteger('PCS')->nullable();
            $table->string('Harga_Barang', 50)->nullable();
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
        Schema::dropIfExists('detail_rekap_pemasukan');
    }
};