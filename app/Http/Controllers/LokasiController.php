<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\Acara;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Province;


class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::with(['acaras', 'province', 'regency', 'district', 'village'])->get();
        return view('lokasis.index', compact('lokasi'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acaras = Acara::all();
        $provinces = Province::all();

        return view('lokasis.create', compact('acaras', 'provinces'));
    }

    public function acaras()
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }

    public function getRegency($province_id)
    {
        $regencies = Regency::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }

    public function getDistricts($regency_id)
    {
        $districts = District::where('regency_id', $regency_id)->get();
        return response()->json($districts);
    }

    public function getVillages($district_id)
    {
        $villages = Village::where('district_id', $district_id)->get();
        return response()->json($villages);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_acara' => 'required',
            'address' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $lokasi = new Lokasi();
        $lokasi->id_acara = $request->id_acara;
        $lokasi->address = $request->address;
        $lokasi->province_id = $request->province_id;
        $lokasi->regency_id = $request->regency_id;
        $lokasi->district_id = $request->district_id;
        $lokasi->village_id = $request->village_id;
        $lokasi->latitude = $request->latitude;
        $lokasi->longitude = $request->longitude;
        $lokasi->save();

        return redirect()->route('lokasis.index')->with('success', 'Lokasi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // In your LokasiController
    public function show(Lokasi $lokasi)
    {
        $lokasi = Lokasi::with(['acaras', 'province', 'regency', 'district', 'village'])->findOrFail($lokasi->id);
        return view('lokasis.show', compact('lokasi'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $acaras = Acara::all(); // Or use a query to get the relevant acara records
        $provinces = Province::all(); // Adjust according to your data structure
        $regencies = Regency::where('province_id', $lokasi->province_id)->get();
        $districts = District::where('regency_id', $lokasi->regency_id)->get();
        $villages = Village::where('district_id', $lokasi->district_id)->get();

        return view('lokasis.edit', compact('lokasi', 'acaras', 'provinces', 'regencies', 'districts', 'villages'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        try {
            // Validate the request to ensure all fields are required and not empty
            $request->validate([
                'id_acara' => 'required|exists:acaras,id', // Ensure the acara exists
                'address' => 'required', // Validate as string and add minimum length
                'province_id' => 'required|exists:provinces,id', // Ensure the province exists
                'regency_id' => 'required|exists:regencies,id', // Ensure the regency exists
                'district_id' => 'required|exists:districts,id', // Ensure the district exists
                'village_id' => 'required|exists:villages,id', // Ensure the village exists
                'latitude' => 'required|numeric|between:-90,90', // Validate latitude as a valid number
                'longitude' => 'required|numeric|between:-180,180', // Validate longitude as a valid number
            ]);

            // Update the Lokasi instance with validated data
            $lokasi->update([
                'id_acara' => $request->id_acara,
                'address' => $request->address,
                'province_id' => $request->province_id,
                'regency_id' => $request->regency_id,
                'district_id' => $request->district_id,
                'village_id' => $request->village_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        } catch (\Exception $e) {
            // Redirect back to the edit page with an error message
            return redirect()->back()->with('error', 'Failed to update Lokasi: ' . $e->getMessage());
        }

        // Redirect back to the index page with a success message
        return redirect()->route('lokasis.index')->with('success', 'Lokasi updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('lokasis.index')->with('success', 'Lokasi deleted successfully.');
    }
}
