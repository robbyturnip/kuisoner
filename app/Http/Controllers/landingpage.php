<?php

namespace App\Http\Controllers;

use View;
use DB;
use App\ModelPenilaian;
use Illuminate\Http\Request;

class landingpage extends Controller
{
    public function home(){
        $data = DB::table('fasilitas')
        ->select('penunjang_fasilitas.id_penunjang_fasilitas','fasilitas.fasilitas','penunjang.penunjang')
        ->join('penunjang_fasilitas','penunjang_fasilitas.id_fasilitas','=','fasilitas.id_fasilitas')
        ->join('penunjang','penunjang.id_penunjang','=','penunjang_fasilitas.id_penunjang')
        ->orderBy('fasilitas.id_fasilitas','ASC')
        ->orderBy('penunjang.id_penunjang','ASC')
        ->get();
        
        $data_nilai = ModelPenilaian::all();
       
        return View::make('index')->with('data',$data)->with('data_nilai',$data_nilai);
    }
}
