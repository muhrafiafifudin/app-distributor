<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $penjualan = Penjualan::with('details','barang')->get();

        // return view('pages.penjualan',[
        //     'penjualan' => $penjualan
        // ]);

        $penjualan = Penjualan::with('barang')->get();

        return view('pages.penjualan', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $barang = Barang::findOrFail($id);

        // $penjualan = Penjualan::create([
        //     'barang_id' => $id,
        //     'jumlah_barang' => $jumlah_barang,
        //     'jumlah_bayar'  => $barang->harga
        // ]);

        // DetailPenjualan::create([
        //     'penjualan_id' => $penjualan->id,
        //     'barang'    => $barang-
        //     'qty'   => 
        //     'subtotal'  => 
        // ]);

        $barangs = Barang::all();
        return view('pages.penjualan-tambah', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function process(Request $request, $id)
    {
        // $barang = Barang::findOrFail($id);

        // $penjualan = Penjualan::create([
        //     'jumlah_barang' => $barang->qty
        //     'jumlah_harga' => 

        // ]);

        // DetailPenjualan::create([
        //     'id' => $penjualan->id,

        // ]);

        // $penjualan = Penjualan::create([
        //     'jumlah_barang' => 
        //     'jumlah_bayar' => 
        // ]);

        // DetailPenjualan::create([
        //     'penjualan_id' => $penjualan->id,
        //     'barang_id' =>$ $penjualan->id,
        //     'qty'   => 
        //     'subtotal' =>
        // ]);
    }
}
