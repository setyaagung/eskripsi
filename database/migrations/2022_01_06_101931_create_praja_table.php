<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praja', function (Blueprint $table) {
            $table->bigIncrements('id_praja');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_dosen')->nullable();
            $table->text('judul_praja')->unique()->nullable();
            $table->text('slug')->nullable();
            $table->string('tempat_praja')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('manfaat')->nullable();
            $table->date('mulai_praja')->nullable();
            $table->date('selesai_praja')->nullable();
            $table->string('file')->nullable();
            $table->bigInteger('views')->default(0);
            $table->tinyInteger('approve')->default(1);
            $table->tinyInteger('publish')->default(0);
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('praja');
    }
}
