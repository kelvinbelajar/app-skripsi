<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\EventOrganizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acara = Acara::all();
        return view('acaras.index', compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventOrganizer = EventOrganizer::all();
        return view('acaras.create', compact('eventOrganizer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_acara' => 'required',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'estimasi_pengunjung' => 'required|integer',
                'biaya_tiket' => 'required|numeric',
                'id_eo' => 'required|exists:event_organizers,id',
                'anggaran' => 'required|numeric',
            ]);

            $acara = new Acara();
            $acara->nama_acara = $request->nama_acara;
            $acara->kategori = $request->kategori;
            $acara->deskripsi = $request->deskripsi;

            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $imageName = $image->hashName();
                $image->storeAs('public/acaras', $imageName);

                $acara->gambar = $imageName;
            }

            $acara->estimasi_pengunjung = $request->estimasi_pengunjung;
            $acara->biaya_tiket = $request->biaya_tiket;
            $acara->id_eo = $request->id_eo;
            $acara->anggaran = $request->anggaran;

            $acara->save();

            return redirect()->route('acaras.index')->with('success', 'Acara created successfully.');
        } catch (\Exception $e) {
            // Log the error message
            Log::error($e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to create acara. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        return view('acaras.show', compact('acara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acara $acara)
    {
        $eventOrganizer = EventOrganizer::all();
        return view('acaras.edit', compact('acara', 'eventOrganizer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_acara' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'estimasi_pengunjung' => 'required|integer',
            'biaya_tiket' => 'required|numeric',
            'id_eo' => 'required|exists:event_organizers,id',
            'anggaran' => 'required|numeric',
        ]);

        $acara = Acara::findOrFail($id);
        $acara->nama_acara = $request->nama_acara;
        $acara->kategori = $request->kategori;
        $acara->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($acara->gambar) {
                Storage::delete('public/acaras/' . $acara->gambar);
            }

            $image = $request->file('gambar');
            $imageName = $image->hashName();
            $image->storeAs('public/acaras', $imageName);

            $acara->gambar = $imageName;
        }

        $acara->estimasi_pengunjung = $request->estimasi_pengunjung;
        $acara->biaya_tiket = $request->biaya_tiket;
        $acara->id_eo = $request->id_eo;
        $acara->anggaran = $request->anggaran;

        $acara->save();

        return redirect()->route('acaras.index')->with('success', 'Acara updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara)
    {
        $acara->delete();
        Storage::delete('public/acaras/' . $acara->gambar);
        return redirect()->route('acaras.index')->with('success', 'Acara deleted successfully.');
    }
}
