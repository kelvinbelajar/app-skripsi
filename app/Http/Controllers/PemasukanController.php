<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Acara;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasukans = Pemasukan::all();
        return view('pemasukans.index', compact('pemasukans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        return view('pemasukans.create', compact('acaras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_acara' => 'required',
            'tanggal_pemasukan' => 'required',
            'nominal_pemasukan' => 'required',
            'bukti_pemasukan' => 'required|file|mimes:pdf|max:2048', // Accept only PDF files
        ]);
        // Handle file upload
        $fileName = null;
        if ($request->hasFile('bukti_pemasukan')) {
            $file = $request->file('bukti_pemasukan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_pemasukan', $fileName); // Store file in 'storage/app/public/bukti_pemasukan'
        }

        $pemasukan = new Pemasukan();
        $pemasukan->id_acara = $request->id_acara;
        $pemasukan->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukan->nominal_pemasukan = $request->nominal_pemasukan;
        $pemasukan->bukti_pemasukan = $fileName; // Store file name
        $pemasukan->save();

        return redirect()->route('pemasukans.index')->with('success', 'Pemasukan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        return view('pemasukans.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan)
    {
        $acaras = Acara::all();
        return view('pemasukans.edit', compact('pemasukan', 'acaras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasukan $pemasukan)
    {
        $request->validate([
            'id_acara' => 'required',
            'tanggal_pemasukan' => 'required',
            'nominal_pemasukan' => 'required',
            'bukti_pemasukan' => 'nullable|file|mimes:pdf|max:2048' // Accept only PDF files
        ]);

 
        $pemasukan->id_acara = $request->id_acara;
        $pemasukan->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukan->nominal_pemasukan = $request->nominal_pemasukan;

        if ($request->hasFile('bukti_pemasukan')) {
            // Delete old image if exists
            if ($pemasukan->bukti_pemasukan) {
                Storage::delete('public/bukti_pemasukan/' . $pemasukan->bukti_pemasukan);
            }

            $image = $request->file('bukti_pemasukan');
            $imageName = $image->hashName();
            $image->storeAs('public/bukti_pemasukan', $imageName);

            $pemasukan->bukti_pemasukan = $imageName;
        }
        
        $pemasukan->update();

        return redirect()->route('pemasukans.index')->with('success', 'Pemasukan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasukan $pemasukan)
    {
        Storage::delete('public/bukti_pemasukan/' . $pemasukan->bukti_pemasukan);
        $pemasukan->delete();

        return redirect()->route('pemasukans.index')->with('success', 'Pemasukan deleted successfully.');
    }
}
