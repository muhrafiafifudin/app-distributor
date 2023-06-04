<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.system.user', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->route('user.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return redirect()->route('user.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('user.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
