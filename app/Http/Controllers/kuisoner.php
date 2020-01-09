<?php

namespace App\Http\Controllers;

use View;
use DB;
use App\ModelKuisoner;
use Illuminate\Http\Request;

class kuisoner extends Controller
{
    public function home(){
        $kuisoner = ModelKuisoner::select('id_kuisoner')->distinct()->get();
        return View::make('myadmin.content.kuisoner')->with('data',$kuisoner);
    }

    public function add(Request $request){
        $id_kuisoner = DB::select('SELECT id_kuisoner FROM kuisoner');

        if(!$id_kuisoner)
            $id_kuisoner = 1;
        else
            $id_kuisoner = (int)$id_kuisoner+1;

        $id_penunjang_fasilitas = $request->input['penunjang_fasilitas'];
        $id_penilaian = $request->input['nilai'];
        foreach($id_penunjang_fasilitas as $key=>$value){
            
            $new_id_penunjang_fasilitas = $id_penunjang_fasilitas[$key];
            $new_id_penilaian = $id_penilaian[$key];

            $kuisoner = ModelKuisoner::where('id_penunjang_fasilitas',$new_id_penunjang_fasilitas)
                                    ->where('id_penilaian',$new_id_penilaian)
                                    ->where('id_kuisoner',$new_id_penilaian)
                                    ->first();

            if($kuisoner){
                return View::make('index')->with('alert','Kuisoner sudah ada');
            }
            else{

                $kuisoner = new ModelKuisoner;
                $kuisoner->id_penunjang_fasilitas = $new_id_penunjang_fasilitas;
                $kuisoner->id_penilaian = $new_id_penilaian;
                $kuisoner->id_kuisoner = $id_kuisoner;
                error_log($kuisoner);
                $kuisoner->save();

            }
        }
        return redirect('/');
        
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
            'id_kuisoner' => 'required'
        ]);
        
        $id_kuisoner = $request->id_kuisoner;
        $kuisoner = DB::table('kuisoner')->where('id_kuisoner',$id_kuisoner);
        $kuisoner->delete();

        return 'succes';
    }
}
