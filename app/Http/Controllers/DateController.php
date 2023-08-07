<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required',
            'application_open' => 'required',
            'application_close' => 'required',
            'rsvp' => 'required',
            'event_begins' => 'required',
            'event_ends' => 'required',
        ]);
        Date::create($validated);
        $event = Event::find($request->event_id);
        if ($event->percent_complete < 80) {
            $event->percent_complete = 80;
        }
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('info', 'Dates have been added.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'event_id' => 'required',
            'application_open' => 'required',
            'application_close' => 'required',
            'rsvp' => 'required',
            'event_begins' => 'required',
            'event_ends' => 'required',
        ]);
        $date = Date::find($id);
        $date->update($validated);
        $event = Event::find($request->event_id);
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('info', 'Dates have been updated.');
    }
}
