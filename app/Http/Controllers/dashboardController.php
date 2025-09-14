<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gejala;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use App\Models\penyakit;
class dashboardController extends Controller
{
    //
    public function index(){
        $gejala = gejala::count();
        $penyakit = penyakit::count();
        $dataUji = DB::table('dataset')->get();
        $penyakitList = DB::table('penyakit')->get();
        $totalPenyakit = count($penyakitList);
        $totalGejala = DB::table('gejala')->count();
    
        // Mapping gejala dan penyakit
        $kodeKeId = DB::table('gejala')->pluck('ID_GEJALA', 'KODE_GEJALA')->toArray();
        $kodeKeDetailGejala = DB::table('gejala')->get()->keyBy('KODE_GEJALA')->toArray();
        $kodeKeNamaPenyakit = DB::table('penyakit')->pluck('PENYAKIT', 'KODE_PENYAKIT')->toArray();
    
        $jumlahBenar = 0;
        $hasilEvaluasi = [];
    
        foreach ($dataUji as $data) {
            // Ambil kode gejala dari dataset
            $gejalaKodeArray = array_map('trim', explode(',', preg_replace("/[\r\n]+/", '', $data->gejala)));
    
            // Konversi ke ID_GEJALA
            $idGejalaArray = [];
            foreach ($gejalaKodeArray as $kode) {
                if (isset($kodeKeId[$kode])) {
                    $idGejalaArray[] = $kodeKeId[$kode];
                }
            }
    
            $prior = 1 / $totalPenyakit;
            $hasilPrediksi = [];
    
            foreach ($penyakitList as $p) {
                $totalGejalaPenyakit = DB::table('rule')
                    ->where('ID_PENYAKIT', $p->ID_PENYAKIT)
                    ->count();
    
                if ($totalGejalaPenyakit == 0) continue;
    
                $produkProbabilitas = 1;
    
                foreach ($idGejalaArray as $gejalaId) {
                    $x = DB::table('rule')
                        ->where('ID_PENYAKIT', $p->ID_PENYAKIT)
                        ->where('ID_GEJALA', $gejalaId)
                        ->exists() ? 1 : 0;
    
                    $pVj = 1 / $totalGejala;
                    $M = $totalGejala;
    
                    $numerator = $x + ($M * $pVj);
                    $denominator = 1 + $M;
                    $probGejala = $numerator / $denominator;
    
                    $produkProbabilitas *= $probGejala;
                }
    
                $probabilitas = $prior * $produkProbabilitas;
    
                $hasilPrediksi[] = [
                    'id' => $p->ID_PENYAKIT,
                    'nama' => $p->PENYAKIT,
                    'kode' => $p->KODE_PENYAKIT,
                    'probabilitas' => $probabilitas
                ];
            }
    
            usort($hasilPrediksi, fn($a, $b) => $b['probabilitas'] <=> $a['probabilitas']);
    
            $prediksiTertinggi = $hasilPrediksi[0]['nama'] ?? null;
            $kodePrediksi = $hasilPrediksi[0]['kode'] ?? null;
    
            $benar = (trim($kodePrediksi)) ==(trim($data->penyakit));
    
            // Format gejala untuk tampil di view
            $gejalaDetailArray = array_map(function ($kode) use ($kodeKeDetailGejala) {
                return isset($kodeKeDetailGejala[$kode]) ? [
                    'nama' => $kodeKeDetailGejala[$kode]->GEJALA,
                    'kode' => $kodeKeDetailGejala[$kode]->KODE_GEJALA,
                ] : ['nama' => $kode, 'kode' => $kode];
            }, $gejalaKodeArray);
    
            $hasilEvaluasi[] = [
                'id_dataset' => $data->id_dataset,
                'gejala' => $gejalaDetailArray,
                'label_asli' => $kodeKeNamaPenyakit[trim($data->penyakit)] ?? $data->penyakit,
                'prediksi' => $prediksiTertinggi,
                'status' => $benar ? 'Benar' : 'Salah'
            ];
    
            if ($benar) $jumlahBenar++;
        }
    
        $totalData = count($dataUji);
        $akurasi = $totalData > 0 ? round(($jumlahBenar / $totalData) * 100, 2) : 0;
    
        return view('dashboard',compact('penyakit','gejala','akurasi'));
    }
}
