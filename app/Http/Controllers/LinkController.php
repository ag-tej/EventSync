<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required',
            'facebook_link' => 'required|active_url',
            'instagram_link' => 'required|active_url',
            'contact_email' => 'required|email',
            'twitter_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'discord_link' => 'nullable',
            'website_link' => 'nullable',
            'code_of_conduct' => 'nullable',
        ]);
        Link::create($validated);
        $event = Event::find($request->event_id);
        $event->percent_complete = $event->percent_complete + 20;
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('success', 'Links have been added.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'event_id' => 'required',
            'facebook_link' => 'required|active_url',
            'instagram_link' => 'required|active_url',
            'contact_email' => 'required|email',
            'twitter_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'discord_link' => 'nullable',
            'website_link' => 'nullable',
            'code_of_conduct' => 'nullable',
        ]);
        $link = Link::find($id);
        $link->update($validated);
        $event = Event::find($request->event_id);
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('success', 'Links have been updated.');
    }
}
