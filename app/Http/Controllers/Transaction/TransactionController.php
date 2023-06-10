<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('pages.transaction.transaction', compact('items'));
    }
}
