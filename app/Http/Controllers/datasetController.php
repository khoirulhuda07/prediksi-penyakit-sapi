<?php

namespace App\Http\Controllers;
use App\Models\penyakit;
use App\Models\gejala;
use App\Models\dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
class datasetController extends Controller
{
    //
    public function index()
    {
        $allGejala = gejala::all();
        $allPenyakit = penyakit::all();
        $dataUji = DB::table('dataset')->get();

        // Ambil master data
        $kodeKeId = DB::table('gejala')->pluck('ID_GEJALA', 'KODE_GEJALA')->toArray();
        $kodeKeDetailGejala = DB::table('gejala')->get()->keyBy('KODE_GEJALA')->toArray();
        $kodeKeNamaPenyakit = DB::table('penyakit')->pluck('PENYAKIT', 'KODE_PENYAKIT')->toArray();
    
        $dataEvaluasi = [];
    
        foreach ($dataUji as $data) {
            // Ambil kode gejala dari dataset
            $gejalaKodeArray = array_map('trim', explode(',', preg_replace("/[\r\n]+/", '', $data->gejala)));
    
            // Ambil detail nama gejala
            $gejalaDetailArray = array_map(function ($kode) use ($kodeKeDetailGejala) {
                return isset($kodeKeDetailGejala[$kode]) ? [
                    'nama' => $kodeKeDetailGejala[$kode]->GEJALA,
                    'kode' => $kodeKeDetailGejala[$kode]->KODE_GEJALA,
                ] : ['nama' => $kode, 'kode' => $kode];
            }, $gejalaKodeArray);
    
            $dataEvaluasi[] = [
                'id_dataset' => $data->id_dataset,
                'gejala' => $gejalaDetailArray,
                'label_penyakit' => $kodeKeNamaPenyakit[trim($data->penyakit)] ,
                'kode_penyakit' => $data->penyakit
            ];
        }
    
        return view('dataset', compact('dataEvaluasi','allGejala','allPenyakit'));
}
public function tambah(Request $request)
{
    $request->validate([
        'penyakit' => 'required',
        'gejala' => 'required|array|min:1',
    ]);

    DB::table('dataset')->insert([
        'penyakit' => $request->penyakit,
        'gejala' => implode(',', $request->gejala),
    ]);

    return redirect()->back()->with('success', 'Dataset berhasil ditambahkan');
}
public function ubah(Request $request,String $id)
{
    $request->validate([
        'penyakit' => 'required',
        'gejala' => 'required|array|min:1',
    ]);

    DB::table('dataset')->where('id_dataset', $id)->update([
        'penyakit' => $request->penyakit,
        'gejala' => implode(',', $request->gejala),
    ]);

    return redirect()->back()->with('success', 'Dataset berhasil diperbarui');
}
public function hapus(String $id)
{
    DB::table('dataset')->where('id_dataset', $id)->delete();
    return redirect()->back()->with('success', 'Dataset berhasil dihapus');
}
}