<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = User::where('jabatan', 'Karyawan')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('karyawan.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'divisi_id' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'nik' => 'required',
                'username' => 'nullable',
                'password' => 'nullable',
            ]);

            $user = new User($request->all());
            $user->jabatan = 'Karyawan';
            $user->save();

            return redirect()->route('karyawan.index')
                ->with('success', 'Karyawan created successfully');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.create')
                ->with('error', 'Error creating Karyawan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::all();
        $karyawan = User::find($id);
        return view('karyawan.edit', compact('karyawan', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'jabatan_id' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'nik' => 'required',
                'username' => 'nullable',
                'password' => 'nullable',
            ]);

            $karyawan = User::find($id);
            $karyawan->update($request->except(['username', 'password']));

            if ($request->filled('username')) {
                $karyawan->update(['username' => $request->username]);
            }

            if ($request->filled('password')) {
                $karyawan->update(['password' => bcrypt($request->password)]);
            }

            return redirect()->route('karyawan.index')
                ->with('success', 'Karyawan updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.edit', $id)
                ->with('error', 'Error updating Karyawan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $karyawan = User::find($id);
            $karyawan->delete();

            return redirect()->route('karyawan.index')
                ->with('success', 'Karyawan deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')
                ->with('error', 'Error deleting Karyawan: ' . $e->getMessage());
        }
    }
}
