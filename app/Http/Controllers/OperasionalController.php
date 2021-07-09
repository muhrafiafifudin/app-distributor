<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operasionals = Operasional::all();

        return view('pages.operasional', [
            'operasionals' => $operasionals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.operasional-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|max:255',
            'biaya' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Operasional::create($request->all());

        return redirect()->route('operasional.index');
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
        $operasional = Operasional::find($id);

        return view('pages.operasional-edit', compact('operasional'));
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
        $request->validate([
            'keterangan' => 'required|max:255',
            'biaya' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Operasional::find($id)->update($request->all());

        return redirect()->route('operasional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Operasional::find($id)->delete();

        return redirect()->route('operasional.index');
    }

    public function report()
    {
        $reports = Operasional::all();

        return view('pages.operasional-laporan', [
            'reports' => $reports
        ]);
    }
}
