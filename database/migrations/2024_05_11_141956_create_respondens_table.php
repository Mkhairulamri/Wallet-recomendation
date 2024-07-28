<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondens', function (Blueprint $table) {
            $table->id();
            $table->string('nim',12);
            $table->string('nama_responden');
            $table->string('angkatan',4);
            $table->string('email',50);
            $table->string('no_hp');
            $table->string('kelamin');
            $table->string('pilihan');
            $table->json('kriteria1');
            $table->json('kriteria2');
            $table->json('kriteria3');
            $table->json('kriteria4');
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
        Schema::dropIfExists('respondens');
    }
}
