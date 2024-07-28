<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\Kriteria as Kriteria;
use App\Models\Kriterias;
use App\Models\Responden;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    function Index(){
        $data = Kriterias::get();

        return view('Kriteria.Index',['kriterias'=>$data]);
    }

    function Update(Request $req){;
        try{
            $query = Kriterias::where('kode_kriteria', $req->input('kode_kriteria'))->update(['nama_kriteria' => ucfirst($req->input('nama'))]);
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil Diubah');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Kriteria Penilaian Gagal Diubah');
        }
    }

    function SubKriteriaIndex(){
        $data = DB::table('sub_kriterias')
                ->join('kriterias','sub_kriterias.kode_kriteria','=','kriterias.kode_kriteria')
                ->select('sub_kriterias.*','kriterias.kode_kriteria','kriterias.nama_kriteria')
                ->get();
        $kriteria = Kriterias::get();
        $responden = Responden::get();
        // dd($data);

        return view('Kriteria.SubKriteria',[
            'data'=>$data,
            'kriteria'=>$kriteria,
            'responden'=>$responden
        ]);
    }

    function SubKriteriaInsert(Request $req){
        $kriteria = new Kriterias;
        $kriteria->kode_kriteria = strtoupper($req->kode);
        $kriteria->nama_kriteria = ucfirst($req->nama);
        $kriteria->atribut = $req->atribut;
        $kriteria->value = $req->value;

        try{
            $kriteria->save();
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil Ditambahkan');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Kriteria Penilaian Gagal Ditambahkan');
        }

    }

    function SubKriteriaUpdate(Request $req){
        // dd($req->all());
        $kriteria = SubKriteria::findOrFail($req->id);
        // $kriteria->kode_kriteria = strtoupper($req->kode);
        $kriteria->nama_sub_kriteria = ucfirst($req->nama);

        // dd($kriteria);
        try{
            $kriteria->update();
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil DiUpdate');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Kriteria Penilaian Gagal DiUpdate');
        }
    }

    function SubKriteriaDelete($id){
        $kriteria = Kriterias::findOrFail($id);
        try{
            $kriteria->delete();
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil Ditambahkan');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Kriteria Penilaian Gagal Ditambahkan');
        }
    }
    function updateBobot(Request $req){
        $data = $req->query();
        $subKriteria = SubKriteria::get();

        foreach($subKriteria as $dt){
            $kriteria = SubKriteria::findOrFail($dt->id);
            $kriteria->total_responden = $data[$dt->id]['jumlah'];
            $kriteria->bobot = $data[$dt->id]['rata'];
            $kriteria->update();
        }
        return back()->with('sukses','Data Bobot Kriteria Berhasil Di Update');
    }

}
