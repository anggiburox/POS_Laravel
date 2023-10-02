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
        Schema::create('rekap_pemasukan', function (Blueprint $table) {
            $table->string('ID_Pemasukan', 20)->primary();
            $table->date('Tanggal_Pemasukan')->nullable();
            $table->string('ID_Outlet', 50)->nullable();
            $table->string('ID_Pembayaran', 50)->nullable();
            $table->string('Total_Pemasukan', 50)->nullable();
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
        Schema::dropIfExists('rekap_pemasukan');
    }
};
