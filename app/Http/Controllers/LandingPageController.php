<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\AcaraDetail;
use App\Models\LandingPage;
use App\Models\Lokasi;
use Illuminate\Http\Request;


class LandingPageController extends Controller
{
    public function index()
    {
        $acara = AcaraDetail::with('acara','jadwal','lokasi')->get();
        $locations = Lokasi::with('province', 'regency', 'district', 'village')->get();
        return view('landing', compact('acara', 'locations'));
    }
}
