<?php

namespace App\Http\Controllers\Main;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('pages.main.item', compact('items'));
    }
}
