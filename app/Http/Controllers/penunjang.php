<?php

namespace App\Http\Controllers;


use View;
use DB;
use App\ModelPenunjang;
use App\ModelFasailitas;
use App\ModelPenunjang_Fasilitas;
use Illuminate\Http\Request;

class penunjang extends Controller
{
    public function home(){

    $penunjang = DB::table('penunjang')->get();

    return View::make('myadmin.content.penunjang')->with('data',$penunjang);
    }

    public function add(Request $request){

        $this->validate($request, [
            'penunjang' => 'required'
        ]);

        $penunjang = $request->penunjang;
        
        $penunjang_model = ModelPenunjang::where('penunjang',$penunjang)->first();

        if($penunjang_model){
            return redirect('\penunjang')->with('alert','Penunjang sudah ada');
        }
        else{
            $penunjang_model = new ModelPenunjang;
            $penunjang_model->penunjang = $penunjang;
            $penunjang_model->save();

            return redirect('\penunjang')->with('alert-success','Berhasil tambah penunjang');
        }
        
    }

    public function edit(Request $request){

        $this->validate($request, [
            'id_penunjang' => 'required',
            'penunjang_before' => 'required',
            'penunjang' => 'required'
        ]);
        
        $id_penunjang = $request->id_penunjang;
        $penunjang_before = $request->penunjang_before;
        $penunjang = $request->penunjang;
        $data = $request->all();

        $penunjang_model = ModelPenunjang::where('penunjang',$penunjang)
                        ->where('penunjang','!=',$penunjang_before)
                        ->first();

        if($penunjang_model){
            return redirect('\penunjang')->with('alert','Penunjang sudah ada');
        }
        else{
            $penunjang_model = ModelPenunjang::where('id_penunjang',$id_penunjang);
            $penunjang_model->update(array('penunjang' => $penunjang));

            return redirect('\penunjang')->with('alert-success','Berhasil ubah penunjang');
        }
        
    }

    public function delete(Request $request){

        $this->validate($request, [
            'id_penunjang' => 'required'
        ]);
        
        $id_penunjang = $request->id_penunjang;
        $penunjang_model = DB::table('penunjang')->where('id_penunjang',$id_penunjang);
        $penunjang_model->delete();

        return 'succes';
    }
}
