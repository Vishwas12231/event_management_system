<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString();

        $todayEvents = Event::whereDate('date', $today)->get();
        $futureEvents = Event::whereDate('date', '>', $today)->get();
        $pastEvents = Event::whereDate('date', '<', $today)->get();

        return response()->json([
            'today' => $todayEvents,
            'future' => $futureEvents,
            'past' => $pastEvents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $event = Event::create($request->all());
        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Event::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return response()->json(null, 204);
    }
}
