<?php

namespace App\Http\Controllers\Main;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return view('pages.main.supplier', compact('suppliers'));
    }

    public function store(Request $request)
    {
        try {
            $user = new Supplier();
            $user->supplier = $request->supplier;
            $user->save();

            return redirect()->route('supplier.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('supplier.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $user = Supplier::findOrFail($id);
            $user->supplier = $request->supplier;
            $user->save();

            return redirect()->route('supplier.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('supplier.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $item = Supplier::findOrFail($id);
            $item->delete();

            return redirect()->route('supplier.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('supplier.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
