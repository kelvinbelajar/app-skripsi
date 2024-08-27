<?php

namespace App\Http\Controllers;

use App\Models\AcaraDetail;
use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\EventOrganizer;
use App\Models\Lokasi;
use App\Models\Jadwal;

class AcaraDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acaraDetails = AcaraDetail::all();
        return view('acara_details.index', compact('acaraDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acara = Acara::all();
        $eventOrganizer = EventOrganizer::all();
        $lokasi = Lokasi::all();
        $jadwal = Jadwal::all();
        return view('acara_details.create', compact('acara', 'eventOrganizer', 'lokasi', 'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'id_eo' => 'required',
            'id_acara' => 'required',
            'id_lokasi' => 'required',
            'id_jadwal' => 'required',
        ]);

        $acaraDetail = new AcaraDetail();
        $acaraDetail->id_eo = $request->id_eo;
        $acaraDetail->id_acara = $request->id_acara;
        $acaraDetail->id_lokasi = $request->id_lokasi;
        $acaraDetail->id_jadwal = $request->id_jadwal;
        $acaraDetail->save();

        return redirect()->route('acara_details.index')->with('success', 'Acara Detail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcaraDetail $acaraDetail)
    {
        $lokasi = Lokasi::find($acaraDetail->id_lokasi); // Get the specific Lokasi record
        return view('acara_details.show', compact('acaraDetail', 'lokasi'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcaraDetail $acaraDetail)
    {
        $acara = Acara::all();
        $eventOrganizer = EventOrganizer::all();
        $lokasi = Lokasi::all();
        $jadwal = Jadwal::all();
        return view('acara_details.edit', compact('acara', 'eventOrganizer', 'lokasi', 'jadwal', 'acaraDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcaraDetail $acaraDetail)
    {
        $request->validate([
            'id_eo' => 'required',
            'id_acara' => 'required',
            'id_lokasi' => 'required',
            'id_jadwal' => 'required',
        ]);

        $acaraDetail = AcaraDetail::findOrFail($acaraDetail->id);

        $acaraDetail->id_eo = $request->id_eo;
        $acaraDetail->id_acara = $request->id_acara;
        $acaraDetail->id_lokasi = $request->id_lokasi;

        $acaraDetail->id_jadwal = $request->id_jadwal;
        $acaraDetail->update();

        return redirect()->route('acara_details.index')->with('success', 'Acara Detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcaraDetail $acaraDetail)
    {
        $acaraDetail->delete();
        return redirect()->route('acara_details.index')->with('success', 'Acara Detail deleted successfully.');
    }
}
