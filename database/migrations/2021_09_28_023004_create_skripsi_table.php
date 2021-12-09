<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkripsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skripsi', function (Blueprint $table) {
            $table->bigIncrements('id_skripsi');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->date('mulai_bimbingan')->nullable();
            $table->date('selesai_bimbingan')->nullable();
            $table->string('aprrove')->default(0);
            $table->string('publish')->default(0);
            $table->unsignedBigInteger('pembimbing1')->nullable();
            $table->unsignedBigInteger('pembimbing2')->nullable();
            $table->unsignedBigInteger('penguji1')->nullable();
            $table->unsignedBigInteger('penguji2')->nullable();
            $table->unsignedBigInteger('penguji3')->nullable();
            $table->text('judul_indo')->nullable();
            $table->text('judul_eng')->nullable();
            $table->text('abstrak_indo')->nullable();
            $table->text('abstrak_eng')->nullable();
            $table->text('kata_kunci')->nullable();
            $table->text('daftar_pustaka')->nullable();
            $table->string('nilai_angka')->nullable();
            $table->string('nilai_huruf')->nullable();
            $table->text('slug')->nullable();
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('pembimbing1')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('pembimbing2')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('penguji1')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('penguji2')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('penguji3')->references('id_dosen')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skripsis');
    }
}
