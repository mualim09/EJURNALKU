<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambahjurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambahjurnals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('deskripsi');
            $table->string('foto');
            $table->string('kd_guru');
            $table->string('kd_dudi');
            $table->bigInteger('usersiswa')->unsigned();
            $table->foreign('usersiswa')->references('id')->on('datasiswas')->onDelete('cascade');
            $table->string('id_jurusan');
            $table->string('student_id');
            $table->string('statusjurnal')->nullable();
            $table->string('pesanjurnal')->nullable();
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
        Schema::dropIfExists('tambahjurnals');
    }
}
