<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_role', 50);
            $table->integer('periode');
            $table->unsignedBigInteger('id_kementrian');

            // Menambahkan kunci asing ke kolom 'id_kementrian' yang mengacu ke tabel 'kementrian'
            $table->foreign('id_kementrian')->references('id')->on('kementrian');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}