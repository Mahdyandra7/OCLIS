<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKementrianTable extends Migration
{
    public function up()
    {
        Schema::create('kementrian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kementrian', 50);
            $table->string('deskripsi', 500)->nullable();
            $table->integer('periode');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kementrian');
    }
}
