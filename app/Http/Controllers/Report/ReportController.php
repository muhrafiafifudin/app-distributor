<?php

namespace App\Http\Controllers\Report;

use PDF;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\IncomingItem;
use App\Models\OutgoingItem;
use Illuminate\Http\Request;
use App\Models\OutgoingItemDetail;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function incoming_item()
    {
        return view('pages.report.incoming_item');
    }

    public function pdf_print_incoming($fromDate, $toDate)
    {
        $incoming_items = IncomingItem::whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->get();

        $today = Carbon::now()->isoFormat('D MMMM Y');

        $pdf = PDF::loadView('pages.report.pdf.incoming_item', compact('fromDate', 'toDate', 'incoming_items', 'today'))->setPaper('a4', 'potrait');

        return $pdf->download('Barang Masuk.pdf');
    }

    public function outgoing_item()
    {
        $items = Item::all();

        return view('pages.report.outgoing_item', compact('items'));
    }

    public function pdf_print_outgoing($fromDate, $toDate, $itemId)
    {
        $itemId = intval($itemId);

        // $outgoing_items = OutgoingItem::with('outgoing_item_detail')->whereDate('created_at', '>=', $fromDate)
        //     ->whereDate('created_at', '<=', $toDate)
        //     ->get();

        if ($itemId !== 0) {
            $outgoing_items = OutgoingItemDetail::whereDate('created_at', '>=', $fromDate)
                ->whereDate('created_at', '<=', $toDate)
                ->where('item_id', $itemId)
                ->get();
        } else {
            $outgoing_items = OutgoingItemDetail::whereDate('created_at', '>=', $fromDate)
                ->whereDate('created_at', '<=', $toDate)
                ->get();
        }

        $today = Carbon::now()->isoFormat('D MMMM Y');

        $pdf = PDF::loadView('pages.report.pdf.outgoing_item', compact('fromDate', 'toDate', 'outgoing_items', 'today'))->setPaper('a4', 'potrait');

        return $pdf->download('Barang Keluar.pdf');
    }
}
