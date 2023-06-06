<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Item;
use App\Models\IncomingItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class IncomingItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $incoming_items = IncomingItem::all();

        return view('pages.transaction.incoming_item', compact('items', 'incoming_items'));
    }

    public function store(Request $request)
    {
        try {
            $incoming_item = new IncomingItem();
            $incoming_item->code = $request->code;
            $incoming_item->item_id = $request->item_id;
            $incoming_item->stock = $request->stock;
            $incoming_item->user_id = Auth::user()->id;
            $incoming_item->save();

            $stock = IncomingItem::where('item_id', $incoming_item->item_id)->sum('stock');

            $item = Item::where('id', $incoming_item->item_id)->first();
            $item->stock = $stock;
            $item->update();

            return redirect()->route('incoming-item.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('incoming-item.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $incoming_item = IncomingItem::findOrFail($id);
            $incoming_item->code = $request->code;
            $incoming_item->item_id = $request->item_id;
            $incoming_item->stock = $request->stock;
            $incoming_item->user_id = Auth::user()->id;
            $incoming_item->update();

            $stock = IncomingItem::where('item_id', $incoming_item->item_id)->sum('stock');

            $item = Item::where('id', $incoming_item->item_id)->first();
            $item->stock = $stock;
            $item->update();

            return redirect()->route('incoming-item.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('incoming-item.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $incoming_item = IncomingItem::findOrFail($id);
            $incoming_item->delete();

            $stock = IncomingItem::where('item_id', $incoming_item->item_id)->sum('stock');

            $item = Item::where('id', $incoming_item->item_id)->first();
            $item->stock = $stock;
            $item->update();

            return redirect()->route('incoming-item.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('incoming-item.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
