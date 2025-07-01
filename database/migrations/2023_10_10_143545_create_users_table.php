<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('password', 500);
            $table->integer('nim');
            $table->string('nama', 50);
            $table->string('email', 50);
            $table->integer('no_telp');
            $table->unsignedBigInteger('id_role');

            // Menambahkan kunci asing ke kolom 'id_role' yang mengacu ke tabel 'roles'
            $table->foreign('id_role')->references('id')->on('roles');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
