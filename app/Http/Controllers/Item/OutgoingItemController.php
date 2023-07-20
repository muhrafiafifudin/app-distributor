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
        $outgoing_items = OutgoingItem::all();

        return view('pages.item.outgoing_item', compact('outgoing_items'));
    }

    public function store(Request $request)
    {
        try {
            $outgoing_item = new OutgoingItem();
            $outgoing_item->code = 0;
            $outgoing_item->user_id = Auth::id();
            $outgoing_item->status = 0;
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
                    $incoming_item = IncomingItem::where([['item_id', $item_id], ['stock', '>', 0]])->orderBy('created_at', 'asc')->first();

                    if ($incoming_item && $incoming_item->stock >= $remaining_qty) {
                        $incoming_item->stock -= $remaining_qty;
                        $incoming_item->save();

                        $remaining_qty = 0;

                        if ($incoming_item->stock == 0) {
                            $incoming_item->delete();
                        }
                    } elseif ($incoming_item) {
                        $remaining_qty -= $incoming_item->stock;

                        $incoming_item->stock = 0;
                        $incoming_item->save();

                        $incoming_item->delete();
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
            dd($th);
            return redirect()->route('outgoing-item.index')->with(['error', 'Gagal Menambahkan Data !!']);
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
