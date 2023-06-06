<?php

namespace App\Http\Controllers\Main;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('pages.main.item', compact('items'));
    }

    public function store(Request $request)
    {
        try {
            $image = $request->file('image');
            $image->move('assets/media/image', $image->getClientOriginalName());

            $image_url = $image->getClientOriginalName();

            $item = new Item();
            $item->item = $request->item;
            $item->image = $image_url;
            $item->save();

            return redirect()->route('item.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('item.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $item = Item::findOrFail($id);
            $item->item = $request->item;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image->move('assets/media/image', $image->getClientOriginalName());

                $image_url = $image->getClientOriginalName();

                $item->image = $image_url;
            }

            $item->update();

            return redirect()->route('item.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('item.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $item = Item::findOrFail($id);
            $item->delete();

            return redirect()->route('item.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('item.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
