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
        Schema::create('rekap_pengeluaran', function (Blueprint $table) {
            $table->string('ID_Rekap_Pengeluaran', 50)->primary();
            $table->string('ID_Pemasukan', 50)->nullable();
            $table->date('Tanggal_Pengeluaran')->nullable();
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
        Schema::dropIfExists('rekap_pengeluaran');
    }
};