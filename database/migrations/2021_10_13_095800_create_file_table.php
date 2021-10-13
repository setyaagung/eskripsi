<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->bigIncrements('id_file');
            $table->unsignedBigInteger('id_skripsi');
            $table->string('jenis_file');
            $table->string('nama_file')->nullable();
            $table->timestamps();

            $table->foreign('id_skripsi')->references('id_skripsi')->on('skripsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
