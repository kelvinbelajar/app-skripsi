<?php

namespace App\Http\Controllers;

use App\Models\EventOrganizer;
use Illuminate\Http\Request;

class EventOrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventOrganizers = EventOrganizer::all();
        return view('event-organizers.index', compact('eventOrganizers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event-organizers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_organisasi' => 'required',
        'kontak' => 'required',
        'email_organisasi' => 'required',
        'no_rekening' => 'required',
    ]);

    $eventOrganizer = new EventOrganizer;
    $eventOrganizer->nama_organisasi = $request->nama_organisasi; // Corrected
    $eventOrganizer->kontak = $request->kontak;
    $eventOrganizer->email_organisasi = $request->email_organisasi; // Corrected
    $eventOrganizer->no_rekening = $request->no_rekening;

    $eventOrganizer->save();
    
    return redirect()->route('event-organizers.index')->with('success', 'Event organizer created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(EventOrganizer $eventOrganizer)
    {
        return view('event-organizers.show', compact('eventOrganizer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventOrganizer $eventOrganizer)
    {
        return view('event-organizers.edit', compact('eventOrganizer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventOrganizer $eventOrganizer)
    {
        $request->validate([
            'nama_organisasi' => 'required',
            'kontak' => 'required',
            'email_organisasi' => 'required',
            'no_rekening' => 'required',
        ]);

        $eventOrganizer->nama_organisasi = $request->nama_organisasi;
        $eventOrganizer->kontak = $request->kontak;
        $eventOrganizer->email_organisasi = $request->email_organisasi;
        $eventOrganizer->no_rekening = $request->no_rekening;

        $eventOrganizer->update();

        return redirect()->route('event-organizers.index')->with('success', 'Event organizer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventOrganizer $eventOrganizer)
    {
        $eventOrganizer->delete();
        return redirect()->route('event-organizers.index')->with('success', 'Event organizer deleted successfully.');
    }
}
