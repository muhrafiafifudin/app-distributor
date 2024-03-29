<?php

namespace App\Http\Controllers\Item;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Item;
use App\Models\IncomingItem;
use App\Models\OutgoingItem;
use Illuminate\Http\Request;
use App\Models\OutgoingItemDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OutgoingItemController extends Controller
{
    public function index()
    {
        $outgoing_items = OutgoingItem::with('outgoing_item_detail')->get();

        return view('pages.item.outgoing_item', compact('outgoing_items'));
    }

    public function store(Request $request)
    {
        try {
            $outgoing_item = new OutgoingItem();
            $outgoing_item->code = 'ORD' . rand(00000000,999999999);
            $outgoing_item->user_id = Auth::id();
            $outgoing_item->status = 1;
            $outgoing_item->save();

            $carts = Cart::where('user_id', Auth::id())->get();

            foreach ($carts as $cart) {
                $item_id = $cart->item_id;
                $item_qty = $cart->item_qty;

                $outgoing_item_detail = new OutgoingItemDetail();
                $outgoing_item_detail->outgoing_item_id = $outgoing_item->id;
                $outgoing_item_detail->item_id = $item_id;
                $outgoing_item_detail->item_qty = $item_qty;
                $outgoing_item_detail->save();

                $remaining_qty = $item_qty;

                while ($remaining_qty > 0) {
                    $incoming_item = IncomingItem::where([['item_id', $item_id], ['stock', '>', 0], ['status', 1]])->orderBy('created_at', 'asc')->first();

                    if ($incoming_item && $incoming_item->stock >= $remaining_qty) {
                        $incoming_item->stock -= $remaining_qty;
                        $incoming_item->save();

                        $remaining_qty = 0;

                        if ($incoming_item->stock == 0) {
                            $incoming_item->status = 0;
                            $incoming_item->save();
                        }
                    } elseif ($incoming_item) {
                        $remaining_qty -= $incoming_item->stock;

                        $incoming_item->stock = 0;
                        $incoming_item->status = 0;
                        $incoming_item->save();
                    } else {
                        break;
                    }
                }

                $item = Item::where('id', $item_id)->first();
                $item->stock -= $item_qty;
                $item->update();
            }

            $cartItems = Cart::where('user_id', Auth::id())->get();
            Cart::destroy($cartItems);

            return redirect()->route('outgoing-item.index')->with(['success', 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('outgoing-item.index')->with(['error', 'Gagal Menambahkan Data !!']);
        }
    }

    public function processItem($id)
    {
        try {
            $outgoing_item = OutgoingItem::findOrFail($id);
            $outgoing_item->status = 2;
            $outgoing_item->update();

            return redirect()->route('outgoing-item.index')->with(['success', 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('outgoing-item.index')->with(['error', 'Gagal Mengubah Data !!']);
        }
    }

    public function acceptItem($id)
    {
        try {
            $outgoing_item = OutgoingItem::findOrFail($id);
            $outgoing_item->status = 3;
            $outgoing_item->update();

            return redirect()->route('outgoing-item.index')->with(['success', 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('outgoing-item.index')->with(['error', 'Gagal Mengubah Data !!']);
        }
    }

    public function rejectItem($id)
    {
        try {
            $outgoing_item = OutgoingItem::findOrFail($id);
            $outgoing_item->status = 4;
            $outgoing_item->update();

            return redirect()->route('outgoing-item.index')->with(['success', 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('outgoing-item.index')->with(['error', 'Gagal Mengubah Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
