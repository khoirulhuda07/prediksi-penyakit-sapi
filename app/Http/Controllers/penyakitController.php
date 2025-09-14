<?php

namespace App\Http\Controllers;
use App\Models\rules;
use App\Models\penyakit;
use App\Models\gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class penyakitController extends Controller
{
    //
    public function index()
    { 
        $allGejala = gejala::all();
        $penyakitList = penyakit::with('gejala')->get();
        return view('penyakit', compact('penyakitList','allGejala'));
    }
    public function tambah(Request $request)
    {
      $penyakit = new penyakit();
      $penyakit->KODE_PENYAKIT = $request->kode;
      $penyakit->PENYAKIT = $request->penyakit;
      $penyakit->solusi = $request->solusi;
      $penyakit->pencegahan = $request->pencegahan;
      $penyakit->save();
      return redirect()->back()->with('success', 'Penyakit berhasil ditambahkan');
    }
    public function update(Request $request, string $id)
{
    $penyakit = penyakit::findOrFail($id);

    $oldKode = trim($penyakit->KODE_PENYAKIT);
    $newKode = trim($request->kode);

    // Update data penyakit utama
    $penyakit->update([
        'KODE_PENYAKIT' => $newKode,
        'PENYAKIT' => $request->penyakit,
        'solusi' => $request->solusi,
        'pencegahan' => $request->pencegahan
    ]);

    // Update relasi gejala (checkbox)
    if ($request->has('gejala')) {
        $penyakit->gejala()->sync($request->gejala);
    } else {
        $penyakit->gejala()->detach();
    }

    // Update dataset yang berkaitan
    $datasets = \DB::table('dataset')->where('penyakit', 'LIKE', "%$oldKode%")->get();

    foreach ($datasets as $data) {
        // Bersihkan string penyakit, hilangkan spasi/newline, pecah jadi array
        $penyakitCodes = array_map('trim', explode(',', str_replace(["\r", "\n"], '', $data->penyakit)));

        // Ganti hanya kode yang sama persis
        $updatedCodes = array_map(function($kode) use ($oldKode, $newKode) {
            return $kode === $oldKode ? $newKode : $kode;
        }, $penyakitCodes);

        // Gabungkan ulang
        $newPenyakitStr = implode(',', $updatedCodes);

        // Update di database
        \DB::table('dataset')->where('id_dataset', $data->id_dataset)->update(['penyakit' => $newPenyakitStr]);
    }

    return redirect()->back()->with('success', 'Penyakit berhasil diupdate');
}

    public function delete(String $id)
    {
        $penyakit = penyakit::findOrFail($id);
        $penyakit->gejala()->detach();
        $penyakit->delete();
        return redirect()->back()->with('success', 'Penyakit berhasil dihapus');
    }
}
