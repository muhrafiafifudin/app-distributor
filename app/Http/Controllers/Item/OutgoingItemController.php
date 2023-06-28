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
            $outgoing_item->save();

            $cartItems = Cart::where('user_id', Auth::id())->get();

            foreach ($$cartItems as $cartItem) {
                $outegoing_item_details = new OutgoingItemDetail();
                $outegoing_item_details->outgoing_item_id = $outgoing_item->id;
                $outegoing_item_details->item_id = $cartItem->item_id;
                $outegoing_item_details->item_qty = $cartItem->item_qty;
                $outegoing_item_details->save();

                $incoming_items = IncomingItem::where([['item_id', $cartItem->item_id]. ['stock', '!=', 0]])->orderBy('created_at', 'asc')->first();
                $incoming_items -= $cartItem->item_qty;
                $incoming_items->update();

                $item = Item::where('id', $cartItem->item_id)->first();
                $item->stock -= $cartItem->item_qty;
                $item->update();
            }

            $cartItems = Cart::where('user_id', Auth::id())->get();
            $cartItems->delete();

            return redirect()->route('outgoing-item.index')->with(['success', 'Berhasil Menambahkan Data !!']);
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
