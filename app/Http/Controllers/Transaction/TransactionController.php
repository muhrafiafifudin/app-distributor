<?php

namespace App\Http\Controllers\Transaction;

use Session;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('pages.transaction.transaction', compact('items', 'cartItems'));
    }

    public function addItem(Request $request)
    {
        try {
            if (Auth::check()) {
                $item_id = $request->item_id;

                $item_check = Item::where('id', $item_id)->first();

                if (Cart::where([['item_id', $item_id], ['user_id', Auth::id()]])->exists()) {
                    return redirect()->route('transaction.index')->with('warning', $item_check->item . ' Sudah Ditambahkan !!');
                } else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->item_id = $item_id;
                    $cartItem->item_qty = 1;
                    $cartItem->save();

                    return redirect()->route('transaction.index')->with('success', $item_check->item . ' Berhasil Ditambahkan !!');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('transaction.index')->with('error', 'Gagal Menambahkan Barang !!');
        }
    }

    public function updateItem(Request $request)
    {
        try {
            if (Auth::check()) {
                $item_id = $request->item_id;
                $item_qty = $request->item_qty;

                if (Cart::where([['item_id', $item_id], ['user_id', Auth::id()]])->exists()) {
                    $cartItem = Cart::where([['item_id', $item_id], ['user_id', Auth::id()]])->first();
                    $cartItem->item_qty = $item_qty;
                    $cartItem->update();

                    return redirect()->route('transaction.index')->with('success', 'Berhasil Mengubah Barang !!');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('transaction.index')->with('error', 'Gagal Mengubah Barang !!');
        }
    }

    public function deleteItem(Request $request)
    {
        try {
            if (Auth::check()) {
                $item_id = intval($request->item_id);

                if (Cart::where('item_id', $item_id)->where('user_id', Auth::id())->exists()) {
                    $cartItem = Cart::where([['item_id', $item_id], ['user_id', Auth::id()]])->first();
                    $cartItem->delete();

                    // return response()->json(['status' => 'Produk Berhasil Dihapus !!']);
                    return redirect()->route('transaction.index')->with(['success' => 'Berhasil Menghapus Data !!']);
                }
            } else {
                return redirect()->route('transaction.index')->with(['success' => 'Gagal Menghapus Data !!']);
                // return response()->json(['status' => "Silahkan Login Terlebih Dahulu"]);
            }

        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('transaction.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
