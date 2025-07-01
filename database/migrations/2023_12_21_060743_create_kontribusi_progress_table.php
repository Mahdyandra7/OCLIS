<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontribusiProgressTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kontribusi_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_progress');
            $table->unsignedBigInteger('id_user');
            $table->integer('nilai_pic');
            $table->integer('nilai_head');

            $table->foreign('id_progress')->references('id')->on('file_proker');
            $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kontribusi_progress');
    }
};