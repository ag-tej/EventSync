<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required',
            'question' => 'required',
            'placeholder' => 'required',
        ]);
        Application::create($validated);
        $event = Event::find($request->event_id);
        if ($event->percent_complete < 40) {
            $event->percent_complete = 40;
        }
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('info', 'Custom question has been added.');
    }

    public function destroy($id)
    {
        $question = Application::find($id);
        $question->delete();
        return redirect()->back()->with('danger', 'Question has been deleted.');
    }
}
