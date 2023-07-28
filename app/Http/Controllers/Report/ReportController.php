<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function incoming_item()
    {
        return view('pages.report.incoming_item');
    }

    public function pdf_print_incoming($fromDate, $toDate)
    {
        $pdf = PDF::loadView('pages.report.pdf.incoming_item', compact('fromDate', 'toDate'))->setPaper('a4', 'potrait');

        return $pdf->download('Barang Masukj.pdf');
    }

    public function outgoing_item()
    {
        return view('pages.report.outgoing_item');
    }

    public function pdf_print_outgoing($fromDate, $toDate)
    {
        dd($fromDate, $toDate);
    }
}
