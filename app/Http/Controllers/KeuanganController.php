<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangans = Keuangan::all();
        return view('keuangans.index', compact('keuangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keuangans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
        ]);

        $keuangan = new Keuangan;
        $keuangan->tanggal_transaksi = $request->tanggal_transaksi;
        $keuangan->pemasukan = $request->pemasukan;
        $keuangan->pengeluaran = $request->pengeluaran;
        $keuangan->save();

        return redirect()->route('keuangans.index')->with('success', 'Keuangan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        return view('keuangans.show', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        return view('keuangans.edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
        ]);
        
        $keuangan->tanggal_transaksi = $request->tanggal_transaksi;
        $keuangan->pemasukan = $request->pemasukan;
        $keuangan->pengeluaran = $request->pengeluaran;
        $keuangan->update();

        return redirect()->route('keuangans.index')->with('success', 'Keuangan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('keuangans.index')->with('success', 'Keuangan deleted successfully.');
    }
}
