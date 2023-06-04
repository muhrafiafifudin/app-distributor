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
        $categories = Category::all();

        return view('pages.main.item', compact('items', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
            ]);

            $image = $request->file('image');
            $image->move('assets/media/image', $image->getClientOriginalName());

            $image_url = $image->getClientOriginalName();

            $item = new Item();
            $item->code = $request->code;
            $item->item = $request->item;
            $item->image = $image_url;
            $item->categories_id = $request->categories_id;
            $item->price = $request->price;
            $item->description = $request->description;
            $item->stock = $request->stock;
            $item->slug = $request->slug;
            $item->save();

            return redirect()->route('item.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('item.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $item = Item::findOrFail($id);
            $item->code = $request->code;
            $item->item = $request->item;
            $item->image = $request->image;
            $item->categories_id = $request->categories_id;
            $item->price = $request->price;
            $item->description = $request->description;
            $item->stock = $request->stock;
            $item->slug = $request->slug;
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
