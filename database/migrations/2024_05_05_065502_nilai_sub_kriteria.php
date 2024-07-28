<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NilaiSubKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sub_kriteria');
            $table->integer('id_sub_kriteria');
            $table->integer('data_sub_kriteria');
            $table->string('value_sub_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
