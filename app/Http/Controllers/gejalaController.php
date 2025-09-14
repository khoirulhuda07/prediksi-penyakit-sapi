<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gejala;
use App\Models\penyakit;
use Illuminate\Support\Facades\DB;
class gejalaController extends Controller
{
    //
    public function index()
    {
        $gejala = gejala::all();
        return view('gejala',compact('gejala'));
    }
    public function tambah(Request $request)
    {
        $gejala = new gejala();
        $gejala->KODE_GEJALA = $request->kode;
        $gejala->GEJALA = $request->gejala;
        $gejala->save();
        return redirect()->back()->with('success', 'Gejala berhasil ditambahkan');
    }
    public function update(Request $request, String $id)
    {
        $gejala = gejala::findOrFail($id);
        $oldKode = trim($gejala->KODE_GEJALA);
        $newKode = strtoupper(trim($request->kode)); // pastikan uppercase dan bersih spasi
    
        // Update tabel gejala
        $gejala->KODE_GEJALA = $newKode;
        $gejala->GEJALA = $request->gejala;
        $gejala->save();
    
        // Update tabel dataset (semua record yang mengandung oldKode)
        $datasets = DB::table('dataset')->get();
        foreach ($datasets as $data) {
            $gejalaList = array_map('trim', explode(',', preg_replace("/[\r\n]+/", '', $data->gejala)));
    
            $updated = false;
            foreach ($gejalaList as &$kode) {
                if (strtoupper($kode) === strtoupper($oldKode)) {
                    $kode = $newKode;
                    $updated = true;
                }
            }
    
            if ($updated) {
                $newGejalaString = implode(', ', $gejalaList);
                DB::table('dataset')
                    ->where('id_dataset', $data->id_dataset)
                    ->update(['gejala' => $newGejalaString]);
            }
        }
    
        return redirect()->back()->with('success', 'Gejala berhasil diupdate');
    }
    
    public function delete(String $id)
    {
        $gejala = gejala::find($id);
        $gejala->penyakit()->detach();
        $gejala->delete();
        return redirect()->back()->with('success', 'Gejala berhasil dihapus');
    }
}
