<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function create()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'unique:users,username',
            ]);
            DB::beginTransaction();
            $user = new User();
            $user->username = $request->username;
            $user->jabatan = "Pelamar";
            $user->password = bcrypt($request->password);
            $user->save();

            $karyawan = new Pegawai();
            $karyawan->nama = $request->nama;
            $karyawan->no_telp = $request->no_telp;
            $karyawan->umur = $request->umur;
            $karyawan->alamat = $request->alamat;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->user_id = $user->id;
            $karyawan->save();
            DB::commit();
            return redirect()->route('login')->with('success', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
