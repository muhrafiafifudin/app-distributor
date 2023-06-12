<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class TransactionController extends Controller
{
    public function index()
    {
        $item_transactions = Session::all();
        $items = Item::all();

        // dd($item_transactions);

        return view('pages.transaction.transaction', compact('item_transactions', 'items'));
    }

    public function addItemTransaction(Request $request)
    {
        try {
            $item_id = $request->item_id;

            $item = Item::where('id', $item_id)->first();

            Session::put([
                'item_id' => $item->id,
                'item_code' => $item->code,
                'item_name' => $item->item
            ]);

            return redirect()->route('transaction.index')->with('success', 'Berhasil Menambahkan Barang !!');
        } catch (\Throwable $th) {
            return redirect()->route('transaction.index')->with('error', 'Gagal Menambahkan Barang !!');
        }
    }
}
