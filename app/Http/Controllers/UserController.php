<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $data = User::with('pegawai.divisi')->get();
        return view('user.index', compact('data'));
    }

    function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        try {
            $user = new User();
            $user->username = $request->username;
            $user->jabatan = $request->jabatan;
            $user->password = bcrypt($request->password);
            $user->save();

            $pegawai = new Pegawai();
            $pegawai->nama = $request->nama;
            $pegawai->user_id = $user->id;
            $pegawai->save();


            return redirect()->route('user.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('user.create')->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->username = $request->username;
            $user->jabatan = $request->jabatan;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            if ($user->pegawai) {
                $user->pegawai->nama = $request->nama;
                $user->pegawai->save();
            }

            return redirect()->route('user.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('user.edit', $id)->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
