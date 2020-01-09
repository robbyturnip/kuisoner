<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\ModelFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class fasilitas extends Controller
{
    public function home(){
        $fasilitas = ModelFasilitas::all();
        return View::make('myadmin.content.fasilitas')->with('data',$fasilitas);
    }

    public function add(Request $request){

        $this->validate($request, [
            'fasilitas' => 'required'
        ]);

        $fasilitas = $request->fasilitas;
        
        $fasility = ModelFasilitas::where('fasilitas',$fasilitas)->first();

        if($fasility){
            return redirect('\fasilitas')->with('alert','Fasilitas sudah ada');
        }
        else{
            $fasility = new ModelFasilitas;
            $fasility->fasilitas = $fasilitas;
            $fasility->save();

            return redirect('\fasilitas')->with('alert-success','Berhasil tambah fasilitas');
        }
        
    }

    public function edit(Request $request){

        $this->validate($request, [
            'id_fasilitas' => 'required',
            'fasilitas_before' => 'required',
            'fasilitas' => 'required'
        ]);
        
        $id_fasilitas = $request->id_fasilitas;
        $fasilitas_before = $request->fasilitas_before;
        $fasilitas = $request->fasilitas;
        $data = $request->all();

        $fasility = ModelFasilitas::where('fasilitas',$fasilitas)
                        ->where('fasilitas','!=',$fasilitas_before)
                        ->first();

        if($fasility){
            return redirect('\fasilitas')->with('alert','Fasilitas sudah ada');
        }
        else{
            $fasility = ModelFasilitas::where('id_fasilitas',$id_fasilitas);
            $fasility->update(array('fasilitas' => $fasilitas));

            return redirect('\fasilitas')->with('alert-success','Berhasil ubah fasilitas');
        }
        
    }

    public function delete(Request $request){

        $this->validate($request, [
            'id_fasilitas' => 'required'
        ]);
        
        $id_fasilitas = $request->id_fasilitas;
        $fasility = DB::table('fasilitas')->where('id_fasilitas',$id_fasilitas);
        $fasility->delete();

        return 'succes';
    }
}
