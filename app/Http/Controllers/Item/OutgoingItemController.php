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
        $currentYear = Carbon::now()->format('Y');
        $lastRecord = OutgoingItem::orderBy('id', 'desc')->first();

        if ($lastRecord) {
            $lastCode = $lastRecord->code;
            $lastYear = substr($lastCode, 0, 4);

            if ($lastYear == $currentYear) {
                $temporaryCode = substr($lastCode, 5, 6) + 1;
            } else {
                $temporaryCode = 1;
            }
        } else {
            $temporaryCode = 1;
        }

        $code = $currentYear . '_' . $temporaryCode;

        $outgoing_item = new OutgoingItem();
        $outgoing_item->code = $code;
        $outgoing_item->user_id = Auth::id();
        $outgoing_item->status = 0;
        // $outgoing_item->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartItems as $cartItem) {
            $item_id = $cartItem->item_id;
            $item_qty = $cartItem->item_qty;

            $outgoing_item_details = new OutgoingItemDetail();
            $outgoing_item_details->outgoing_item_id = $outgoing_item->id;
            $outgoing_item_details->item_id = $item_id;
            $outgoing_item_details->item_qty = $item_qty;
            // $outgoing_item_details->save();

            $remaining_qty = $item_qty;

            $incoming_items = IncomingItem::where([['item_id', $item_id], ['stock', '>', 0]])->orderBy('created_at', 'asc')->get();

            foreach ($incoming_items as $incoming_item) {
                if ($incoming_item->stock >= $remaining_qty) {
                    // dd('Pass', $remaining_qty);
                    // dd($remaining_qty);
                    $incoming_item->stock -= $remaining_qty;
                    // $incoming_item->update();

                    $remaining_qty = 0;
                } else {
                    // dd('Kurang', $incoming_item->stock, $remaining_qty);
                    // dd($remaining_qty);
                    $incoming_item->stock = 0;
                    // $incoming_item->update();

                    // $incoming_item->delete();

                    $remaining_qty -= $incoming_item->stock;
                }
            }

            while ($item_qty > 0) {
                $incoming_item = IncomingItem::where([['item_id', $item_id], ['stock', '>', 0]])->orderBy('created_at', 'asc')->first();

                if ($incoming_item->stock >= $remaining_qty) {
                    // dd('Pass', $remaining_qty);
                    // dd($remaining_qty);
                    $incoming_item->stock -= $remaining_qty;
                    // $incoming_item->update();

                    $remaining_qty = 0;
                } else {
                    // dd('Kurang', $incoming_item->stock, $remaining_qty);
                    // dd($remaining_qty);
                    $incoming_item->stock = 0;
                    // $incoming_item->update();

                    // $incoming_item->delete();

                    $remaining_qty -= $incoming_item->stock;
                }
            }

            dd($incoming_item);

            $item = Item::where('id', $cartItem->item_id)->first();
            $item->stock -= $cartItem->item_qty;
            $item->update();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect()->route('outgoing-item.index')->with(['success', 'Berhasil Menambahkan Data !!']);
        try {
        } catch (\Throwable $th) {
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
