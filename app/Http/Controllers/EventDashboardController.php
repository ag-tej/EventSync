<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Applicant;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventDashboardController extends Controller
{
    public function index($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $applicants = Applicant::where('event_id', $event->id)->orderBy('status', 'desc')->get();
        return view('organizer.event_dashboard', compact('applicants'));
    }

    public function applicant($id)
    {
        $applicant = Applicant::find($id);
        $answers = Answer::where('user_id', Auth::user()->id)->where('event_id', $applicant->event_id)->get();
        return view('organizer.applicant', compact('applicant', 'answers'));
    }

    public function accept($id)
    {
        $applicant = Applicant::find($id);
        $applicant->status = 'Accepted';
        $applicant->update();
        return redirect()->back()->with('success', 'Application is accepted.');
    }

    public function reject($id)
    {
        $applicant = Applicant::find($id);
        $applicant->status = 'Rejected';
        $applicant->update();
        return redirect()->back()->with('danger', 'Application is rejected.');
    }
}
