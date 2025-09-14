<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class akunController extends Controller
{
    //
    public function index()
    {
        $user = users::all();
        return view('akun', compact('user'));
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pw' => 'required|string|min:8',
          
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'pw.required' => 'Password wajib diisi.',
            'pw.min' => 'Password minimal 8 karakter.',
          
        ]);
        $user = new users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->pw);
        $user->save();
        return redirect()->back()->with('success', 'akun berhasil ditambahkan');
    }
    public function ubah(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            
          
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
           
           
          
        ]);
        $user = users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->pw)) {
            $user->password = Hash::make($request->pw);
        }
        $user->save();
        return redirect()->back()->with('success', 'akun berhasil diubah');
    }
    public function hapus(String $id)
    {
        DB::table('riwayat')->where('id_user', $id)->delete();
        $user = users::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'akun berhasil dihapus');
    }
}
