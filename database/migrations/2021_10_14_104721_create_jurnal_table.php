<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function (Blueprint $table) {
            $table->bigIncrements('id_jurnal');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->text('judul_indo');
            $table->text('judul_eng');
            $table->text('abstrak_indo');
            $table->text('abstrak_eng');
            $table->string('keyword');
            $table->date('tanggal');
            $table->text('daftar_pustaka');
            $table->string('file');
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
        Schema::dropIfExists('jurnal');
    }
}
