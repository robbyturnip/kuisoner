<?php

namespace App\Http\Controllers;

use View;
use DB;
use App\ModelPenilaian;
use Illuminate\Http\Request;

class penilaian extends Controller
{
    public function home(){
        $penilaian = ModelPenilaian::all();
        return View::make('myadmin.content.penilaian')->with('data',$penilaian);
    }

    public function add(Request $request){

        $this->validate($request, [
            'kode_nilai' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required'
        ]);

        $kode_nilai = $request->kode_nilai;
        $nilai = $request->nilai;
        $keterangan = $request->keterangan;

        $penilaian = ModelPenilaian::where('nilai',$nilai)
                                    ->orWhere('kode_nilai',$kode_nilai)
                                    ->first();

        if($penilaian){
            return redirect('\penilaian')->with('alert','Nilai sudah ada');
        }
        else{
            $penilaian = new ModelPenilaian;
            $penilaian->kode_nilai = $kode_nilai;
            $penilaian->nilai = $nilai;
            $penilaian->keterangan = $keterangan;
            $penilaian->save();

            return redirect('\penilaian')->with('alert-success','Berhasil tambah nilai');
        }
    }

    public function edit(Request $request){

        $this->validate($request, [
            'id_penilaian' => 'required',
            'kode_nilai_before' => 'required',
            'kode_nilai' => 'required',
            'nilai_before' => 'required',
            'nilai' => 'required',
            'keterangan_before' => 'required',
            'keterangan' => 'required'
        ]);
        
        $kode_nilai = $request->kode_nilai;
        $kode_nilai_before = $request->kode_nilai_before;
        $nilai = $request->nilai;
        $nilai_before = $request->nilai_before;
        $keterangan = $request->keterangan;
        $keterangan_before = $request->keterangan_before;
        $id_penilaian = $request->id_penilaian;
        $data = $request->all();

        $fasility = ModelPenilaian::where('kode_nilai',$kode_nilai)
                        ->where('kode_nilai','!=',$kode_nilai_before)
                        ->where(function($or) use($nilai_before,$nilai){
                            $or->where('nilai', $nilai)
                                ->Where('nilai','!=',$nilai_before);
                        })
                        ->first();

        if($fasility){
            return redirect('\penilaian')->with('alert','Fasilitas sudah ada');
        }
        else{

            $fasility = ModelPenilaian::where('id_penilaian',$id_penilaian);
            $fasility->update(array('kode_nilai' => $kode_nilai,'nilai'=> $nilai,'keterangan'=>$keterangan));

            return redirect('\penilaian')->with('alert-success','Berhasil ubah nilai');
        }
        
    }

    public function delete(Request $request){

        $this->validate($request, [
            'kode_nilai' => 'required'
        ]);
        
        $kode_nilai = $request->kode_nilai;
        $penilaian = DB::table('penilaian')->where('kode_nilai',$kode_nilai);
        $penilaian->delete();

        return 'succes';
    }
}
