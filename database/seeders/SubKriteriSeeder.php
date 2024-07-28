<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Seeder;

class SubKriteriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objSubkriteria = array(
            array('K01','Tata Letak Menu','C01'),
            array('K01','Layanan Pelanggan','C02'),
            array('K01','Panduan pengguna','C03'),
            array('K02','Jenis Transaksi','C04'),
            array('K02','Fitur pencarian dan filter','C05'),
            array('K02','Merchant', 'C06'),
            array('K02','Promosi & Diskon','C07'),
            array('K03','Otentikasi Dua Faktor','C08'),
            array('K03','Sandi Biometric','C09'),
            array('K03','Perlindungan Lembaga Negara','C10'),
            array('K03','Kebijakan Privasi','C11'),
            array('K04','Biaya Admin','C12')
        );
        $count = count($objSubkriteria);

        for($i=0; $i<=$count-1; $i++ ){
            $subKriteria = new SubKriteria();
            $subKriteria->kode_kriteria = $objSubkriteria[$i][0];
            $subKriteria->nama_sub_kriteria = $objSubkriteria[$i][1];
            $subKriteria->kode_sub_kriteria = $objSubkriteria[$i][2];
            $subKriteria->save();
        }
    }
}
