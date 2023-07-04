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
        Schema::create('finance', function (Blueprint $table) {
            $table->string('ID_Finance', 20)->primary();
            $table->string('Nama_Finance', 50)->nullable();
            $table->string('Tempat_Lahir_Finance', 50)->nullable();
            $table->date('Tanggal_Lahir_Finance')->nullable();
            $table->enum('Jenis_Kelamin_Finance', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->text('Alamat_Finance')->nullable();
            $table->string('Nomor_Telepon_Finance',20)->nullable();
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
        Schema::dropIfExists('finance');
    }
};
