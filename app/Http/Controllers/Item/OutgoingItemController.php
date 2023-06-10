<?php

namespace App\Http\Controllers\Item;

use App\Models\OutgoingItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutgoingItemController extends Controller
{
    public function index()
    {
        $outgoing_items = OutgoingItem::all();

        return view('pages.item.outgoing_item', compact('outgoing_items'));
    }

    public function store(Request $request)
    {
        //
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