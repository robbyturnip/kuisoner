<?php

namespace App\Http\Controllers;

use DB;
use View;
use ModelUser;
use ModelPenilaian;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class cluster extends Controller
{
    public function home(){
        
        return View::make('myadmin.content.clustering');
    }

    public function cluster(){
        try {
            $data_kuisoner = DB::table('kuisoner')
                            ->select('id_kuisoner',DB::raw('group_concat(nilai ORDER BY fasilitas.id_fasilitas, penunjang.id_penunjang  ASC) as nilai'))
                            ->join('penunjang_fasilitas','penunjang_fasilitas.id_penunjang_fasilitas','=','kuisoner.id_penunjang_fasilitas')
                            ->join('penunjang','penunjang.id_penunjang','=','penunjang_fasilitas.id_penunjang')
                            ->join('fasilitas','fasilitas.id_fasilitas','=','penunjang_fasilitas.id_fasilitas')
                            ->join('penilaian','penilaian.nilai','=','kuisoner.id_penilaian')
                            ->groupBy('id_kuisoner')
                            ->orderBy('id_kuisoner')
                            ->get();
        } catch (\Exception $e) {
            error_log($e);
        }

        $new_data_kuisoner      = [];
        $new_data_id_kuisoner   = []; 

        foreach($data_kuisoner as $row){
            array_push($new_data_kuisoner, array_map('intval', explode(',',$row->nilai)));
            array_push($new_data_id_kuisoner, $row->id_kuisoner);
        }
        
        $k                  = 3;
        $iterasi            = 1000;
        $label              = ['Baik','Cukup','Buruk'];
        // $range = range(0, count($new_data_kuisoner)-1); 
        // shuffle($range);
        // $n = 3;
        // $random_number = array_slice($range, 0 , $n);
        $centroid_awal      = [$new_data_kuisoner[0],$new_data_kuisoner[3],$new_data_kuisoner[10]];
        
        $kuisoner_kmeans    = $this->k_means($new_data_kuisoner, $new_data_id_kuisoner, $k, $iterasi, $centroid_awal);
        $kuisoner_table     = $this->output_table($new_data_id_kuisoner, $kuisoner_kmeans, $label); 
        $kuisoner_chart     = $this->output_chart($kuisoner_kmeans, $label, $k);

        $output             = array(
                                "table_kuisoner"=> $kuisoner_table,
                                "chart_kuisoner"=> $kuisoner_chart,
                            );

        try {
            $data_fasilitas = DB::table('fasilitas')
                            ->select('id_fasilitas',DB::raw('lower(fasilitas) as fasilitas'))
                            ->groupBy('id_fasilitas')
                            ->orderBy('id_fasilitas')
                            ->get();
        } catch (\Exception $e) {
            error_log($e);
        }

        foreach($data_fasilitas as $row_fasilitas){

            try {
                $data_perfasilitas = DB::table('kuisoner')
                                    ->select('id_kuisoner',DB::raw('group_concat(nilai ORDER BY fasilitas.id_fasilitas, penunjang.id_penunjang  ASC) as nilai'), DB::raw('group_concat(penunjang ORDER BY fasilitas.id_fasilitas, penunjang.id_penunjang  ASC) as penunjang'))
                                    ->join('penunjang_fasilitas','penunjang_fasilitas.id_penunjang_fasilitas','=','kuisoner.id_penunjang_fasilitas')
                                    ->join('penunjang','penunjang.id_penunjang','=','penunjang_fasilitas.id_penunjang')
                                    ->join('fasilitas','fasilitas.id_fasilitas','=','penunjang_fasilitas.id_fasilitas')
                                    ->join('penilaian','penilaian.nilai','=','kuisoner.id_penilaian')
                                    ->where('fasilitas.id_fasilitas',$row_fasilitas->id_fasilitas)
                                    ->groupBy('id_kuisoner')
                                    ->orderBy('id_kuisoner','asc')
                                    ->get();
            } catch (\Exception $e) {
                error_log($e);
            }

            $new_data_fasilitas     = [];
            $new_data_penunjang     = [];
            $new_data_id_kuisoner   = []; 
    
            foreach($data_perfasilitas as $row_perfasilitas){
                array_push($new_data_fasilitas, array_map('intval', explode(',',$row_perfasilitas->nilai)));
                array_push($new_data_penunjang, explode(',',$row_perfasilitas->penunjang));
                array_push($new_data_id_kuisoner, $row_perfasilitas->id_kuisoner);

            }
            
            $centroid_awal          = [$new_data_fasilitas[0],$new_data_fasilitas[3],$new_data_fasilitas[10]];
            $name_fasilitas         = (string)$row_fasilitas->fasilitas;
            $name_table_fasilitas   =  "table" . "_" . str_replace(' ', '_',  $name_fasilitas);
            $name_chart_fasilitas   =  "chart" . "_" . str_replace(' ', '_',  $name_fasilitas);
            $name_scatter_fasilitas =  "scatter" . "_" . str_replace(' ', '_',  $name_fasilitas);
            $fasilitas_kmeans       = $this->k_means($new_data_fasilitas, $new_data_id_kuisoner, $k, $iterasi, $centroid_awal);
            $fasilitas_table        = $this->output_table($new_data_id_kuisoner, $fasilitas_kmeans, $label); 
            $fasilitas_chart        = $this->output_chart($fasilitas_kmeans, $label, $k);
            $fasilitas_scatter      = $this->output_scatter($new_data_penunjang, $new_data_fasilitas, $name_scatter_fasilitas);
            $output[$name_table_fasilitas]   = $fasilitas_table;
            $output[$name_chart_fasilitas]   = $fasilitas_chart;
            $output[$name_scatter_fasilitas] = $fasilitas_scatter;
    
        }
        
        // error_log(json_encode($output));
        return response()->json($output, 200);  
    }

    public function update_centroid($cluster, $data, $kluster){
        $new_centroid   =   [];
        for($k=0; $k<$kluster; $k++){
            $centroid_baru  =   [];
            $list_data_kuisoner_dalam_cluster = [];
            for($index = 0 ; $index < count($data); $index++){
                if($cluster[$index] == $k){
                    array_push($list_data_kuisoner_dalam_cluster, $data[$index]);
                }
            }
            $total_kuisoner_dalam_kelas = count($list_data_kuisoner_dalam_cluster);
            $jumlah_kolom               = count($list_data_kuisoner_dalam_cluster[0]);
    
            
            for($kolom=0; $kolom < $jumlah_kolom; $kolom++){
                $list_nilai_kolom_data_cluster = [];
                for($row = 0 ; $row < count($list_data_kuisoner_dalam_cluster); $row++){
                    array_push($list_nilai_kolom_data_cluster, $list_data_kuisoner_dalam_cluster[$row][$kolom]);
                }
                $centroid_baru_kolom =  array_sum($list_nilai_kolom_data_cluster)/$total_kuisoner_dalam_kelas;
                array_push($centroid_baru, $centroid_baru_kolom);
            }    
            array_push($new_centroid, $centroid_baru);
        }
    
        return $new_centroid;
    }

    public function output_table($data_id_kuisoner, $kluster, $label){
        $data_output    =   [];

        for($i=0; $i<count($kluster); $i++){
            $list_data   = [];
            $list_data[] = $data_id_kuisoner[$i];
            $list_data[] = $label[$kluster[$i]];          
            array_push($data_output, $list_data);

        }

        return $data_output;
    }

    public function output_chart($kluster, $label_kluster, $k){
        
        $data_label     = [];
        $data_output    = [];

        array_push($data_label, 'cluster','jumlah');
        array_push($data_output, $data_label);

        for($i=0; $i<$k; $i++){
            $data_value     = [];
            $total_data = 0;
            for($r=0; $r<count($kluster); $r++){
                if($i==$kluster[$r]){
                    $total_data += 1;
                }
            }
            $label = $label_kluster[$i];
            array_push($data_value, $label, $total_data);
            array_push($data_output, $data_value);

        }

        return $data_output;
    }

    public function output_scatter($penunjang, $data_fasilitas, $name_scatter_fasilitas){
        
        $data_label     = [];
        $data_output    = [];

        if($name_scatter_fasilitas=='scater_kamar'){
            $kolom_x        =  0;
            $kolom_y        =  2;
        }
        elseif($name_scatter_fasilitas=='scatter_kamar_mandi'){
            $kolom_x        =  0;
            $kolom_y        =  1;
        }
        elseif($name_scatter_fasilitas=='scatter_aula_dan_ruang_tamu'){
            $kolom_x        =  0;
            $kolom_y        =  1;
        }elseif($name_scatter_fasilitas=='scatter_parkiran'){
            $kolom_x        =  0;
            $kolom_y        =  3;
        }else{
            $kolom_x        =  1;
            $kolom_y        =  2;
        }
        
        array_push($data_label, $penunjang[$kolom_x], $penunjang[$kolom_y]);
        array_push($data_output, $data_label);
        error_log(json_encode($data_fasilitas));
        for($i=0; $i<count($data_fasilitas); $i++){
            $data_value     = [];
            array_push($data_value, $data_fasilitas[$i][$kolom_x], $data_fasilitas[$i][$kolom_y]);
            array_push($data_output, $data_value);

        }

        return $data_output;
    }

    public function k_means($data, $data_id_kuisoner, $kluster, $iterasi, $centroid_awal){
        $list_final     = [];
        $jumlah_data    = count($data_id_kuisoner);

        for($iter=0; $iter<$iterasi; $iter++){
            $list_cluster = [];
            for ($row = 0; $row < $jumlah_data;  $row++){
                $list_jarak_centroid = [];
                $jumlah_kolom = count($data[$row]);
                for ($k = 0; $k < $kluster; $k++){
                    $jarak        = 0;
                    for($kolom = 0; $kolom < $jumlah_kolom; $kolom++){
                        $jarak = $jarak + pow(($data[$row][$kolom]-$centroid_awal[$k][$kolom]),2);
                    }
                    $jarak_final    =  sqrt($jarak); 
                    array_push($list_jarak_centroid,  $jarak_final);
                }
        
                $cluster_chossed = array_search(min($list_jarak_centroid), $list_jarak_centroid, true); 
                array_push($list_cluster,$cluster_chossed);
            }
            if(count(array_unique($list_cluster))<$kluster){
                break;
            }else{
                
                $centroid_awal = $this->update_centroid($list_cluster, $data, $kluster);
                $list_final = $list_cluster;
            }
            
        }

        return $list_final;
    }
}
