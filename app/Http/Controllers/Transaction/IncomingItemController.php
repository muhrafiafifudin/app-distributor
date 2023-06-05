<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomingItemController extends Controller
{
    public function index()
    {
        return view('pages.transaction.incoming_item');
    }
}
