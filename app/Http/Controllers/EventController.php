<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\Brand;
use App\Models\Date;
use App\Models\Event;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function explore()
    {
        $opens = Event::where('isPublished', 1)
            ->whereHas('date', function ($query) {
                $query->whereDate('application_open', '<', Carbon::now());
            })
            ->whereHas('date', function ($query) {
                $query->whereDate('event_ends', '>', Carbon::now());
            })->orderBy('updated_at', 'desc')->get();
        $upcomings = Event::where('isPublished', 1)
            ->whereHas('date', function ($query) {
                $query->whereDate('application_open', '>', Carbon::now());
            })->orderBy('updated_at', 'desc')->get();
        return view('explore', compact('opens', 'upcomings'));
    }

    public function viewEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $now = Carbon::now();
        if (Auth::user()) {
            $hasApplied = Applicant::where('user_id', Auth::user()->id)->where('event_id', $event->id)->first();
            return view('event_view', compact('event', 'now', 'hasApplied'));
        } else
            return view('event_view', compact('event', 'now'));
    }

    public function dashboard()
    {
        $drafts = Event::where('isPublished', 0)->where('organizer_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        $inProgress = Event::where('isPublished', 1)->where('organizer_id', Auth::user()->id)
            ->whereHas('date', function ($query) {
                $query->whereDate('event_ends', '>', Carbon::now());
            })->orderBy('updated_at', 'desc')->get();
        $previous = Event::where('isPublished', 1)->where('organizer_id', Auth::user()->id)
            ->whereHas('date', function ($query) {
                $query->whereDate('event_ends', '<', Carbon::now());
            })->orderBy('updated_at', 'desc')->get();
        $draft_count = count($drafts);
        $inProgress_count = count($inProgress);
        $previous_count = count($previous);
        if ($draft_count == 0 && $inProgress_count == 0 && $previous_count == 0)
            return view('organizer.null_dashboard');
        else
            return view('organizer.dashboard', compact('drafts', 'inProgress', 'previous', 'draft_count', 'inProgress_count', 'previous_count'));
    }

    public function createEvent(Request $request)
    {
        $validated = $request->validate([
            'organizer_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'mode' => 'required|in:In-Person,Online,Hybrid',
        ]);
        Event::create($validated);
        return redirect()->back()->with('success', 'Event added to drafts.');
    }

    public function basics($slug)
    {
        $basics = Event::where('slug', $slug)->first();
        $navbar = Event::where('slug', $slug)->first();
        return view('organizer.events.basics', compact('basics', 'navbar'));
    }

    public function basicsUpdate(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->first();
        $validated = $request->validate([
            'title' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'category' => 'required',
            'approx_participants' => 'nullable',
            'team_size' => 'nullable',
            'venue' => $event->mode != 'Online' ? 'required' : 'nullable',
        ]);
        $event->update($validated);
        return redirect()->back()->with('success', 'Your changes have been saved.');
    }

    public function application($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        $questions = Application::where('event_id', $navbar->id)->get();
        return view('organizer.events.application', compact('questions', 'navbar'));
    }

    public function links($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        $link = Link::where('event_id', $navbar->id)->first();
        return view('organizer.events.links', compact('link', 'navbar'));
    }

    public function brand($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        $brand = Brand::where('event_id', $navbar->id)->first();
        return view('organizer.events.brand', compact('brand', 'navbar'));
    }

    public function dates($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        $date = Date::where('event_id', $navbar->id)->first();
        return view('organizer.events.dates', compact('date', 'navbar'));
    }

    public function partners($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        return view('organizer.events.partners', compact('navbar'));
    }

    public function perks($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        return view('organizer.events.perks', compact('navbar'));
    }

    public function guests($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        return view('organizer.events.guests', compact('navbar'));
    }

    public function schedule($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        return view('organizer.events.schedule', compact('navbar'));
    }

    public function faqs($slug)
    {
        $navbar = Event::where('slug', $slug)->first();
        return view('organizer.events.faqs', compact('navbar'));
    }

    public function publish($id)
    {
        $event = Event::find($id);
        $event->isPublished = 1;
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->route('organizer.dashboard')->with('success', 'Your event has been published.');
    }

    public function unpublish($id)
    {
        $event = Event::find($id);
        $event->isPublished = 0;
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->route('organizer.dashboard')->with('success', 'Your event has been unpublished.');
    }
}
