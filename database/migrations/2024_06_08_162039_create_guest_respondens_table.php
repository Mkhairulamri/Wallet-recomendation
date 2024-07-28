<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestRespondensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_respondens', function (Blueprint $table) {
            $table->id();
            $table->string('nim',12);
            $table->string('nama_responden');
            $table->date('tanggal_lahir');
            $table->string('angkatan',4);
            $table->string('email',50);
            $table->string('no_hp');
            $table->string('kelamin');
            $table->json('kriteria');
            $table->json('rekomendasi');
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
        Schema::dropIfExists('guest_respondens');
    }
}
