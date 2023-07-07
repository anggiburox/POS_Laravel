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
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('ID_Laporan');
            $table->string('ID_Outlet', 20)->nullable();
            $table->date('Tanggal_Laporan')->nullable();
            $table->text('Barang')->nullable();
            $table->text('Pemasukan')->nullable();
            $table->text('Pengeluaran')->nullable();

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
        Schema::dropIfExists('laporan');
    }
};
