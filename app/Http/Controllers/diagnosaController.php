<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gejala;
use App\Models\penyakit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class diagnosaController extends Controller
{
    //
    public function index()
    {
        $gejala = gejala::all();
        return view('form',compact('gejala'));
    }
    public function prediksi(Request $request)
    {
        $selectedGejala = $request->gejala;
    
        $daftarGejalaDipilih = DB::table('gejala')
            ->whereIn('ID_GEJALA', $selectedGejala)
            ->get();
    
        // ✅ Tambahkan ini agar KODE_GEJALA bisa digunakan di bawah
        $gejalaMap = [];
        foreach ($daftarGejalaDipilih as $gejala) {
            $gejalaMap[$gejala->ID_GEJALA] = $gejala->KODE_GEJALA;
        }
    
        $penyakit = DB::table('penyakit')->get();
        $totalPenyakit = count($penyakit);
        $totalGejala = DB::table('gejala')->count();
    
        $hasilPrediksi = [];
    
        foreach ($penyakit as $p) {
            $prior = 1 / $totalPenyakit;
            $totalGejalaPenyakit = DB::table('rule')
                ->where('ID_PENYAKIT', $p->ID_PENYAKIT)
                ->count();
    
            if ($totalGejalaPenyakit == 0) continue;
    
            $produkProbabilitas = 1;
            $penjelasanRumus = [];
    
            foreach ($selectedGejala as $gejalaId) {
                $x = DB::table('rule')
                    ->where('ID_PENYAKIT', $p->ID_PENYAKIT)
                    ->where('ID_GEJALA', $gejalaId)
                    ->exists() ? 1 : 0;
    
                $M = $totalGejala;
                $numerator = $x + ($M * $prior);
                $denominator = 1 + $M;
                $probGejala = $numerator / $denominator;
    
                $produkProbabilitas *= $probGejala;
    
                $penjelasanRumus[] = "\\left( \\frac{{$x} + {$M} \\times " . round($prior, 4) . "}{" . (1 + $M) . "} \\right)";
            }
    
            $probabilitas = $prior * $produkProbabilitas;
    
            // ✅ Gunakan kode gejala yang benar
            $kodeGejalaDipilih = array_map(fn($id) => $gejalaMap[$id] ?? 'G?', $selectedGejala);
            $kodeGejalaStr = implode(', ', $kodeGejalaDipilih);
    
            $rumusTeks = "\\( P({$kodeGejalaStr} \\mid {$p->KODE_PENYAKIT}) = "
                . round($prior, 4)
                . " \\times "
                . implode(' \\times ', $penjelasanRumus)
                . " = "
                . round($probabilitas, 6)
                . " \\)";
    
            $hasilPrediksi[] = [
                'id' => $p->ID_PENYAKIT,
                'kode' => $p->KODE_PENYAKIT,
                'nama' => $p->PENYAKIT,
                'probabilitas' => $probabilitas,
                'rumus' => $rumusTeks,
                'solusi' => $p->solusi,
                'pencegahan' => $p->pencegahan,
            ];
        }
    
        usort($hasilPrediksi, fn($a, $b) => $b['probabilitas'] <=> $a['probabilitas']);
        $hasilTertinggi = $hasilPrediksi[0] ?? null;
    
        return view('hasil', compact('hasilPrediksi', 'hasilTertinggi', 'totalPenyakit', 'daftarGejalaDipilih'));
    }
    
    public function akurasi()
    {
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
    
        return view('akurasi', compact('hasilEvaluasi', 'akurasi','jumlahBenar', 'totalData'));
    }
    
}
