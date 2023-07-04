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
        Schema::create('leader_outlet', function (Blueprint $table) {
            $table->string('ID_Leader', 20)->primary();
            $table->string('Nama_Leader', 50)->nullable();
            $table->string('Tempat_Lahir_Leader', 50)->nullable();
            $table->date('Tanggal_Lahir_Leader')->nullable();
            $table->enum('Jenis_Kelamin_Leader', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->text('Alamat_Leader')->nullable();
            $table->string('Nomor_Telepon_Leader',20)->nullable();
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
        Schema::dropIfExists('leader_outlet');
    }
};
