<?php

namespace App\Http\Controllers;

use DB;
use ModelUser;
use ModelPenilaian;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class dashboard_admin extends Controller
{

    public function home(){
        try {
            $title = "";
            $data = DB::table('kuisoner')
            ->select('fasilitas.fasilitas','penunjang.penunjang','penilaian.keterangan',DB::raw('count(penilaian.kode_nilai) as total'))
            ->join('penunjang_fasilitas','penunjang_fasilitas.id_penunjang_fasilitas','=','kuisoner.id_penunjang_fasilitas')
            ->join('penunjang','penunjang.id_penunjang','=','penunjang_fasilitas.id_penunjang')
            ->join('fasilitas','fasilitas.id_fasilitas','=','penunjang_fasilitas.id_fasilitas')
            ->join('penilaian','penilaian.id_penilaian','=','kuisoner.id_penilaian')
            ->groupBy('fasilitas.fasilitas','penunjang.penunjang','penilaian.keterangan')
            ->orderBy('fasilitas.fasilitas')
            ->orderBy('penunjang.penunjang')
            ->orderBy('penilaian.keterangan')
            ->get();
            // error_log(json_encode($data));
        } catch (\Exception $e) {
            error_log($e);
        }
        try{
            $list_rows = [];
            $list_rows =  [];
            $list_penunjang = [];
            $list_fasilitas = [];
            $temp_penunjang= "";
            $temp_fasilitas = "";
            $length_data = count($data)-1;
            $myloop = 0;
            foreach($data as $row){
                $list_row = [];
                $fasilitas = $row->fasilitas;  
                $penunjang = $row->penunjang;
                $label = ["v"=>$row->keterangan,"f"=>null];              
                $total  = ["v"=>$row->total,"f"=>null]; 
                array_push($list_row,$label,$total);
                $dict_rows = ["c"=> $list_row];
                
                if ($temp_fasilitas!=$fasilitas){
                   
                    if ($temp_fasilitas==""){
                        $temp_fasilitas = $fasilitas;
                        $temp_penunjang = $penunjang;
                    }
                    else{
                        
                        $data_chart = [
                            "title" => $temp_penunjang,
                            "cols" => [
                                ["id"=>"","label"=>"Penunjang","pattern"=>"","type"=>"string"],
                                ["id"=>"","label"=>"Total","pattern"=>"","type"=>"number"]
                            ],
                            "rows" => $list_rows
                        ];
                        $temp_penunjang = $penunjang;
                        array_push($list_penunjang,$data_chart);
                        $list_rows =  [];

                        $data_chart = [
                            "fasilitas"=> $temp_fasilitas,
                            "list_penunjang"=> $list_penunjang
                        ];
                        $temp_fasilitas = $fasilitas;
                        array_push($list_fasilitas,$data_chart);
                        $list_penunjang  =[];
                    }
                    array_push($list_rows,$dict_rows);
                }
                else{
                   
                    if ($temp_penunjang!=$penunjang){
                        $data_chart = [
                            "title" => $temp_penunjang,
                            "cols" => [
                                ["id"=>"","label"=>"Penunjang","pattern"=>"","type"=>"string"],
                                ["id"=>"","label"=>"Total","pattern"=>"","type"=>"number"]
                            ],
                            "rows" => $list_rows
                        ];
                        $temp_penunjang = $penunjang;
                        array_push($list_penunjang,$data_chart);
                        $list_rows =  [];
                        array_push($list_rows,$dict_rows);
                    }
                    else{
                        array_push($list_rows,$dict_rows);
                    }
                }

                if ($length_data==$myloop){
                    
                    $data_chart = [
                        "title" => $temp_penunjang,
                        "cols" => [
                            ["id"=>"","label"=>"Penunjang","pattern"=>"","type"=>"string"],
                            ["id"=>"","label"=>"Total","pattern"=>"","type"=>"number"]
                        ],
                        "rows" => $list_rows
                    ];
                    $temp_penunjang = $penunjang;
                    array_push($list_penunjang,$data_chart);
                    $list_rows =  [];
                    $data_chart = [
                        "fasilitas"=> $temp_fasilitas,
                        "list_penunjang"=> $list_penunjang
                    ];
                    
                    array_push($list_fasilitas,$data_chart);
                }

                $myloop = $myloop+1;
            }
        error_log(json_encode($list_fasilitas));
        } catch (\Exception $e) {
            error_log($e);
        }
        return response()->json($list_fasilitas, 200);  
    }
}
