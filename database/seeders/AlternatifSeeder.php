<?php

namespace Database\Seeders;

use App\Models\Alternatifs;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $al = new Alternatifs();
        $al->nama_alternatif = 'Dana';
        $al->kode_alternaitf = 'A01';
        $al->preferensi = '0';
        $al->save;

        $al = new Alternatifs();
        $al->nama_alternatif = 'Gopay';
        $al->kode_alternaitf = 'A02';
        $al->preferensi = '0';
        $al->save;

        $al = new Alternatifs();
        $al->nama_alternatif = 'ShopeePay';
        $al->kode_alternaitf = 'A03';
        $al->preferensi = '0';
        $al->save;

        $al = new Alternatifs();
        $al->nama_alternatif = 'Ovo';
        $al->kode_alternaitf = 'A04';
        $al->preferensi = '0';
        $al->save;

        $al = new Alternatifs();
        $al->nama_alternatif = 'Link Aja';
        $al->kode_alternaitf = 'A05';
        $al->preferensi = '0';
        $al->save;
    }
}
