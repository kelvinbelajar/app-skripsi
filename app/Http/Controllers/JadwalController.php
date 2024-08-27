<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Acara;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwals.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        return view('jadwals.create', compact('acaras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_acara' => 'required|exists:acaras,id',
                'tanggal_mulai' => 'required',
                'tanggal_akhir' => 'required',
                'waktu_mulai' => 'required',
                'waktu_akhir' => 'required',
            ]);
            $jadwal = new Jadwal();
            $jadwal->id_acara = $request->id_acara;
            $jadwal->tanggal_mulai = $request->tanggal_mulai;
            $jadwal->tanggal_akhir = $request->tanggal_akhir;
            $jadwal->waktu_mulai = $request->waktu_mulai;
            $jadwal->waktu_akhir = $request->waktu_akhir;
            $jadwal->save();

            return redirect()->route('jadwals.index')->with('success', 'Jadwal created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('jadwals.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $acaras = Acara::all();
        return view('jadwals.edit', compact('jadwal', 'acaras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'id_acara' => 'required|exists:acaras,id',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
        ]);
        $jadwal->id_acara = $request->id_acara;
        $jadwal->tanggal_mulai = $request->tanggal_mulai;
        $jadwal->tanggal_akhir = $request->tanggal_akhir;
        $jadwal->waktu_mulai = $request->waktu_mulai;
        $jadwal->waktu_akhir = $request->waktu_akhir;
        $jadwal->update();

        return redirect()->route('jadwals.index')->with('success', 'Jadwal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwals.index')->with('success', 'Jadwal deleted successfully.');
    }
}
