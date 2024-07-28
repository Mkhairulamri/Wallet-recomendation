<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = new Kriteria();
        $kriteria->kode_kriteria = "K01";
        $kriteria->nama_kriteria = "Kemudahan Penggunaan ";
        $kriteria->tipe = "Benefit";
        $kriteria->bobot = 0;
        
        $kriteria->save();

        $kriteria = new Kriteria();
        $kriteria->kode_kriteria = "K02";
        $kriteria->nama_kriteria = "Keberagaman Fitur & Merchant ";
        $kriteria->tipe = "Benefit";
        $kriteria->bobot = 0;
        $kriteria->save();

        $kriteria = new Kriteria();
        $kriteria->kode_kriteria = "K03";
        $kriteria->nama_kriteria = "Keamanan ";
        $kriteria->tipe = "Benefit";
        $kriteria->bobot = 0;
        $kriteria->save();

        $kriteria = new Kriteria();
        $kriteria->kode_kriteria = "K04";
        $kriteria->nama_kriteria = "Biaya Transaksi ";
        $kriteria->tipe = "Cost";
        $kriteria->bobot = 0;
        $kriteria->save();
    }
}
