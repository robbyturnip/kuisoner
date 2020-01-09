<?php

namespace App\Http\Controllers;

use View;
use DB;
use App\ModelPenunjang;
use App\ModelFasailitas;
use App\ModelPenunjang_Fasilitas;
use Illuminate\Http\Request;

class penunjang_fasilitas extends Controller
{
    public function home(){
        $penunjang = DB::table('penunjang')
        ->select('penunjang.id_penunjang','penunjang.penunjang','fasilitas.id_fasilitas','fasilitas.fasilitas')
        ->join('penunjang_fasilitas','penunjang_fasilitas.id_penunjang','=','penunjang.id_penunjang')
        ->join('fasilitas','fasilitas.id_fasilitas','=','penunjang_fasilitas.id_fasilitas')
        ->get();

        $data_fasilitas = DB::table('fasilitas')->get();

        $data_penunjang = DB::table('penunjang')->get();

        return View::make('myadmin.content.penunjang_fasilitas')->with('data',$penunjang)->with('data_fasilitas', $data_fasilitas)->with('data_penunjang',$data_penunjang);
    }

    public function add(Request $request){

        $this->validate($request, [
            'id_fasilitas' => 'required',
            'id_penunjang' => 'required'
        ]);

        $id_fasilitas = $request->id_fasilitas;
        $id_penunjang = $request->id_penunjang;

        $penunjang = ModelPenunjang_Fasilitas::where('id_fasilitas',$id_fasilitas)
                                    ->Where('id_penunjang',$id_penunjang)
                                    ->first();
        

        if($penunjang){
            return redirect('\penunjang_fasilitas')->with('alert','Penunjang sudah ada');
        }

        else{
            
            $penunjang_fasilitas = new ModelPenunjang_Fasilitas;
            $penunjang_fasilitas->id_penunjang = $id_penunjang;
            $penunjang_fasilitas->id_fasilitas = $id_fasilitas;
            $penunjang_fasilitas->save();

            return redirect('\penunjang_fasilitas')->with('alert-success','Berhasil tambah penunjang');
        }
    }

    public function edit(Request $request){

        $this->validate($request, [
            'id_fasilitas' => 'required',
            'id_penunjang' => 'required'
        ]);
        
        $id_fasilitas = $request->id_fasilitas;
        $id_penunjang = $request->id_penunjang;

        $penunjang_fasilitas = ModelPenunjang_Fasilitas::where('id_fasilitas',$id_fasilitas)
                        ->Where('id_penunjang',$id_penunjang)
                        ->first();

        if($penunjang_fasilitas){
            return redirect('\penunjang_fasilitas')->with('alert','Penunjang sudah ada');
        }
        else{

            $penunjang_fasilitas = ModelPenunjang_Fasilitas::where('id_fasilitas',$id_fasilitas)
                                                            ->where('id_fasilitas',$id_fasilitas);
            $penunjang_fasilitas->update(array('id_penunjang'=> $id_penunjang,'id_fasilitas'=> $id_fasilitas));

            return redirect('\penunjang_fasilitas')->with('alert-success','Berhasil ubah penunjang');
        }
        
    }

    public function delete(Request $request){


        $this->validate($request, [
            'id_penunjang' => 'required',
            'id_fasilitas' => 'required'
        ]);
        
        $id_penunjang = $request->id_penunjang;
        $id_fasilitas = $request->id_fasilitas;

        $penunjang = DB::table('penunjang_fasilitas')
                        ->where('id_penunjang',$id_penunjang)
                        ->where('id_fasilitas',$id_fasilitas);
        $penunjang->delete();

        return 'succes';
    }
}
