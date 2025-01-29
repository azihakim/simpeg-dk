<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Rekrutmen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::with('user')->get();
        $data = $data->filter(function ($item) {
            return $item->user->jabatan === 'Karyawan';
        });
        return view('karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelamar = Rekrutmen::where('status', 'Diterima')->get();
        return view('karyawan.create', compact('pelamar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'unique:pegawais,nik',
            ]);
            DB::beginTransaction();
            // Find the user by pelamar ID
            $karyawan = Pegawai::find($request->pelamar);
            $id_pelamar = (int) $request->id_pelamar;
            $pelamar = Rekrutmen::where('id_pelamar', $id_pelamar)->first();
            if (!$karyawan) {
                return redirect()->back()->with('error', 'Data pelamar tidak ditemukan.');
            }

            // Assign the request data to the user
            $karyawan->umur = $request->umur;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->no_telp = $request->no_telp;
            $karyawan->divisi_id = $pelamar->lowongan->id;
            $karyawan->status = 'Aktif';
            $karyawan->nik = $request->nik;

            $user = User::find($karyawan->user_id);
            $user->jabatan = 'Karyawan';
            $user->save();

            // Save the changes
            $karyawan->save();


            $pelamar->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data karyawan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data karyawan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Pegawai::with('user')->find($id);
        return view('karyawan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {

            // Find the employee by ID
            $karyawan = Pegawai::with('user')->find($id);

            // Update the employee data
            $karyawan->nama = $request->nama;
            $karyawan->umur = $request->umur;
            $karyawan->jenis_kelamin = $request->jenis_kelamin;
            $karyawan->no_telp = $request->no_telp;
            $karyawan->nik = $request->nik;

            // Save the updated data
            $karyawan->save();

            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data karyawan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Find the employee by ID
            $user = User::findOrFail($id);
            $karyawan = Pegawai::where('user_id', $id)->first();

            // Delete the user
            $user->delete();
            // Delete the employee
            $karyawan->delete();

            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('error', 'Gagal menghapus data karyawan: ' . $e->getMessage());
        }
    }
}
