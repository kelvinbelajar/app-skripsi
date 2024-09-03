<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Acara;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        return view('pengeluarans.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        return view('pengeluarans.create', compact('acaras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_acara' => 'required',
            'tanggal_pengeluaran' => 'required',
            'nominal_pengeluaran' => 'required',
            'bukti_pengeluaran' => 'required|file|mimes:pdf|max:2048', // Accept only PDF files
        ]);

        // Handle file upload
        $fileName = null;
        if ($request->hasFile('bukti_pengeluaran')) {
            $file = $request->file('bukti_pengeluaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_pengeluaran', $fileName); // Store file in 'storage/app/public/bukti_pengeluaran'
        }

        $pengeluaran = new Pengeluaran();
        $pengeluaran->id_acara = $request->id_acara;
        $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $pengeluaran->nominal_pengeluaran = $request->nominal_pengeluaran;
        $pengeluaran->bukti_pengeluaran = $fileName; // Store file name
        $pengeluaran->save();

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluarans.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $acaras = Acara::all();
        return view('pengeluarans.edit', compact('pengeluaran', 'acaras'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Pengeluaran $pengeluaran)
        {
            $request->validate([
                'id_acara' => 'required',
                'tanggal_pengeluaran' => 'required',
                'nominal_pengeluaran' => 'required',
                'bukti_pengeluaran' => 'nullable|file|mimes:pdf|max:2048' // Accept only PDF files
            ]);

            $pengeluaran->id_acara = $request->id_acara;
            $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
            $pengeluaran->nominal_pengeluaran = $request->nominal_pengeluaran;

            if ($request->hasFile('bukti_pengeluaran')) {
                // Delete old image if exists
                if ($pengeluaran->bukti_pengeluaran) {
                    Storage::delete('public/bukti_pengeluaran/' . $pengeluaran->bukti_pengeluaran);
                }

                $image = $request->file('bukti_pengeluaran');
                $imageName = $image->hashName();
                $image->storeAs('public/bukti_pengeluaran', $imageName);

                $pengeluaran->bukti_pengeluaran = $imageName;
            }

            $pengeluaran->update();

            return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        Storage::delete('public/bukti_pengeluaran/' . $pengeluaran->bukti_pengeluaran);
        $pengeluaran->delete();

        return redirect()->route('pengeluarans.index')->with('success', 'Pengeluaran deleted successfully.');
    }
}
