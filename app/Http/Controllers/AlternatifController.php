<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\guest_responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Responden;
use app\Models\Kriteria;
use App\Models\Kriterias;
use App\Models\Responden as ModelsResponden;
use App\Models\SubKriteria;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AlternatifController extends Controller
{

    function inputResponden(){
        $kriteria = Kriterias::get();
        $subkriteria = SubKriteria::get();
        $alternatif = Alternatif::get();

        return view('Alternatif.GuestResponden',[
            'kriteria'=>$kriteria,
            'sub_kriteria'=>$subkriteria,
            'alternatif'=>$alternatif
        ]);
    }

    function VerifyResponden(Request $req){
        $kriteria = Kriterias::get();
        $subkriteria = SubKriteria::get();
        $alternatif = Alternatif::get();
        $data = guest_responden::where('tanggal_lahir', $req->tanggalLahir)->where('nim', $req->nim)->get();

        return view('Alternatif.GuestRespondenEdit',[
            'kriteria'=>$kriteria,
            'sub_kriteria'=>$subkriteria,
            'alternatif'=>$alternatif,
            'data' => $data
        ]);
    }

    function Index(){
        $data = Alternatif::get();
        // dd($data);

        return view('Alternatif.Index',['alternatif'=>$data]);
    }

    function Update(Request $req){

    }

    function Reponden(){
        $data = ModelsResponden::get();

        // dd($data);

        return view('Alternatif.Responden',['data'=>$data]);
    }

    function RespondenInput(){
        $kriteria = Kriterias::get();
        $subkriteria = SubKriteria::get();
        $alternatif = Alternatif::get();

        return view('Alternatif.InputResponden',[
            'kriteria'=>$kriteria,
            'sub_kriteria'=>$subkriteria,
            'alternatif'=>$alternatif
        ]);
    }

    function RespondenInsert(Request $req){
        // dd($req->all());
        $responden = new ModelsResponden();
        $responden->nama_responden = $req->nama;
        $responden->nim = $req->nim;
        $responden->email = $req->email;
        $responden->no_hp = $req->nohp;
        $responden->angkatan = $req->angkatan;
        $responden->kelamin = $req->kelamin;
        $responden->pilihan = json_encode($req->wallet);
        $responden->alternatif1 = json_encode($req->A01);
        $responden->alternatif2 = json_encode($req->A02);
        $responden->alternatif3 = json_encode($req->A03);
        $responden->alternatif4 = json_encode($req->A04);
        $responden->alternatif5 = json_encode($req->A05);

        // dd($responden->save());
        try{
            $responden->save();
            return redirect()->route('RespondenIndex')->with('sukses', 'Data Responden Penilaian Berhasil Ditambahkan');
        }catch(\Exception $err){
            return redirect()->route('RespondenIndex')->with('failed', 'Data Responden Penilaian Gagal Ditambahkan');
        }
    }

    function RespondenEdit($id){

        $responden = ModelsResponden::findOrFail($id);
        $kriteria = Kriterias::get();
        $subkriteria = SubKriteria::get();
        $alternatif = Alternatif::get();

        // dd($responden);

        return view('Alternatif.RespondenEdit',[
            'kriteria'=>$kriteria,
            'sub_kriteria'=>$subkriteria,
            'alternatif'=>$alternatif,
            'data' =>$responden
        ]);

    }

    function RespondenUpdate(Request $req){
        $responden = ModelsResponden::findOrFail($req->id);
        $responden->nama_responden = $req->nama;
        $responden->nim = $req->nim;
        $responden->email = $req->email;
        $responden->no_hp = $req->nohp;
        $responden->angkatan = $req->angkatan;
        $responden->kelamin = $req->kelamin;
        $responden->pilihan = json_encode($req->wallet);
        $responden->alternatif1 = json_encode($req->A01);
        $responden->alternatif2 = json_encode($req->A02);
        $responden->alternatif3 = json_encode($req->A03);
        $responden->alternatif4 = json_encode($req->A04);
        $responden->alternatif5 = json_encode($req->A05);

        // dd($responden);
        try{
            $responden->update();
            return redirect()->route('RespondenIndex')->with('sukses', 'Data Responden Penilaian Berhasil Ditambahkan');
        }catch(\Exception $err){
            return redirect()->route('RespondenIndex')->with('failed', 'Data Responden Penilaian Gagal Ditambahkan');
        }
    }

    function RespondenDelete($id){
        $responden = ModelsResponden::findOrFail($id);

        try{
            $responden->delete();
            return redirect()->route('RespondenIndex')->with('sukses', 'Data Responden Penilaian Berhasil Dihapuskan');
        }catch(\Exception $err){
            return redirect()->route('RespondenIndex')->with('failed', 'Data Responden Penilaian Gagal Dihapuskan');
        }
    }

    function GuessResponden(){
        $data = guest_responden::get();
        $kriteria = Kriterias::get();
        // dd($data);

        return view('Alternatif.guestRespondenIndex',[
            'data'=>$data,
            'kriteria' => $kriteria
        ]);
    }

    function GuessRespondenView($id){
        $data = guest_responden::findOrFail($id);
        $kriteria = Kriterias::get();

        return view('Alternatif.GuestRespondenView',[
            'data'=>$data,
            'kriteria' => $kriteria
        ]);
    }

    function GuestInsert(Request $req){
        $alter["A01"] = $this->kecocokan($this->frekuensiDana());
        $alter["A02"] = $this->kecocokan($this->frekuensiGopay());
        $alter["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $alter["A04"] = $this->kecocokan($this->frekuensiOvo());
        $alter["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $data["A01"] = $this->normalisasiDana($alter);
        $data["A02"] = $this->normalisasiGopay($alter);
        $data["A03"] = $this->normalisasiShopepay($alter);
        $data["A04"] = $this->normalisasiOvo($alter);
        $data["A05"] = $this->normalisasilinkAja($alter);

        $subKriteria = SubKriteria::get();
        $alternatif = Alternatif::get();
        $arrayTerbobot = array();

        $newData['A01'] = $this->terbobot($data['A01'], $subKriteria );
        $newData['A02'] = $this->terbobot($data['A02'], $subKriteria );
        $newData['A03'] = $this->terbobot($data['A03'], $subKriteria );
        $newData['A04'] = $this->terbobot($data['A04'], $subKriteria );
        $newData['A05'] = $this->terbobot($data['A05'], $subKriteria );

        foreach($alternatif  as $al){
            $newData = array();
            $arrayTerbobot[$al->kode_alternatif][1] = round($req->C01 * $data[$al->kode_alternatif][1]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][2] = round($req->C02 * $data[$al->kode_alternatif][2]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][3] = round($req->C03 * $data[$al->kode_alternatif][3]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][4] = round($req->C04 * $data[$al->kode_alternatif][4]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][5] = round($req->C05 * $data[$al->kode_alternatif][5]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][6] = round($req->C06 * $data[$al->kode_alternatif][6]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][7] = round($req->C07 * $data[$al->kode_alternatif][7]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][8] = round($req->C08 * $data[$al->kode_alternatif][8]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][9] = round($req->C09 * $data[$al->kode_alternatif][9]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][10] = round($req->C10 * $data[$al->kode_alternatif][10]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][11] = round($req->C11 * $data[$al->kode_alternatif][11]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][12] = round($req->C12 * $data[$al->kode_alternatif][12]['normalisasi'],3);

        }

        $ideal = $this->SolusiIdeal($arrayTerbobot);

        $prefData = $this->preferensiAlternatif($data, $ideal);
        $prefAkhir = array();

        foreach($alternatif as $key=>$al){
            $prefAkhir[$key+1]['kode'] = $prefData[$al->kode_alternatif]['kode_alternatif'];
            $prefAkhir[$key+1]['preferensi']= round($prefData[$al->kode_alternatif]['positif']/($prefData[$al->kode_alternatif]['positif']+$prefData[$al->kode_alternatif]['negatif']),3);
            $prefAkhir[$key+1]['nama'] = $prefData[$al->kode_alternatif]['nama'];
        }

        usort($prefAkhir, function ($a, $b) {
            return $b['preferensi'] <=> $a['preferensi'];
        });

        $dataKr = array (
            'C01' =>$req->C01,
            'C02'=> $req->C02,
            'C03'=> $req->C03,
            'C04'=> $req->C04,
            'C05'=> $req->C05,
            'C06'=> $req->C06,
            'C07'=> $req->C07,
            'C08'=> $req->C08,
            'C09'=> $req->C09,
            'C10'=> $req->C10,
            'C11'=> $req->C11,
            'C12'=> $req->C12,
        );


        $responden = new guest_responden();
        $responden->nama_responden = $req->nama;
        $responden->nim = $req->nim;
        $responden->email = $req->email;
        $responden->no_hp = $req->nohp;
        $responden->angkatan = 0;
        $responden->kelamin = $req->kelamin;
        $responden->tanggal_lahir = $req->tgl_lahit;
        $responden->kriteria = json_encode($dataKr);
        $responden->rekomendasi = json_encode($prefAkhir);

        // dd($responden);
        $responden->save();

        try{
            $responden->save();
            return view('Alternatif.GuessResult',[
                'data'=>$responden,
                'normalisasi' =>$arrayTerbobot,
                'solusi' => $ideal,
                'subKriteria' =>$subKriteria,
                'alternatif'=> $alternatif
            ]);
        }catch(\Exception $err){
            return redirect()->route('InputResponden')->with('failed', 'Data Responden Penilaian Gagal Ditambahkan');
        }

    }

    function GuessUpdate(Request $req){
        $alter["A01"] = $this->kecocokan($this->frekuensiDana());
        $alter["A02"] = $this->kecocokan($this->frekuensiGopay());
        $alter["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $alter["A04"] = $this->kecocokan($this->frekuensiOvo());
        $alter["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $data["A01"] = $this->normalisasiDana($alter);
        $data["A02"] = $this->normalisasiGopay($alter);
        $data["A03"] = $this->normalisasiShopepay($alter);
        $data["A04"] = $this->normalisasiOvo($alter);
        $data["A05"] = $this->normalisasilinkAja($alter);

        $subKriteria = SubKriteria::get();
        $alternatif = Alternatif::get();
        $arrayTerbobot = array();

        $newData['A01'] = $this->terbobot($data['A01'], $subKriteria );
        $newData['A02'] = $this->terbobot($data['A02'], $subKriteria );
        $newData['A03'] = $this->terbobot($data['A03'], $subKriteria );
        $newData['A04'] = $this->terbobot($data['A04'], $subKriteria );
        $newData['A05'] = $this->terbobot($data['A05'], $subKriteria );

        foreach($alternatif  as $al){
            $newData = array();
            $arrayTerbobot[$al->kode_alternatif][1] = round($req->C01 * $data[$al->kode_alternatif][1]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][2] = round($req->C02 * $data[$al->kode_alternatif][2]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][3] = round($req->C03 * $data[$al->kode_alternatif][3]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][4] = round($req->C04 * $data[$al->kode_alternatif][4]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][5] = round($req->C05 * $data[$al->kode_alternatif][5]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][6] = round($req->C06 * $data[$al->kode_alternatif][6]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][7] = round($req->C07 * $data[$al->kode_alternatif][7]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][8] = round($req->C08 * $data[$al->kode_alternatif][8]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][9] = round($req->C09 * $data[$al->kode_alternatif][9]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][10] = round($req->C10 * $data[$al->kode_alternatif][10]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][11] = round($req->C11 * $data[$al->kode_alternatif][11]['normalisasi'],3);
            $arrayTerbobot[$al->kode_alternatif][12] = round($req->C12 * $data[$al->kode_alternatif][12]['normalisasi'],3);

        }

        $ideal = $this->SolusiIdeal($arrayTerbobot);

        $prefData = $this->preferensiAlternatif($data, $ideal);
        $prefAkhir = array();

        foreach($alternatif as $key=>$al){
            $prefAkhir[$key+1]['kode'] = $prefData[$al->kode_alternatif]['kode_alternatif'];
            $prefAkhir[$key+1]['preferensi']= round($prefData[$al->kode_alternatif]['positif']/($prefData[$al->kode_alternatif]['positif']+$prefData[$al->kode_alternatif]['negatif']),3);
            $prefAkhir[$key+1]['nama'] = $prefData[$al->kode_alternatif]['nama'];
        }

        usort($prefAkhir, function ($a, $b) {
            return $b['preferensi'] <=> $a['preferensi'];
        });

        $dataKr = array (
            'C01' =>$req->C01,
            'C02'=> $req->C02,
            'C03'=> $req->C03,
            'C04'=> $req->C04,
            'C05'=> $req->C05,
            'C06'=> $req->C06,
            'C07'=> $req->C07,
            'C08'=> $req->C08,
            'C09'=> $req->C09,
            'C10'=> $req->C10,
            'C11'=> $req->C11,
            'C12'=> $req->C12,
        );


        $responden = guest_responden::findOrFail($req->id);
        $responden->nama_responden = $req->nama;
        $responden->nim = $req->nim;
        $responden->email = $req->email;
        $responden->no_hp = $req->nohp;
        $responden->angkatan = 0;
        $responden->kelamin = $req->kelamin;
        $responden->tanggal_lahir = $req->tgl_lahir;
        $responden->kriteria = json_encode($dataKr);
        $responden->rekomendasi = json_encode($prefAkhir);

        // dd($responden->update());
        // $responden->save();

        try{
            $responden->update();
            return view('Alternatif.GuessResult',[
                'data'=>$responden,
                'normalisasi' =>$arrayTerbobot,
                'solusi' => $ideal,
                'subKriteria' =>$subKriteria,
                'alternatif'=> $alternatif
            ]);
        }catch(\Exception $err){
            return redirect()->route('InputResponden')->with('failed', 'Data Responden Penilaian Gagal Ditambahkan');
        }
    }

    function InputBatch(){
        return view('Alternatif.InputBatch');
    }

    function InsertBatch(Request $request){
        $subkriteria = SubKriteria::get();
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // dd(count($rows));
        $jumlah = 0;
        foreach ($rows as $index => $row) {
            // Skip the header row (index 0)
            if ($index == 0 || $index == 1) {
                continue;
            }
                            // Insert into the database
            $responden = new ModelsResponden();
            $responden->nama_responden = $row[0];
            $responden->nim = $row[1];
            $responden->email = $row[2];
            $responden->no_hp = $row[3];
            $responden->angkatan = $row[4];
            $responden->kelamin = $row[5];
            $responden->pilihan_kriteria = $row[6];
            $pilihan = explode(", ", $row[7]);
            $responden->pilihan = json_encode($pilihan);
            $dana = array();
            // dd($row[44]);
            foreach($subkriteria as $i=>$sk){
                $dana[$sk->kode_sub_kriteria] = $row[$i+8];
            }
            $responden->alternatif1 = json_encode($dana);
            $gopay = array();
            foreach($subkriteria as $i=>$sk){
                $gopay[$sk->kode_sub_kriteria] = $row[$i+20];
            }
            $responden->alternatif2 = json_encode($gopay);
            $shopeepay = array();
            foreach($subkriteria as $i=>$sk){
                $shopeepay[$sk->kode_sub_kriteria] = $row[$i+32];
            }
            $responden->alternatif3 = json_encode($shopeepay);
            $ovo = array();
            foreach($subkriteria as $i=> $sk){
                $ovo[$sk->kode_sub_kriteria] = $row[$i+44];
            }
            $responden->alternatif4 = json_encode($ovo);
            $linkaja = array();
            foreach($subkriteria as $i=>$sk){
                $linkaja[$sk->kode_sub_kriteria] = $row[$i+56];
            }
            $responden->alternatif5 = json_encode($linkaja);
            if($responden->nama_responden != null){
                // dd($responden);
                $responden->save();
            }
            $jumlah +=1;
            }
        // dd($jumlah);
        if(count($rows)-2 == $jumlah){
            return redirect()->route('RespondenIndex')->with('sukses', 'Data Batch Responden Berhasil Di Inputkan Seluruhnya sebanyak .'.$jumlah . 'Data');
        }else if(count($rows)-2 >= $jumlah){
            return back()->with('warning', 'Tidak Semua Data Di inputkan hanya '.$jumlah . "Data");
        }else{
            return back()->with('failed', 'Gagal Menyimpan Data Responden Batch');
        }
    }

    function DeleteBatch(){
        try{
            $query = DB::table('respondens')->delete();
            if($query){
                return back()->with('sukses', 'Data Responden Berhasil Dihapus');
            }else{
                return back()->with('failed', 'Data Responden Gagal Dihapus');
            }
        }catch(\Exception $err){
            return back()->with('failed', 'Data Responden Gagal Dihapus');
        }
    }

    function SAWFrekuensi(){

        $alternatif = Alternatif::get();
        $subKriteria = SubKriteria::get();
        $kriteria = Kriterias::get();

        $data['A01'] = $this->frekuensiDana();
        $data['A02'] = $this->frekuensiGopay();
        $data['A03'] = $this->frekuensiShopeePay();
        $data['A04'] = $this->frekuensiOvo();
        $data['A05'] = $this->frekuensiLinkAja();
        // dd($subKriteria);
        return view('Penghitungan.SAWFrekuensi',[
            'data' => $data,
            'alternatif' =>$alternatif,
            'subKriteria' =>$subKriteria,
            'kriteria' => $kriteria
        ]);
    }

    function frekuensiDana(){
        $responden = ModelsResponden::get();

        $subKriteria = SubKriteria::get();

        $data = [];

        foreach($subKriteria as $sk){
            for($i=1;$i<=5;$i++){
                $data[$sk->kode_sub_kriteria][$i] =0;
            }
        }

        foreach($responden as $rs){

            $kriteria = json_decode($rs->alternatif1);

            for($i=1;$i<=5;$i++){
                // $data[$sk->kode_sub_kriteria][$i] = 0;
                if($kriteria->C01 == $i){
                    $data['C01'][$i] +=1;
                }
                if($kriteria->C02 == $i){
                    $data['C02'][$i] +=1;
                }
                if($kriteria->C03 == $i){
                    $data['C03'][$i] +=1;
                }
                if($kriteria->C04 == $i){
                    $data['C04'][$i] +=1;
                }
                if($kriteria->C05 == $i){
                    $data['C05'][$i] += 1;
                }
                if($kriteria->C06 == $i){
                    $data['C06'][$i] +=1;
                }
                if($kriteria->C07 == $i){
                    $data['C07'][$i] +=1;
                }
                if($kriteria->C08 == $i){
                    $data['C08'][$i] +=1;
                }
                if($kriteria->C09 == $i){
                    $data['C09'][$i] +=1;
                }
                if($kriteria->C10 == $i){
                    $data['C10'][$i] +=1;
                }
                if($kriteria->C11 == $i){
                    $data['C11'][$i] +=1;
                }
                if($kriteria->C12 == $i){
                    $data['C12'][$i] +=1;
                }
            }
        }
        return $data;
    }

    function frekuensiGopay(){
        $responden = ModelsResponden::get();

        $subKriteria = SubKriteria::get();

        $data = [];

        foreach($subKriteria as $sk){
            for($i=1;$i<=5;$i++){
                $data[$sk->kode_sub_kriteria][$i] =0;
            }
        }

        foreach($responden as $rs){

            $kriteria = json_decode($rs->alternatif2);

            for($i=1;$i<=5;$i++){
                // $data[$sk->kode_sub_kriteria][$i] = 0;
                if($kriteria->C01 == $i){
                    $data['C01'][$i] +=1;
                }
                if($kriteria->C02 == $i){
                    $data['C02'][$i] +=1;
                }
                if($kriteria->C03 == $i){
                    $data['C03'][$i] +=1;
                }
                if($kriteria->C04 == $i){
                    $data['C04'][$i] +=1;
                }
                if($kriteria->C05 == $i){
                    $data['C05'][$i] += 1;
                }
                if($kriteria->C06 == $i){
                    $data['C06'][$i] +=1;
                }
                if($kriteria->C07 == $i){
                    $data['C07'][$i] +=1;
                }
                if($kriteria->C08 == $i){
                    $data['C08'][$i] +=1;
                }
                if($kriteria->C09 == $i){
                    $data['C09'][$i] +=1;
                }
                if($kriteria->C10 == $i){
                    $data['C10'][$i] +=1;
                }
                if($kriteria->C11 == $i){
                    $data['C11'][$i] +=1;
                }
                if($kriteria->C12 == $i){
                    $data['C12'][$i] +=1;
                }
            }
        }
        return $data;
    }

    function frekuensiShopeePay(){
        $responden = ModelsResponden::get();

        $subKriteria = SubKriteria::get();

        $data = [];

        foreach($subKriteria as $sk){
            for($i=1;$i<=5;$i++){
                $data[$sk->kode_sub_kriteria][$i] =0;
            }
        }

        foreach($responden as $rs){

            $kriteria = json_decode($rs->alternatif3);

            for($i=1;$i<=5;$i++){
                // $data[$sk->kode_sub_kriteria][$i] = 0;
                if($kriteria->C01 == $i){
                    $data['C01'][$i] +=1;
                }
                if($kriteria->C02 == $i){
                    $data['C02'][$i] +=1;
                }
                if($kriteria->C03 == $i){
                    $data['C03'][$i] +=1;
                }
                if($kriteria->C04 == $i){
                    $data['C04'][$i] +=1;
                }
                if($kriteria->C05 == $i){
                    $data['C05'][$i] += 1;
                }
                if($kriteria->C06 == $i){
                    $data['C06'][$i] +=1;
                }
                if($kriteria->C07 == $i){
                    $data['C07'][$i] +=1;
                }
                if($kriteria->C08 == $i){
                    $data['C08'][$i] +=1;
                }
                if($kriteria->C09 == $i){
                    $data['C09'][$i] +=1;
                }
                if($kriteria->C10 == $i){
                    $data['C10'][$i] +=1;
                }
                if($kriteria->C11 == $i){
                    $data['C11'][$i] +=1;
                }
                if($kriteria->C12 == $i){
                    $data['C12'][$i] +=1;
                }
            }
        }
        return $data;
    }

    function frekuensiOvo(){
        $responden = ModelsResponden::get();

        $subKriteria = SubKriteria::get();

        $data = [];

        foreach($subKriteria as $sk){
            for($i=1;$i<=5;$i++){
                $data[$sk->kode_sub_kriteria][$i] =0;
            }
        }

        foreach($responden as $rs){

            $kriteria = json_decode($rs->alternatif4);

            for($i=1;$i<=5;$i++){
                // $data[$sk->kode_sub_kriteria][$i] = 0;
                if($kriteria->C01 == $i){
                    $data['C01'][$i] +=1;
                }
                if($kriteria->C02 == $i){
                    $data['C02'][$i] +=1;
                }
                if($kriteria->C03 == $i){
                    $data['C03'][$i] +=1;
                }
                if($kriteria->C04 == $i){
                    $data['C04'][$i] +=1;
                }
                if($kriteria->C05 == $i){
                    $data['C05'][$i] += 1;
                }
                if($kriteria->C06 == $i){
                    $data['C06'][$i] +=1;
                }
                if($kriteria->C07 == $i){
                    $data['C07'][$i] +=1;
                }
                if($kriteria->C08 == $i){
                    $data['C08'][$i] +=1;
                }
                if($kriteria->C09 == $i){
                    $data['C09'][$i] +=1;
                }
                if($kriteria->C10 == $i){
                    $data['C10'][$i] +=1;
                }
                if($kriteria->C11 == $i){
                    $data['C11'][$i] +=1;
                }
                if($kriteria->C12 == $i){
                    $data['C12'][$i] +=1;
                }
            }
        }
        return $data;
    }

    function frekuensiLinkAja(){
        $responden = ModelsResponden::get();

        $subKriteria = SubKriteria::get();

        $data = [];

        foreach($subKriteria as $sk){
            for($i=1;$i<=5;$i++){
                $data[$sk->kode_sub_kriteria][$i] =0;
            }
        }

        foreach($responden as $rs){

            $kriteria = json_decode($rs->alternatif5);

            // dd($kriteria->C01);

            for($i=1;$i<=5;$i++){
                // $data[$sk->kode_sub_kriteria][$i] = 0;
                if($kriteria->C01 == $i){
                    $data['C01'][$i] +=1;
                }
                if($kriteria->C02 == $i){
                    $data['C02'][$i] +=1;
                }
                if($kriteria->C03 == $i){
                    $data['C03'][$i] +=1;
                }
                if($kriteria->C04 == $i){
                    $data['C04'][$i] +=1;
                }
                if($kriteria->C05 == $i){
                    $data['C05'][$i] += 1;
                }
                if($kriteria->C06 == $i){
                    $data['C06'][$i] +=1;
                }
                if($kriteria->C07 == $i){
                    $data['C07'][$i] +=1;
                }
                if($kriteria->C08 == $i){
                    $data['C08'][$i] +=1;
                }
                if($kriteria->C09 == $i){
                    $data['C09'][$i] +=1;
                }
                if($kriteria->C10 == $i){
                    $data['C10'][$i] +=1;
                }
                if($kriteria->C11 == $i){
                    $data['C11'][$i] +=1;
                }
                if($kriteria->C12 == $i){
                    $data['C12'][$i] +=1;
                }
            }
        }
        return $data;
    }

    function SAWKecocokan(){
        $data["A01"] = $this->kecocokan($this->frekuensiDana());
        $data["A02"] = $this->kecocokan($this->frekuensiGopay());
        $data["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $data["A04"] = $this->kecocokan($this->frekuensiOvo());
        $data["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $alternatif = Alternatif::get();
        $subKriteria = SubKriteria::get();
        $kriteria = Kriterias::get();

        return view('Penghitungan.SAWKecocokan',[
            'data' => $data,
            'alternatif' =>$alternatif,
            'subKriteria' =>$subKriteria,
            'kriteria' => $kriteria
        ]);

    }

    function kecocokan($data){
        // $data = $this->frekuensiDana();
        $subKriteria = SubKriteria::get();
        $responden = Responden::get();
        $jumlah = $responden->count();

        $newData = array();

        foreach($subKriteria as $key=>$sk){
            for($a=1;$a<=12;$a++){
                $nilai = 0;
                for($i=1;$i<=5;$i++){
                    $data[$sk->kode_sub_kriteria];
                    $nilai += $data[$sk->kode_sub_kriteria][$i] *$i;
                }
            }
            $newData[$key+1]['jumlah'] = $nilai;
            $newData[$key+1]["rata"] = $nilai/$jumlah;
        }
        // dd($newData);
        return $newData;
    }

    function SAWNormalisasi(){

        $alter["A01"] = $this->kecocokan($this->frekuensiDana());
        $alter["A02"] = $this->kecocokan($this->frekuensiGopay());
        $alter["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $alter["A04"] = $this->kecocokan($this->frekuensiOvo());
        $alter["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $data["A01"] = $this->normalisasiDana($alter);
        $data["A02"] = $this->normalisasiGopay($alter);
        $data["A03"] = $this->normalisasiShopepay($alter);
        $data["A04"] = $this->normalisasiOvo($alter);
        $data["A05"] = $this->normalisasilinkAja($alter);

        $alternatif = Alternatif::get();
        $subKriteria = SubKriteria::get();
        $kriteria = Kriterias::get();

        return view('Penghitungan.SAWNormalisasi',[
            'data' => $data,
            'alternatif' =>$alternatif,
            'subKriteria' =>$subKriteria,
            'kriteria' => $kriteria
        ]);

    }

    function normalisasiDana($data){
        $newData = array();
        for($a=1;$a<=12;$a++){
            $nilai = 0;
            if($data['A01'][$a]["rata"] > $nilai){
                $nilai = $data['A01'][$a]["rata"];
            }
            if($data['A02'][$a]["rata"] > $nilai){
                $nilai = $data['A02'][$a]["rata"];
            }
            if($data['A03'][$a]["rata"] > $nilai){
                $nilai = $data['A03'][$a]["rata"];
            }
            if($data['A04'][$a]["rata"] > $nilai){
                $nilai = $data['A04'][$a]["rata"];
            }
            if($data['A05'][$a]["rata"] > $nilai){
                $nilai = $data['A05'][$a]["rata"];
            }
            if($data['A01'][$a]["rata"] == 0){
                $newData[$a]['normalisasi'] = 0;
            }else{
                $newData[$a]['normalisasi'] = $data['A01'][$a]["rata"]/$nilai;
            }
            if($a == 12){
                if($data['A01'][$a]["rata"] < $nilai){
                    $nilai = $data['A01'][$a]["rata"];
                }
                if($data['A02'][$a]["rata"] < $nilai){
                    $nilai = $data['A02'][$a]["rata"];
                }
                if($data['A03'][$a]["rata"] < $nilai){
                    $nilai = $data['A03'][$a]["rata"];
                }
                if($data['A04'][$a]["rata"] < $nilai){
                    $nilai = $data['A04'][$a]["rata"];
                }
                if($data['A05'][$a]["rata"] < $nilai){
                    $nilai = $data['A05'][$a]["rata"];
                }
                if($data['A01'][$a]["rata"] == 0){
                    $newData[$a]['normalisasi'] = 0;
                }else{
                    $newData[$a]['normalisasi'] = $nilai/$data['A01'][$a]["rata"];
                }
            }
        }
        return $newData;
    }

    function normalisasiGopay($data){
        $newData = array();
        for($a=1;$a<=12;$a++){
            $nilai = 0;
            if($data['A01'][$a]["rata"] > $nilai){
                $nilai = $data['A01'][$a]["rata"];
            }
            if($data['A02'][$a]["rata"] > $nilai){
                $nilai = $data['A02'][$a]["rata"];
            }
            if($data['A03'][$a]["rata"] > $nilai){
                $nilai = $data['A03'][$a]["rata"];
            }
            if($data['A04'][$a]["rata"] > $nilai){
                $nilai = $data['A04'][$a]["rata"];
            }
            if($data['A05'][$a]["rata"] > $nilai){
                $nilai = $data['A05'][$a]["rata"];
            }
            // dd($nilai." = ". $data[$a]["rata"]);
            if($data['A01'][$a]["rata"] == 0){
                $newData[$a]['normalisasi'] = 0;
            }else{
                $newData[$a]['normalisasi'] = $data['A02'][$a]["rata"]/$nilai;
            }
            if($a == 12){
                if($data['A01'][$a]["rata"] < $nilai){
                    $nilai = $data['A01'][$a]["rata"];
                }
                if($data['A02'][$a]["rata"] < $nilai){
                    $nilai = $data['A02'][$a]["rata"];
                }
                if($data['A03'][$a]["rata"] < $nilai){
                    $nilai = $data['A03'][$a]["rata"];
                }
                if($data['A04'][$a]["rata"] < $nilai){
                    $nilai = $data['A04'][$a]["rata"];
                }
                if($data['A05'][$a]["rata"] < $nilai){
                    $nilai = $data['A05'][$a]["rata"];
                }
                if($data['A01'][$a]["rata"] == 0){
                    $newData[$a]['normalisasi'] = 0;
                }else{
                    // dd($data['A02'][$a]["rata"]);
                    $newData[$a]['normalisasi'] = $nilai/$data['A02'][$a]["rata"];
                }
            }
        }
        return $newData;
    }

    function normalisasiShopepay($data){
        $newData = array();
        for($a=1;$a<=12;$a++){
            $nilai = 0;
            if($data['A01'][$a]["rata"] > $nilai){
                $nilai = $data['A01'][$a]["rata"];
            }
            if($data['A02'][$a]["rata"] > $nilai){
                $nilai = $data['A02'][$a]["rata"];
            }
            if($data['A03'][$a]["rata"] > $nilai){
                $nilai = $data['A03'][$a]["rata"];
            }
            if($data['A04'][$a]["rata"] > $nilai){
                $nilai = $data['A04'][$a]["rata"];
            }
            if($data['A05'][$a]["rata"] > $nilai){
                $nilai = $data['A05'][$a]["rata"];
            }
            // dd($nilai." = ". $data[$a]["rata"]);
            if($data['A01'][$a]["rata"] == 0){
                $newData[$a]['normalisasi'] = 0;
            }else{
                $newData[$a]['normalisasi'] = $data['A03'][$a]["rata"]/$nilai;
            }
            if($a == 12){
                if($data['A01'][$a]["rata"] < $nilai){
                    $nilai = $data['A01'][$a]["rata"];
                }
                if($data['A02'][$a]["rata"] < $nilai){
                    $nilai = $data['A02'][$a]["rata"];
                }
                if($data['A03'][$a]["rata"] < $nilai){
                    $nilai = $data['A03'][$a]["rata"];
                }
                if($data['A04'][$a]["rata"] < $nilai){
                    $nilai = $data['A04'][$a]["rata"];
                }
                if($data['A05'][$a]["rata"] < $nilai){
                    $nilai = $data['A05'][$a]["rata"];
                }
                if($data['A01'][$a]["rata"] == 0){
                    $newData[$a]['normalisasi'] = 0;
                }else{
                    $newData[$a]['normalisasi'] =$nilai/ $data['A03'][$a]["rata"];
                }
            }
        }
        return $newData;
    }

    function normalisasiOvo($data){
        $newData = array();
        for($a=1;$a<=12;$a++){
            $nilai = 0;
            if($data['A01'][$a]["rata"] > $nilai){
                $nilai = $data['A01'][$a]["rata"];
            }
            if($data['A02'][$a]["rata"] > $nilai){
                $nilai = $data['A02'][$a]["rata"];
            }
            if($data['A03'][$a]["rata"] > $nilai){
                $nilai = $data['A03'][$a]["rata"];
            }
            if($data['A04'][$a]["rata"] > $nilai){
                $nilai = $data['A04'][$a]["rata"];
            }
            if($data['A05'][$a]["rata"] > $nilai){
                $nilai = $data['A05'][$a]["rata"];
            }
            // dd($nilai." = ". $data[$a]["rata"]);
            if($data['A01'][$a]["rata"] == 0){
                $newData[$a]['normalisasi'] = 0;
            }else{
                $newData[$a]['normalisasi'] = $data['A04'][$a]["rata"]/$nilai;
            }
            if($a == 12){
                if($data['A01'][$a]["rata"] < $nilai){
                    $nilai = $data['A01'][$a]["rata"];
                }
                if($data['A02'][$a]["rata"] < $nilai){
                    $nilai = $data['A02'][$a]["rata"];
                }
                if($data['A03'][$a]["rata"] < $nilai){
                    $nilai = $data['A03'][$a]["rata"];
                }
                if($data['A04'][$a]["rata"] < $nilai){
                    $nilai = $data['A04'][$a]["rata"];
                }
                if($data['A05'][$a]["rata"] < $nilai){
                    $nilai = $data['A05'][$a]["rata"];
                }
                if($data['A01'][$a]["rata"] == 0){
                    $newData[$a]['normalisasi'] = 0;
                }else{
                    $newData[$a]['normalisasi'] = $nilai/$data['A04'][$a]["rata"];
                }
            }
        }
        return $newData;
    }

    function normalisasiLinkAja($data){
        $newData = array();
        for($a=1;$a<=12;$a++){
            $nilai = 0;
            if($data['A01'][$a]["rata"] > $nilai){
                $nilai = $data['A01'][$a]["rata"];
            }
            if($data['A02'][$a]["rata"] > $nilai){
                $nilai = $data['A02'][$a]["rata"];
            }
            if($data['A03'][$a]["rata"] > $nilai){
                $nilai = $data['A03'][$a]["rata"];
            }
            if($data['A04'][$a]["rata"] > $nilai){
                $nilai = $data['A04'][$a]["rata"];
            }
            if($data['A05'][$a]["rata"] > $nilai){
                $nilai = $data['A05'][$a]["rata"];
            }
            // dd($nilai." = ". $data[$a]["rata"]);
            if($data['A01'][$a]["rata"] == 0){
                $newData[$a]['normalisasi'] = 0;
            }else{
                $newData[$a]['normalisasi'] = $data['A05'][$a]["rata"]/$nilai;
            }
            if($a == 12){
                if($data['A01'][$a]["rata"] < $nilai){
                    $nilai = $data['A01'][$a]["rata"];
                }
                if($data['A02'][$a]["rata"] < $nilai){
                    $nilai = $data['A02'][$a]["rata"];
                }
                if($data['A03'][$a]["rata"] < $nilai){
                    $nilai = $data['A03'][$a]["rata"];
                }
                if($data['A04'][$a]["rata"] < $nilai){
                    $nilai = $data['A04'][$a]["rata"];
                }
                if($data['A05'][$a]["rata"] < $nilai){
                    $nilai = $data['A05'][$a]["rata"];
                }
                if($data['A01'][$a]["rata"] == 0){
                    $newData[$a]['normalisasi'] = 0;
                }else{
                    $newData[$a]['normalisasi'] = $nilai/$data['A05'][$a]["rata"];
                }
            }
        }
        return $newData;
    }

    function TOPSISTerbobot(){
        $alter["A01"] = $this->kecocokan($this->frekuensiDana());
        $alter["A02"] = $this->kecocokan($this->frekuensiGopay());
        $alter["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $alter["A04"] = $this->kecocokan($this->frekuensiOvo());
        $alter["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $data["A01"] = $this->normalisasiDana($alter);
        $data["A02"] = $this->normalisasiGopay($alter);
        $data["A03"] = $this->normalisasiShopepay($alter);
        $data["A04"] = $this->normalisasiOvo($alter);
        $data["A05"] = $this->normalisasilinkAja($alter);

        $subKriteria = SubKriteria::get();

        $newData['A01'] = $this->terbobot($data['A01'], $subKriteria );
        $newData['A02'] = $this->terbobot($data['A02'], $subKriteria );
        $newData['A03'] = $this->terbobot($data['A03'], $subKriteria );
        $newData['A04'] = $this->terbobot($data['A04'], $subKriteria );
        $newData['A05'] = $this->terbobot($data['A05'], $subKriteria );

        $alternatif = Alternatif::get();
        $kriteria = Kriterias::get();

        // dd($newData);

        return view('Penghitungan.TOPSISNormalisasi',[
            'data' => $newData,
            'alternatif' =>$alternatif,
            'subKriteria' =>$subKriteria,
            'kriteria' => $kriteria
        ]);

    }

    function terbobot($data, $subKriteria){
        $newData = array();
        foreach($subKriteria as $key=>$sk){
            $newData[$key+1] = round($sk->bobot * $data[$key+1]['normalisasi'],3);
        }
        return $newData;
        // dd($newData);
    }

    function TOPSISSolusiIdeal(){

        $alter["A01"] = $this->kecocokan($this->frekuensiDana());
        $alter["A02"] = $this->kecocokan($this->frekuensiGopay());
        $alter["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $alter["A04"] = $this->kecocokan($this->frekuensiOvo());
        $alter["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $data["A01"] = $this->normalisasiDana($alter);
        $data["A02"] = $this->normalisasiGopay($alter);
        $data["A03"] = $this->normalisasiShopepay($alter);
        $data["A04"] = $this->normalisasiOvo($alter);
        $data["A05"] = $this->normalisasilinkAja($alter);

        $subKriteria = SubKriteria::get();


        $newData['A01'] = $this->terbobot($data['A01'], $subKriteria );
        $newData['A02'] = $this->terbobot($data['A02'], $subKriteria );
        $newData['A03'] = $this->terbobot($data['A03'], $subKriteria );
        $newData['A04'] = $this->terbobot($data['A04'], $subKriteria );
        $newData['A05'] = $this->terbobot($data['A05'], $subKriteria );

        // dd($newData);
        $ideal = $this->SolusiIdeal($newData);

        return view('Penghitungan.TOPSISSolusiIdeal',[
            'data' => $ideal,
            'subKriteria' =>$subKriteria
        ]);
    }

    function SolusiIdeal($data){
        $newData = array();

        $subKriteria = SubKriteria::get();
        $alternatif = Alternatif::get();

        $minValues = array_fill(1, 12, PHP_INT_MAX);
        $maxValues = array_fill(1, 12, PHP_INT_MIN);

        foreach ($data as $alternative) {
            foreach ($alternative as $index => $value) {
                if ($value < $minValues[$index]) {
                    $minValues[$index] = $value;
                }
                if ($value > $maxValues[$index]) {
                    $maxValues[$index] = $value;
                }
            }
        }

        foreach ($subKriteria as $keys => $sk) {
            $index = $keys + 1;

            $newData[$sk->kode_sub_kriteria]['positif'] = $maxValues[$index];
            $newData[$sk->kode_sub_kriteria]['negatif'] = $minValues[$index];

            if ($index == 12) {
                $newData[$sk->kode_sub_kriteria]['positif'] = $minValues[$index];
                $newData[$sk->kode_sub_kriteria]['negatif'] = $maxValues[$index];
            }
        }
        return $newData;
    }

    function TOPSISPreferensi(){
        $alter["A01"] = $this->kecocokan($this->frekuensiDana());
        $alter["A02"] = $this->kecocokan($this->frekuensiGopay());
        $alter["A03"] = $this->kecocokan($this->frekuensiShopeePay());
        $alter["A04"] = $this->kecocokan($this->frekuensiOvo());
        $alter["A05"] = $this->kecocokan( $this->frekuensiLinkAja());

        $data["A01"] = $this->normalisasiDana($alter);
        $data["A02"] = $this->normalisasiGopay($alter);
        $data["A03"] = $this->normalisasiShopepay($alter);
        $data["A04"] = $this->normalisasiOvo($alter);
        $data["A05"] = $this->normalisasilinkAja($alter);

        $subKriteria = SubKriteria::get();

        $newData['A01'] = $this->terbobot($data['A01'], $subKriteria );
        $newData['A02'] = $this->terbobot($data['A02'], $subKriteria );
        $newData['A03'] = $this->terbobot($data['A03'], $subKriteria );
        $newData['A04'] = $this->terbobot($data['A04'], $subKriteria );
        $newData['A05'] = $this->terbobot($data['A05'], $subKriteria );

        $ideal = $this->SolusiIdeal($newData);

        $prefData = $this->preferensiAlternatifAdmin($newData, $ideal);
        $alternatif = Alternatif::get();
        $prefAkhir = array();
        // dd($prefData);

        foreach($alternatif as $key=>$al){
            $prefAkhir[$key+1]['kode'] = $prefData[$al->kode_alternatif]['kode_alternatif'];
            $prefAkhir[$key+1]['preferensi']= round($prefData[$al->kode_alternatif]['negatif']/($prefData[$al->kode_alternatif]['positif']+$prefData[$al->kode_alternatif]['negatif']),3);
            $prefAkhir[$key+1]['nama'] = $prefData[$al->kode_alternatif]['nama'];
        }

        usort($prefAkhir, function ($a, $b) {
            return $b['preferensi'] <=> $a['preferensi'];
        });


        return view('Penghitungan.TOPSISPreferensi',[
            'data' => $prefAkhir,
            'alternatif' =>$alternatif
        ]);
    }

    function preferensiAlternatif($data, $solusi){
        // dd($data);
        $alternatif = Alternatif::get();
        $subKriteria = SubKriteria::get();
        $newData = array();
        foreach($alternatif as $key=>$dt){
            $array[$key+1]['positif'] = 0;
            $array[$key+1]['negatif'] = 0;
            foreach($subKriteria as $keys=>$sk){
                $array[$key+1]['positif'] += pow($data[$dt->kode_alternatif][$keys+1]['normalisasi']-$solusi[$sk->kode_sub_kriteria]['positif'],2);
                $array[$key+1]['negatif'] += pow($data[$dt->kode_alternatif][$keys+1]['normalisasi']-$solusi[$sk->kode_sub_kriteria]['negatif'],2);
            }
            // dd($array);
            $newData[$dt->kode_alternatif]['kode_alternatif'] = $dt->kode_alternatif;
            $newData[$dt->kode_alternatif]['nama'] = $dt->nama_alternatif;
            $newData[$dt->kode_alternatif]['positif'] = sqrt($array[$key+1]['positif']);
            $newData[$dt->kode_alternatif]['negatif'] = sqrt($array[$key+1]['negatif']);
        }

        // dd($newData);
        return $newData;
    }

    function preferensiAlternatifAdmin($data, $solusi){
        // dd($data);
        $alternatif = Alternatif::get();
        $subKriteria = SubKriteria::get();
        $newData = array();
        foreach($alternatif as $key=>$dt){
            $array[$key+1]['positif'] = 0;
            $array[$key+1]['negatif'] = 0;
            foreach($subKriteria as $keys=>$sk){
                $array[$key+1]['positif'] += pow($data[$dt->kode_alternatif][$keys+1]-$solusi[$sk->kode_sub_kriteria]['positif'],2);
                $array[$key+1]['negatif'] += pow($data[$dt->kode_alternatif][$keys+1]-$solusi[$sk->kode_sub_kriteria]['negatif'],2);
            }
            // dd($array);
            $newData[$dt->kode_alternatif]['kode_alternatif'] = $dt->kode_alternatif;
            $newData[$dt->kode_alternatif]['nama'] = $dt->nama_alternatif;
            $newData[$dt->kode_alternatif]['positif'] = sqrt($array[$key+1]['positif']);
            $newData[$dt->kode_alternatif]['negatif'] = sqrt($array[$key+1]['negatif']);
        }

        // dd($newData);
        return $newData;
    }

}
