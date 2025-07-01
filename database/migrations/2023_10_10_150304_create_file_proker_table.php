<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileProkerTable extends Migration
{
    public function up()
    {
        Schema::create('file_proker', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file', 50);
            $table->string('deskripsi_file', 500);
            $table->integer('progress_ke');
            $table->string('url_file', 100);
            $table->string('status', 50);
            $table->string('messages', 500)->nullable();
            $table->unsignedBigInteger('id_proker');

            // Menambahkan kunci asing ke kolom 'id_proker' yang mengacu ke tabel 'program_kerja'
            $table->foreign('id_proker')->references('id')->on('program_kerja');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_proker');
    }
}
