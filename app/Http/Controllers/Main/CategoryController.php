<?php

namespace App\Http\Controllers\Main;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.main.category', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->category = $request->category;
            $category->stock = $request->stock;
            $category->slug = $request->slug;
            $category->save();

            return redirect()->route('category.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('category.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $category = Category::findOrFail($id);
            $category->category = $request->category;
            $category->stock = $request->stock;
            $category->slug = $request->slug;
            $category->update();

            return redirect()->route('category.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('category.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
